<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::all();
        $blogs = Blog::orderBy('published_at', 'desc')->get();
        
        return view('welcome', compact('services', 'blogs'));
    }
    
    public function blog($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('blog-detail', compact('blog'));
    }
    
    public function contact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:3',
            'email' => 'required|email',
            'layanan' => 'required',
            'pesan' => 'required|min:10',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        
        // Create a new Contact model
        Contact::create([
            'name' => $request->nama,
            'email' => $request->email,
            'service' => $request->layanan,
            'message' => $request->pesan,
        ]);
        
        // If the request expects JSON (AJAX request)
        if($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Pesan berhasil dikirim. Terima kasih telah menghubungi kami!'
            ]);
        }
        
        // For regular form submissions
        return redirect()->route('home')
            ->with('success', 'Pesan berhasil dikirim. Terima kasih telah menghubungi kami!');
    }
}