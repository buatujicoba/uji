// Menjalankan semua fungsi saat dokumen HTML telah dimuat sepenuhnya
document.addEventListener('DOMContentLoaded', () => {
    setupMobileNavigation();
    setupFormValidation();
    setupScrollAnimations();
    setupPricingButtons();
    setupBlogInteractions();
});

function showCustomAlert(title, message) {
    const overlay = document.createElement('div');
    overlay.classList.add('alert-overlay');

    const alertBox = document.createElement('div');
    alertBox.classList.add('custom-alert');

    const alertTitle = document.createElement('h3');
    alertTitle.classList.add('alert-title');
    alertTitle.textContent = title;

    const alertMessage = document.createElement('p');
    alertMessage.classList.add('alert-message');
    alertMessage.textContent = message;

    const alertButton = document.createElement('button');
    alertButton.classList.add('alert-button');
    alertButton.textContent = 'OK';

    alertButton.addEventListener('click', () => {
        document.body.removeChild(overlay);
    });

    alertBox.appendChild(alertTitle);
    alertBox.appendChild(alertMessage);
    alertBox.appendChild(alertButton);
    overlay.appendChild(alertBox);

    document.body.appendChild(overlay);
    alertButton.focus();
}

function setupMobileNavigation() {
    const header = document.querySelector('header');
    const nav = document.querySelector('nav');

    const toggleButton = document.createElement('button');
    toggleButton.innerHTML = '☰';
    toggleButton.classList.add('nav-toggle');
    toggleButton.setAttribute('aria-label', 'Toggle Navigation Menu');
    header.insertBefore(toggleButton, nav);

    toggleButton.addEventListener('click', () => {
        nav.classList.toggle('active');
        toggleButton.innerHTML = nav.classList.contains('active') ? '✕' : '☰';
    });

    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                nav.classList.remove('active');
                toggleButton.innerHTML = '☰';
            }
        });
    });

    document.addEventListener('click', (event) => {
        const isClickInsideMenu = nav.contains(event.target);
        const isClickOnToggle = toggleButton.contains(event.target);
        if (!isClickInsideMenu && !isClickOnToggle && nav.classList.contains('active')) {
            nav.classList.remove('active');
            toggleButton.innerHTML = '☰';
        }
    });
}

function setupFormValidation() {
    const contactForm = document.querySelector('#kontak form');
    const nameInput = document.querySelector('#nama');
    const emailInput = document.querySelector('#email');
    const messageInput = document.querySelector('#pesan');
    const serviceSelect = document.querySelector('#layanan');

    const createErrorElement = (id) => {
        const errorElement = document.createElement('span');
        errorElement.id = id;
        errorElement.classList.add('error-message');
        return errorElement;
    };

    const nameError = createErrorElement('nama-error');
    const emailError = createErrorElement('email-error');
    const messageError = createErrorElement('pesan-error');
    const serviceError = createErrorElement('layanan-error');

    nameInput.insertAdjacentElement('afterend', nameError);
    emailInput.insertAdjacentElement('afterend', emailError);
    messageInput.insertAdjacentElement('afterend', messageError);
    serviceSelect.insertAdjacentElement('afterend', serviceError);

    const validateName = () => {
        const name = nameInput.value.trim();
        if (name === '') {
            nameError.textContent = 'Nama tidak boleh kosong';
            nameInput.classList.add('invalid');
            nameInput.classList.remove('valid');
            return false;
        } else if (name.length < 3) {
            nameError.textContent = 'Nama minimal 3 karakter';
            nameInput.classList.add('invalid');
            nameInput.classList.remove('valid');
            return false;
        } else {
            nameError.textContent = '';
            nameInput.classList.remove('invalid');
            nameInput.classList.add('valid');
            return true;
        }
    };

    const validateEmail = () => {
        const email = emailInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (email === '') {
            emailError.textContent = 'Email tidak boleh kosong';
            emailInput.classList.add('invalid');
            emailInput.classList.remove('valid');
            return false;
        } else if (!emailRegex.test(email)) {
            emailError.textContent = 'Email tidak valid';
            emailInput.classList.add('invalid');
            emailInput.classList.remove('valid');
            return false;
        } else {
            emailError.textContent = '';
            emailInput.classList.remove('invalid');
            emailInput.classList.add('valid');
            return true;
        }
    };

    const validateService = () => {
        const service = serviceSelect.value;
        if (service === '') {
            serviceError.textContent = 'Silakan pilih layanan';
            serviceSelect.classList.add('invalid');
            serviceSelect.classList.remove('valid');
            return false;
        } else {
            serviceError.textContent = '';
            serviceSelect.classList.remove('invalid');
            serviceSelect.classList.add('valid');
            return true;
        }
    };

    const validateMessage = () => {
        const message = messageInput.value.trim();
        if (message === '') {
            messageError.textContent = 'Pesan tidak boleh kosong';
            messageInput.classList.add('invalid');
            messageInput.classList.remove('valid');
            return false;
        } else if (message.length < 10) {
            messageError.textContent = 'Pesan minimal 10 karakter';
            messageInput.classList.add('invalid');
            messageInput.classList.remove('valid');
            return false;
        } else {
            messageError.textContent = '';
            messageInput.classList.remove('invalid');
            messageInput.classList.add('valid');
            return true;
        }
    };

    nameInput.addEventListener('input', validateName);
    emailInput.addEventListener('input', validateEmail);
    messageInput.addEventListener('input', validateMessage);
    serviceSelect.addEventListener('change', validateService);

    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();

        const isNameValid = validateName();
        const isEmailValid = validateEmail();
        const isMessageValid = validateMessage();
        const isServiceValid = validateService();

        if (isNameValid && isEmailValid && isMessageValid && isServiceValid) {
            const formData = new FormData(contactForm);
            const submitBtn = contactForm.querySelector('button[type="submit"]');
            const originalBtnText = submitBtn.innerHTML;

            submitBtn.innerHTML = 'Mengirim...';
            submitBtn.disabled = true;

            fetch('/contact', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;

                if (data.success) {
                    showCustomAlert(
                        'Pesan Terkirim',
                        data.message || `Terima kasih ${nameInput.value.trim()}! Pesan Anda tentang layanan ${serviceSelect.options[serviceSelect.selectedIndex].text} telah berhasil dikirim. Tim kami akan segera menghubungi Anda`
                    );
                    contactForm.reset();
                    const validInputs = contactForm.querySelectorAll('.valid');
                    validInputs.forEach(input => input.classList.remove('valid'));
                } else if (data.errors) {
                    if (data.errors.nama) {
                        nameError.textContent = data.errors.nama[0];
                        nameInput.classList.add('invalid');
                        nameInput.classList.remove('valid');
                    }
                    if (data.errors.email) {
                        emailError.textContent = data.errors.email[0];
                        emailInput.classList.add('invalid');
                        emailInput.classList.remove('valid');
                    }
                    if (data.errors.layanan) {
                        serviceError.textContent = data.errors.layanan[0];
                        serviceSelect.classList.add('invalid');
                        serviceSelect.classList.remove('valid');
                    }
                    if (data.errors.pesan) {
                        messageError.textContent = data.errors.pesan[0];
                        messageInput.classList.add('invalid');
                        messageInput.classList.remove('valid');
                    }
                }
            })
            .catch(error => {
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
                showCustomAlert('Error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi nanti.');
                console.error('Error:', error);
            });
        }
    });
}

function setupScrollAnimations() {
    const elementsToAnimate = [
        ...document.querySelectorAll('#layanan article'),
        ...document.querySelectorAll('.pricing-card'),
        ...document.querySelectorAll('.blog-card'),
        ...document.querySelectorAll('blockquote'),
        document.querySelector('#kontak form'),
        document.querySelector('.tentang-container')
    ];

    elementsToAnimate.forEach(element => {
        if (element) {
            element.classList.add('scroll-animation');
            element.style.opacity = '0';
            element.style.transform = 'translateY(30px)';
            element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        }
    });

    const isElementInViewport = (el) => {
        if (!el) return false;
        const rect = el.getBoundingClientRect();
        return (
            rect.top <= (window.innerHeight || document.documentElement.clientHeight) * 0.85 &&
            rect.bottom >= 0
        );
    };

    const handleScroll = () => {
        elementsToAnimate.forEach(element => {
            if (element && isElementInViewport(element)) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }
        });
    };

    setTimeout(handleScroll, 100);
    window.addEventListener('scroll', handleScroll);

    const navLinks = document.querySelectorAll('nav a');
    navLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            if (targetId.includes('#')) {
                let targetElement;
                if (this.hostname !== window.location.hostname || this.pathname !== window.location.pathname) return;
                const hash = targetId.substring(targetId.indexOf('#'));
                targetElement = document.querySelector(hash);
                if (targetElement) {
                    e.preventDefault();
                    window.scrollTo({
                        top: targetElement.offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
}

function setupPricingButtons() {
    const pricingButtons = document.querySelectorAll('.pricing-button');

    pricingButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();

            const pricingCard = this.closest('.pricing-card');
            const packageName = pricingCard.querySelector('h4').textContent;

            const contactSection = document.querySelector('#kontak');
            window.scrollTo({
                top: contactSection.offsetTop,
                behavior: 'smooth'
            });

            const serviceSelect = document.querySelector('#layanan');
            const messageField = document.querySelector('#pesan');
            messageField.value = `Saya tertarik dengan ${packageName}. Mohon informasi lebih lanjut.`;

            setTimeout(() => {
                showCustomAlert(
                    'Info Paket',
                    `Anda memilih ${packageName}. Silakan lengkapi form kontak untuk mendapatkan informasi lebih lanjut.`
                );
            }, 1000);

            const serviceHeading = pricingCard.closest('article').querySelector('h3').textContent;

            if (serviceHeading.includes('Website')) {
                serviceSelect.value = 'web';
            } else if (serviceHeading.includes('Penetration')) {
                serviceSelect.value = 'pentest';
            } else if (serviceHeading.includes('Desain')) {
                serviceSelect.value = 'design';
            }

            serviceSelect.dispatchEvent(new Event('change'));
        });
    });
}

function setupBlogInteractions() {
    const blogMoreButton = document.querySelector('.blog-more-button');

    if (blogMoreButton) {
        blogMoreButton.addEventListener('click', function(e) {
            e.preventDefault();
            showCustomAlert(
                'Fitur Segera Hadir',
                'Halaman blog lengkap sedang dalam pengembangan. Silakan kunjungi kembali nanti untuk melihat lebih banyak artikel.'
            );
        });
    }
}
