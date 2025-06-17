<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Beranda') }}
        </h2>
    </x-slot>


    <style>
        :root {
            --custom-green: #1F5233;
            --custom-green-dark: #174026;
            --custom-green-light: #2d7349;
            --custom-green-lighter: #e8f5ec;
            --custom-text: #333333;
            --custom-gray: #f5f5f5;
            --custom-gray-dark: #e0e0e0;
            --custom-white: #ffffff;
            --custom-red: #d32f2f;
            --custom-yellow: #ffd600;
            --box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .slider-container {
            width: 100%;
            max-width: 1200px;
            margin: 30px auto;
            position: relative;
            overflow: hidden;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .slider-wrapper {
            display: flex;
            transition: transform 0.8s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .slide {
            min-width: 100%;
            height: 400px;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .slide-1 {
            background: linear-gradient(135deg, #ffffff 0%, #e8f5e8 100%);
        }

        .slide-2 {
            background: linear-gradient(135deg, #2e7d32 0%, #4caf50 100%);
        }

        .slide-3 {
            background: linear-gradient(135deg, #1b5e20 0%, #43a047 100%);
        }

        .slide-4 {
            background: linear-gradient(135deg, #388e3c 0%, #66bb6a 100%);
        }

        .slide-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 0 60px;
            z-index: 2;
        }

        .text-content {
            flex: 1;
            max-width: 500px;
        }

        .badge {
            display: inline-flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.95);
            padding: 8px 16px;
            border-radius: 25px;
            margin-bottom: 20px;
            font-size: 14px;
            font-weight: 600;
            color: #1b5e20;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(76, 175, 80, 0.3);
        }

        .badge::before {
            content: "🌿";
            margin-right: 8px;
        }

        .main-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
            color: #1b5e20;
        }

        .slide-2 .main-title,
        .slide-3 .main-title,
        .slide-4 .main-title {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .subtitle {
            font-size: 2.2rem;
            font-weight: 700;
            color: #4caf50;
            margin-bottom: 30px;
        }

        .slide-2 .subtitle,
        .slide-3 .subtitle,
        .slide-4 .subtitle {
            color: rgba(255, 255, 255, 0.95);
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
        }

        .cta-button {
            background: linear-gradient(135deg, #2e7d32 0%, #4caf50 100%);
            color: white;
            padding: 15px 35px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.3);
        }

        .cta-button:hover {
            background: linear-gradient(135deg, #1b5e20 0%, #2e7d32 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(76, 175, 80, 0.4);
        }

        .slide-2 .cta-button,
        .slide-3 .cta-button,
        .slide-4 .cta-button {
            background: rgba(255, 255, 255, 0.95);
            color: #1b5e20;
            border: 2px solid rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(15px);
        }

        .slide-2 .cta-button:hover,
        .slide-3 .cta-button:hover,
        .slide-4 .cta-button:hover {
            background: white;
            color: #1b5e20;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(255, 255, 255, 0.4);
        }

        .image-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
        }

        .vegetables-group {
            position: relative;
            width: 500px;
            height: 300px;
            transform: scale(1.1);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-15px) rotate(2deg);
            }
        }

        .dots-container {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 12px;
            z-index: 10;
        }

        .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid rgba(76, 175, 80, 0.5);
        }

        .dot.active {
            background: #4caf50;
            border-color: white;
            transform: scale(1.2);
            box-shadow: 0 0 10px rgba(76, 175, 80, 0.6);
        }

        /* RESPONSIVE DESIGN ADDITIONS */

        /* Tablet Landscape (992px to 1199px) */
        @media (max-width: 1199px) and (min-width: 992px) {
            .slide-content {
                padding: 0 40px;
            }

            .main-title {
                font-size: 3rem;
            }

            .subtitle {
                font-size: 2rem;
            }
        }

        /* Tablet (768px to 991px) */
        @media (max-width: 991px) and (min-width: 768px) {
            .slider-container {
                margin: 20px;
                border-radius: 15px;
            }

            .slide {
                height: 350px;
            }

            .slide-content {
                padding: 0 30px;
            }

            .main-title {
                font-size: 2.8rem;
            }

            .subtitle {
                font-size: 1.8rem;
            }

            .text-content {
                max-width: 400px;
            }

            .cta-button {
                padding: 12px 28px;
                font-size: 15px;
            }

            .vegetables-group {
                width: 400px;
                height: 250px;
                transform: scale(1);
            }
        }

        /* Original responsive breakpoint from your code */
        @media (max-width: 768px) {
            .slide-content {
                flex-direction: column;
                text-align: center;
                padding: 40px 20px;
            }

            .main-title {
                font-size: 2.5rem;
            }

            .subtitle {
                font-size: 1.5rem;
            }

            .vegetables-group {
                width: 300px;
                height: 200px;
                margin-top: 20px;
            }

            .vegetable {
                transform: scale(0.7);
            }
        }

        /* Mobile Portrait (480px to 767px) */
        @media (max-width: 767px) and (min-width: 480px) {
            .slider-container {
                margin: 15px;
                border-radius: 12px;
            }

            .slide {
                height: 400px;
            }

            .slide-content {
                padding: 30px 15px;
            }

            .text-content {
                max-width: none;
                margin-bottom: 20px;
            }

            .badge {
                font-size: 13px;
                padding: 6px 14px;
                margin-bottom: 15px;
            }

            .main-title {
                font-size: 2.2rem;
                margin-bottom: 15px;
            }

            .subtitle {
                font-size: 1.4rem;
                margin-bottom: 20px;
            }

            .cta-button {
                padding: 12px 25px;
                font-size: 14px;
            }

            .dots-container {
                bottom: 15px;
                gap: 10px;
            }

            .dot {
                width: 10px;
                height: 10px;
            }
        }

        /* Small Mobile (320px to 479px) */
        @media (max-width: 479px) {
            .slider-container {
                margin: 10px;
                border-radius: 10px;
            }

            .slide {
                height: 350px;
            }

            .slide-content {
                padding: 25px 15px;
            }

            .main-title {
                font-size: 1.8rem;
                line-height: 1.2;
            }

            .subtitle {
                font-size: 1.2rem;
                margin-bottom: 18px;
            }

            .badge {
                font-size: 12px;
                padding: 5px 12px;
                margin-bottom: 12px;
            }

            .cta-button {
                padding: 10px 20px;
                font-size: 13px;
                letter-spacing: 0.5px;
            }

            .dots-container {
                bottom: 12px;
                gap: 8px;
            }

            .dot {
                width: 8px;
                height: 8px;
            }

            .vegetables-group {
                width: 250px;
                height: 150px;
                transform: scale(0.8);
            }
        }

        /* Extra Small Mobile (below 320px) */
        @media (max-width: 319px) {
            .slider-container {
                margin: 5px;
            }

            .slide {
                height: 320px;
            }

            .slide-content {
                padding: 20px 10px;
            }

            .main-title {
                font-size: 1.5rem;
            }

            .subtitle {
                font-size: 1rem;
            }

            .badge {
                font-size: 11px;
                padding: 4px 8px;
            }

            .cta-button {
                padding: 8px 16px;
                font-size: 12px;
            }

            .vegetables-group {
                width: 200px;
                height: 120px;
                transform: scale(0.7);
            }
        }

        /* Landscape orientation for mobile devices */
        @media (max-height: 500px) and (orientation: landscape) and (max-width: 768px) {
            .slide {
                height: 280px;
            }

            .slide-content {
                flex-direction: row;
                padding: 15px 20px;
            }

            .main-title {
                font-size: 1.8rem;
            }

            .subtitle {
                font-size: 1.2rem;
            }

            .text-content {
                margin-bottom: 0;
                margin-right: 20px;
            }

            .vegetables-group {
                width: 200px;
                height: 150px;
                transform: scale(0.8);
            }
        }

        .features {
            padding: 6rem 5%;
            background: linear-gradient(135deg, #f8fff8, #ffffff);
        }

        .features-container {
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 800;
            color: #1F5233;
            margin-bottom: 3rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #4caf50, #2d5016);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }

        .feature-card:hover::before {
            transform: scaleX(1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #4caf50, #2d5016);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .feature-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #2d5016;
            margin-bottom: 1rem;
        }

        .feature-description {
            color: #666;
            line-height: 1.7;
        }

        /* Mobile Menu */
        .mobile-menu {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .mobile-menu span {
            width: 25px;
            height: 3px;
            background: #333;
            margin: 3px 0;
            transition: 0.3s;
        }

        /* Animations */
        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .mobile-menu {
                display: flex;
            }

            .search-box input {
                width: 150px;
            }

            .hero-content {
                grid-template-columns: 1fr;
                text-align: center;
                gap: 2rem;
            }

            .hero-buttons {
                justify-content: center;
            }

            .nav {
                padding: 1rem 3%;
            }

            .features {
                padding: 4rem 3%;
            }

            .features-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .nav {
                padding: 1rem;
            }

            .features {
                padding: 3rem 1rem;
            }

            .hero-content {
                padding: 0 1rem;
            }
        }

        footer {
            background-color: var(--custom-green);
            color: white;
            padding: 2rem;
            margin-top: 3rem;
        }

        .footer-content {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
        }

        @media (min-width: 768px) {
            .footer-content {
                flex-direction: row;
            }
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .footer-logo img {
            width: 30px;
            height: 30px;
        }

        .footer-logo h3 {
            font-size: 1.2rem;
            font-weight: 500;
        }

        .footer-info p {
            font-size: 0.9rem;
            opacity: 0.9;
        }
    </style>
    </head>

    <body>
        <div class="slider-container">
            <div class="slider-wrapper" id="sliderWrapper">
                <div class="slide slide-1">
                    <div class="slide-content">
                        <div class="text-content">
                            <div class="badge">100% Produk Asli</div>
                            <h1 class="main-title">Lezat & Sehat</h1>
                            <h2 class="subtitle">Makanan Organik</h2>
                            @auth
                                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'user')
                                    <button class="cta-button"><a href="{{ route('shop.read') }}">Jelajahi
                                            Produk</a></button>
                                @endif
                            @endauth
                        </div>
                        <div class="image-content">
                            <img src="{{ asset('build/assets/image/1.jpg') }}">
                        </div>
                    </div>
                </div>

                <div class="slide slide-2">
                    <div class="slide-content">
                        <div class="text-content">
                            <div class="badge">Segar Setiap Hari</div>
                            <h1 class="main-title">Buah & Sayur</h1>
                            <h2 class="subtitle">Langsung Dari Kebun</h2>
                            @auth
                                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'user')
                                    <button class="cta-button"><a href="{{ route('shop.read') }}">Pesan
                                            Sekarang</a></button>
                                @endif
                            @endauth
                        </div>
                        <div class="image-content">
                            <img src="{{ asset('build/assets/image/22.jpg') }}">
                        </div>
                    </div>
                </div>

                <div class="slide slide-3">
                    <div class="slide-content">
                        <div class="text-content">
                            <div class="badge">Tanpa Pestisida</div>
                            <h1 class="main-title">Hidup Sehat</h1>
                            <h2 class="subtitle">Mulai Dari Sekarang</h2>
                            @auth
                                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'user')
                                    <button class="cta-button"><a href="{{ route('shop.read') }}">Mulai Belanja</a></button>
                                @endif
                            @endauth
                        </div>
                        <div class="image-content">
                            <img src="{{ asset('build/assets/image/21.jpg') }}">
                        </div>
                    </div>
                </div>

                <div class="slide slide-4">
                    <div class="slide-content">
                        <div class="text-content">
                            <div class="badge">Kualitas Premium</div>
                            <h1 class="main-title">Nutrisi Terbaik</h1>
                            <h2 class="subtitle">Untuk Keluarga</h2>
                            @auth
                                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'user')
                                    <button class="cta-button"><a href="{{ route('shop.read') }}">Lihat Katalog</a></button>
                                @endif
                            @endauth

                        </div>
                        <div class="image-content">
                            <img src="{{ asset('build/assets/image/3.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="dots-container">
                <div class="dot active" onclick="goToSlide(0)"></div>
                <div class="dot" onclick="goToSlide(1)"></div>
                <div class="dot" onclick="goToSlide(2)"></div>
                <div class="dot" onclick="goToSlide(3)"></div>
            </div>
        </div>
        <div class="spc"></div>

        <section class="features">
            <div class="features-container">
                <h2 class="section-title">Mengapa Memilih Kami?</h2>
                <div class="features-grid">
                    <div class="feature-card">
                        <div class="feature-icon">🌱</div>
                        <h3 class="feature-title">100% Organik</h3>
                        <p class="feature-description">Semua produk kami bersertifikat organik tanpa penggunaan
                            pestisida atau bahan kimia berbahaya. Aman untuk seluruh keluarga.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">🚚</div>
                        <h3 class="feature-title">Pengiriman Cepat</h3>
                        <p class="feature-description">Sistem pengiriman yang efisien memastikan produk sampai dalam
                            kondisi segar dan berkualitas tinggi langsung ke pintu rumah Anda.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">💎</div>
                        <h3 class="feature-title">Kualitas Premium</h3>
                        <p class="feature-description">Setiap produk melalui proses seleksi ketat untuk memastikan hanya
                            yang terbaik yang sampai ke tangan konsumen.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">🤝</div>
                        <h3 class="feature-title">Mendukung Petani Lokal</h3>
                        <p class="feature-description">Bermitra langsung dengan petani lokal untuk memberikan harga yang
                            adil dan mendukung ekonomi masyarakat.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">🔒</div>
                        <h3 class="feature-title">Pembayaran Aman</h3>
                        <p class="feature-description">Sistem pembayaran yang aman dan terpercaya dengan berbagai
                            pilihan metode pembayaran yang mudah dan praktis.</p>
                    </div>

                    <div class="feature-card">
                        <div class="feature-icon">💚</div>
                        <h3 class="feature-title">Ramah Lingkungan</h3>
                        <p class="feature-description">Kemasan eco-friendly dan praktik berkelanjutan untuk menjaga
                            kelestarian lingkungan dan masa depan yang lebih hijau.</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">❄️</div>
                        <h3 class="feature-title">Produk Fresh</h3>
                        <p class="feature-description">Produk langsung dipanen dari perkebunan tanpa melalui proses
                            pengawetan</p>
                    </div>
                    <div class="feature-card">
                        <div class="feature-icon">📚</div>
                        <h3 class="feature-title">Stok Terjamin</h3>
                        <p class="feature-description">Ketersediaan jumlah produk yang terjamin selalu ada dan
                            berkualitas</p>
                    </div>
                </div>
            </div>
        </section>
        <script>
            let currentSlide = 0;
            const totalSlides = 4;
            const slideInterval = 3500;
            let intervalId;
            document.addEventListener('DOMContentLoaded', () => {
                initSlider();
            });
            const sliderWrapper = document.getElementById('sliderWrapper');
            const dots = document.querySelectorAll('.dot');

            function updateSlider() {
                const translateX = -currentSlide * 100;
                sliderWrapper.style.transform = `translateX(${translateX}%)`;

                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentSlide);
                });
            }

            function nextSlide() {
                currentSlide = (currentSlide + 1) % totalSlides;
                updateSlider();
            }

            function goToSlide(slideIndex) {
                currentSlide = slideIndex;
                updateSlider();
            }

            function startSlider() {
                stopSlider();
                intervalId = setInterval(nextSlide, slideInterval);
            }

            function stopSlider() {
                clearInterval(intervalId);
            }

            startSlider();

            const sliderContainer = document.querySelector('.slider-container');

            let startX = 0;
            let endX = 0;

            sliderContainer.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
                stopSlider();
            });

            sliderContainer.addEventListener('touchmove', (e) => {
                endX = e.touches[0].clientX;
            });

            sliderContainer.addEventListener('touchend', () => {
                const threshold = 50;
                const diff = startX - endX;

                if (Math.abs(diff) > threshold) {
                    if (diff > 0) {
                        nextSlide();
                    } else {
                        currentSlide = currentSlide === 0 ? totalSlides - 1 : currentSlide - 1;
                        updateSlider();
                    }
                }

                startSlider();
            });

            document.addEventListener('keydown', (e) => {
                stopSlider();
                if (e.key === 'ArrowLeft') {
                    currentSlide = currentSlide === 0 ? totalSlides - 1 : currentSlide - 1;
                    updateSlider();
                } else if (e.key === 'ArrowRight') {
                    nextSlide();
                }
                startSlider();
            });


            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Mobile menu toggle
            const mobileMenu = document.querySelector('.mobile-menu');
            const navLinks = document.querySelector('.nav-links');

            mobileMenu.addEventListener('click', () => {
                navLinks.style.display = navLinks.style.display === 'flex' ? 'none' : 'flex';
            });

            // Add cart functionality
            const cartIcon = document.querySelector('.cart-icon');
            const cartBadge = document.querySelector('.cart-badge');
            let cartCount = 3;

            cartIcon.addEventListener('click', () => {
                cartIcon.style.animation = 'none';
                cartIcon.offsetHeight; // Trigger reflow
                cartIcon.style.animation = 'bounce 0.5s ease';
            });

            // Search functionality
            const searchInput = document.querySelector('.search-box input');
            searchInput.addEventListener('focus', () => {
                searchInput.style.transform = 'scale(1.05)';
            });

            searchInput.addEventListener('blur', () => {
                searchInput.style.transform = 'scale(1)';
            });

            // Feature cards intersection observer
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animation = 'slideInLeft 0.6s ease-out';
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.feature-card').forEach(card => {
                observer.observe(card);
            });

            // Add some interactivity to the hero product card
            const productCard = document.querySelector('.hero-product-card');
            const exploreBtn = document.querySelector('.explore-btn');

            exploreBtn.addEventListener('click', () => {
                exploreBtn.innerHTML = 'Loading...';
                setTimeout(() => {
                    exploreBtn.innerHTML = '✓ Berhasil! Lihat Katalog';
                    exploreBtn.style.background = 'linear-gradient(135deg, #4caf50, #2d5016)';
                }, 1000);
            });

            // Parallax effect for hero background
            window.addEventListener('scroll', () => {
                const scrolled = window.pageYOffset;
                const hero = document.querySelector('.hero');
                const parallax = scrolled * 0.5;
                hero.style.transform = `translateY(${parallax}px)`;
            });
        </script>
    </body>
</x-app-layout>
<footer>
    <div class="footer-content">
        <div class="footer-logo">
            <img src="{{ asset('build/assets/image/logo-white.png') }}" alt="HarvestFarm Logo">
            <h3>HarvestFarm</h3>
        </div>
        <div class="footer-info">
            <p>&copy; {{ date('Y') }} HarvestFarm. Semua hak dilindungi.</p>
        </div>
    </div>
</footer>
