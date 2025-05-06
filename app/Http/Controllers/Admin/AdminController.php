<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Service;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    // Dashboard
    public function dashboard()
    {
        $blogCount = Blog::count();
        $serviceCount = Service::count();
        
        return view('admin.dashboard', compact('blogCount', 'serviceCount'));
    }

    // Blog management
    public function blogs()
    {
        $blogs = Blog::orderBy('published_at', 'desc')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function createBlog()
    {
        return view('admin.blogs.create');
    }

    public function storeBlog(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'content' => 'required',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->excerpt = $request->excerpt;
        $blog->content = $request->content;
        $blog->published_at = $request->published_at;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blog-images', 'public');
            $blog->image = '/storage/' . $imagePath;
        }

        $blog->save();

        return redirect()->route('admin.blogs')
            ->with('success', 'Blog berhasil ditambahkan');
    }

    public function editBlog($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function updateBlog(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'content' => 'required',
            'published_at' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $blog = Blog::findOrFail($id);
        
        if ($blog->title != $request->title) {
            $blog->slug = Str::slug($request->title);
        }

        $blog->title = $request->title;
        $blog->excerpt = $request->excerpt;
        $blog->content = $request->content;
        $blog->published_at = $request->published_at;

        if ($request->hasFile('image')) {
            if ($blog->image && Storage::disk('public')->exists(str_replace('/storage/', '', $blog->image))) {
                Storage::disk('public')->delete(str_replace('/storage/', '', $blog->image));
            }

            $imagePath = $request->file('image')->store('blog-images', 'public');
            $blog->image = '/storage/' . $imagePath;
        }

        $blog->save();

        return redirect()->route('admin.blogs')
            ->with('success', 'Blog berhasil diperbarui');
    }

    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && Storage::disk('public')->exists(str_replace('/storage/', '', $blog->image))) {
            Storage::disk('public')->delete(str_replace('/storage/', '', $blog->image));
        }

        $blog->delete();

        return redirect()->route('admin.blogs')
            ->with('success', 'Blog berhasil dihapus');
    }

    // Service management
    public function services()
    {
        $services = Service::paginate(10);
        return view('admin.services.index', compact('services'));
    }

    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeService(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'features' => 'required|array',
            'features.*' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $service = new Service();
        $service->name = $request->name;
        $service->description = $request->description;
        $service->features = json_encode($request->features);
        $service->save();

        return redirect()->route('admin.services')
            ->with('success', 'Layanan berhasil ditambahkan');
    }

    public function editService($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.services.edit', compact('service'));
    }

    public function updateService(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'description' => 'required',
            'features' => 'required|array',
            'features.*' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $service = Service::findOrFail($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->features = json_encode($request->features);
        $service->save();

        return redirect()->route('admin.services')
            ->with('success', 'Layanan berhasil diperbarui');
    }

    public function deleteService($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services')
            ->with('success', 'Layanan berhasil dihapus');
    }

    // Contact management
    public function contacts()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function viewContact($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.view', compact('contact'));
    }

    public function markContactAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->read = true;
        $contact->save();
        
        return redirect()->back()->with('success', 'Pesan ditandai sebagai sudah dibaca');
    }

    public function deleteContact($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts')
            ->with('success', 'Pesan berhasil dihapus');
    }
}
