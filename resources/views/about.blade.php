<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HarvestFarm</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Animation Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        .hero-section {
            background-image: url("{{ asset('build/assets/image/farm.jpg') }}");
            background-size: cover;
            background-position: center;
            height: 60vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 800px;
            padding: 0 20px;
            animation: fadeInUp 1s ease-out;
        }

        .logo-container {
            margin-bottom: 30px;
        }

        .logo {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            animation: float 3s ease-in-out infinite;
        }

        .logo svg {
            width: 40px;
            height: 40px;
            fill: #4CAF50;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 300;
            margin-bottom: 20px;
            letter-spacing: -1px;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            opacity: 0.9;
            font-weight: 500;
        }

        .main-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 80px 20px;
        }

        .section {
            margin-bottom: 80px;
        }

        .section-title {
            font-size: 2.5rem;
            color: #2E7D32;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            width: 60px;
            height: 3px;
            background: linear-gradient(45deg, #4CAF50, #8BC34A);
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .about-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 60px;
        }

        .about-card {
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border-top: 4px solid #4CAF50;
        }

        .about-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .card-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #4CAF50, #8BC34A);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 25px;
        }

        .card-icon svg {
            width: 30px;
            height: 30px;
            fill: white;
        }

        .card-title {
            font-size: 1.5rem;
            color: #2E7D32;
            margin-bottom: 15px;
            font-weight: 600;
        }

        .card-text {
            color: #666;
            font-size: 1rem;
            line-height: 1.7;
        }

        .story-section {
            background: linear-gradient(135deg, #f8f9fa, #e8f5e8);
            padding: 80px 20px;
            margin: 80px 0;
        }

        .story-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }

        .story-text {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .value-item {
            text-align: center;
            padding: 30px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .value-item:hover {
            transform: translateY(-5px);
        }

        .value-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(45deg, #4CAF50, #8BC34A);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }

        .value-icon svg {
            width: 25px;
            height: 25px;
            fill: white;
        }

        .value-title {
            font-size: 1.3rem;
            color: #2E7D32;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .value-desc {
            color: #666;
            font-size: 0.95rem;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 60px;
        }

        .team-member {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .member-photo {
            width: 100%;
            height: 300px;
            position: relative;
            overflow: hidden;
        }


        .photo-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .photo-placeholder::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-size: cover;
        }


        .member-info {
            padding: 25px;
            text-align: center;
            background: white;
        }

        .member-name {
            font-size: 1.5rem;
            color: #2E7D32;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .member-role {
            font-size: 0.95rem;
            color: #666;
            margin-bottom: 15px;
            font-weight: 400;
            font-style: italic;
        }

        .member-desc {
            color: #555;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .member-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            justify-content: center;
        }

        .skill-tag {
            background: #F1F8E9;
            color: #2E7D32;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid rgba(76, 175, 80, 0.2);
        }

        .cta-section {
            background: linear-gradient(135deg, #004d2c, #39883c);
            color: white;
            padding: 80px 20px;
            text-align: center;
        }

        .cta-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .cta-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 300;
        }

        .cta-text {
            font-size: 1.2rem;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .cta-button {
            display: inline-block;
            background: white;
            color: #004d2c;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        /* Enhanced Animations */
        .fade-in-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .fade-in-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .slide-in-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.8s ease;
        }

        .slide-in-left.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .slide-in-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.8s ease;
        }

        .slide-in-right.visible {
            opacity: 1;
            transform: translateX(0);
        }

        .scale-in {
            opacity: 0;
            transform: scale(0.8);
            transition: all 0.6s ease;
        }

        .scale-in.visible {
            opacity: 1;
            transform: scale(1);
        }

        /* Parallax effect */
        .parallax-bg {
            background-attachment: fixed;
            will-change: transform;
        }

        /* Typing animation */
        .typing-text {
            overflow: hidden;
            border-right: 3px solid white;
            white-space: nowrap;
            animation: typing 3s steps(30, end), blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from {
                width: 0
            }

            to {
                width: 100%
            }
        }

        @keyframes blink-caret {

            from,
            to {
                border-color: transparent
            }

            50% {
                border-color: white
            }
        }

        /* Particle background */
        .particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            overflow: hidden;
        }

        .particle {
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: float-particles 15s infinite linear;
        }

        @keyframes float-particles {
            0% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-10vh) rotate(360deg);
                opacity: 0;
            }
        }

        /* Counter animation */
        .counter {
            font-size: 2rem;
            font-weight: 700;
            color: #2E7D32;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1.5rem;
            }

            .section-title {
                font-size: 2rem;
            }

            .about-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .main-content {
                padding: 60px 20px;
            }

            .parallax-bg {
                background-attachment: scroll;
            }
        }
    </style>
</head>

<body>
    <div class="hero-section parallax-bg">

        <div class="particles" id="particles"></div>

        <div class="hero-content">
            <div class="logo-container">
                <div class="logo">
                    <img src="{{ asset('build/assets/image/logo-white.png') }}" alt="HarvestFarm Logo">
                </div>
            </div>
            <h1 class="hero-title">About HarvestFarm</h1>
            <p class="hero-subtitle typing-text">Smart Farming Fair Trading</p>
        </div>
    </div>

    <div class="main-content">
        <div class="section">
            <h2 class="section-title fade-in-on-scroll">Who We Are</h2>
            <div class="about-grid">
                <div class="about-card fade-in-on-scroll">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M12,6.5A2.5,2.5 0 0,1 14.5,9A2.5,2.5 0 0,1 12,11.5A2.5,2.5 0 0,1 9.5,9A2.5,2.5 0 0,1 12,6.5M12,2A7,7 0 0,1 19,9C19,14.25 12,22 12,22C12,22 5,14.25 5,9A7,7 0 0,1 12,2M12,4A5,5 0 0,0 7,9C7,10 7,12 12,18.71C17,12 17,10 17,9A5,5 0 0,0 12,4Z" />
                        </svg>
                    </div>
                    <h3 class="card-title">Local Focus</h3>
                    <p class="card-text">Kami menghubungkan petani lokal secara langsung dengan konsumen, mendukung
                        pertanian masyarakat dan mengurangi jarak dari pertanian ke meja makan.</p>
                </div>

                <div class="about-card fade-in-on-scroll">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M9,1V3H15V1H17V3H21A2,2 0 0,1 23,5V19A2,2 0 0,1 21,21H3A2,2 0 0,1 1,19V5A2,2 0 0,1 3,3H7V1H9M21,8H3V19H21V8M21,5H3V6H21V5Z" />
                        </svg>
                    </div>
                    <h3 class="card-title">Fresh & Seasonal</h3>
                    <p class="card-text">Platform kami menampilkan hasil bumi musiman dengan kesegaran terbaik,
                        memastikan Anda mendapatkan buah dan sayur dengan kualitas terbaik sepanjang tahun.</p>
                </div>

                <div class="about-card fade-in-on-scroll">
                    <div class="card-icon">
                        <svg viewBox="0 0 24 24">
                            <path d="M12,2L13.09,8.26L22,9L13.09,9.74L12,16L10.91,9.74L2,9L10.91,8.26L12,2Z" />
                        </svg>
                    </div>
                    <h3 class="card-title">Technology Driven</h3>
                    <p class="card-text">Kami memanfaatkan teknologi mutakhir untuk menciptakan rantai pasokan yang
                        efisien dan memberikan harga yang transparan bagi petani dan konsumen.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="story-section">
        <div class="story-content">
            <h2 class="section-title fade-in-on-scroll">Our Story</h2>
            <p class="story-text slide-in-left">
                Harvestfarm lahir dengan visi untuk membawa perubahan signifikan dalam sektor pertanian Indonesia,
                dengan tujuan memperkuat hubungan antara petani dan pembeli yang peduli akan kualitas serta
                keberlanjutan, berkomitmen menciptakan masa depan pertanian yang lebih transparan, menguntungkan, dan
                berkelanjutan serta mendukung Tujuan Pembangunan Berkelanjutan <span class="counter"
                    data-target="3">0</span> (SDGs) yaitu Zero Hunger, Decent Work and
                Economic Growth, dan Responsible Consumption and Production.

            </p>
            <p class="story-text slide-in-right">
                Kami percaya bahwa teknologi dapat meningkatkan efisiensi dan profitabilitas pertanian, serta memastikan
                produk pertanian segar, berkualitas, dan organik dapat diakses oleh lebih banyak orang, memberikan
                dampak positif bagi kesejahteraan petani, dan memberikan dampak positif terhadap kesejahteraan petani
                dan mempermudah akses konsumen terhadap produk pertanian segar dan berkualitas.
            </p>
        </div>
    </div>

    <div class="main-content">
        <div class="section">
            <h2 class="section-title fade-in-on-scroll">Our Values</h2>
            <div class="values-grid">
                <div class="value-item scale-in">
                    <div class="value-icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M12,2C6.48,2 2,6.48 2,12C2,17.52 6.48,22 12,22C17.52,22 22,17.52 22,12C22,6.48 17.52,2 12,2M12,20C7.59,20 4,16.41 4,12C4,7.59 7.59,4 12,4C16.41,4 20,7.59 20,12C20,16.41 16.41,20 12,20M16.59,7.58L10,14.17L7.41,11.59L6,13L10,17L18,9L16.59,7.58Z" />
                        </svg>
                    </div>
                    <h4 class="value-title">Quality</h4>
                    <p class="value-desc">Kami mempertahankan standar tertinggi untuk semua produk di platform kami</p>
                </div>

                <div class="value-item scale-in">
                    <div class="value-icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M12,2A3,3 0 0,1 15,5V11A3,3 0 0,1 12,14A3,3 0 0,1 9,11V5A3,3 0 0,1 12,2M19,11C19,14.53 16.39,17.44 13,17.93V21H11V17.93C7.61,17.44 5,14.53 5,11H7A5,5 0 0,0 12,16A5,5 0 0,0 17,11H19Z" />
                        </svg>
                    </div>
                    <h4 class="value-title">Transparency</h4>
                    <p class="value-desc">Komunikasi terbuka tentang harga, sumber, dan praktik pertanian</p>
                </div>

                <div class="value-item scale-in">
                    <div class="value-icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M17,8C8,10 5.9,16.17 3.82,21.34L5.71,22L6.66,19.7C7.14,19.87 7.64,20 8,20C19,20 22,3 22,3C21,5 14,5.25 9,6.25C4,7.25 2,11.5 2,13.5C2,15.5 3.75,17.25 3.75,17.25C7,8 17,8 17,8Z" />
                        </svg>
                    </div>
                    <h4 class="value-title">Sustainability</h4>
                    <p class="value-desc">Mendukung praktik pertanian ramah lingkungan untuk masa depan yang lebih baik
                    </p>
                </div>

                <div class="value-item scale-in">
                    <div class="value-icon">
                        <svg viewBox="0 0 24 24">
                            <path
                                d="M16,4C18.2,4 20,5.8 20,8C20,10.1 18.2,12 16,12C13.9,12 12,10.1 12,8C12,5.8 13.9,4 16,4M16,5.9A2.1,2.1 0 0,0 13.9,8A2.1,2.1 0 0,0 16,10.1A2.1,2.1 0 0,0 18.1,8A2.1,2.1 0 0,0 16,5.9M16,13C18.7,13 22,14.3 22,17V20H10V17C10,14.3 13.3,13 16,13Z" />
                        </svg>
                    </div>
                    <h4 class="value-title">Community</h4>
                    <p class="value-desc">Membangun hubungan yang kuat antara petani dan konsumen</p>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="section">
            <h2 class="section-title fade-in-on-scroll">Meet Our Team</h2>
            <div class="team-grid">
                <div class="team-member fade-in-on-scroll">
                    <div class="member-photo">
                        <div class="photo-placeholder">
                            <div class="photo-placeholder">
                                <img src="{{ asset('build/assets/image/rifqi.jpg') }}">
                            </div>
                        </div>
                    </div>
                    <div class="member-info">
                        <h3 class="member-name">Ahmad Rifqi Abdurrahman</h3>
                        <p class="member-role">Leader Team</p>
                        <p class="member-desc">Specialist Business Idea in HarvestFarm E-Commerce platforms and
                            UI/UX solutions.</p>
                        <div class="member-skills">
                            <span class="skill-tag">Figma</span>
                            <span class="skill-tag">Business Plan</span>
                        </div>
                    </div>
                </div>

                <div class="team-member fade-in-on-scroll">
                    <div class="member-photo">
                        <div class="photo-placeholder">
                            <div class="photo-placeholder">
                                <img src="{{ asset('build/assets/image/bayu.jpg') }}">
                            </div>
                        </div>
                    </div>
                    <div class="member-info">
                        <h3 class="member-name">Mohammad Bayu Rizki</h3>
                        <p class="member-role">Frontend Developer</p>
                        <p class="member-desc">Design web specialist focused on creating intuitive interfaces for
                            farmers
                            and
                            consumers. </p>
                        <div class="member-skills">
                            <span class="skill-tag">Livewire</span>
                            <span class="skill-tag">Tailwind CSS</span>
                            <span class="skill-tag">CSS3</span>
                        </div>
                    </div>
                </div>

                <div class="team-member fade-in-on-scroll">
                    <div class="member-photo">
                        <div class="photo-placeholder">
                            <div class="photo-placeholder">
                                <img src="{{ asset('build/assets/image/radit.jpg') }}">
                            </div>
                        </div>
                    </div>
                    <div class="member-info">
                        <h3 class="member-name">Raditya Bagus Pradana</h3>
                        <p class="member-role">Backend Developer</p>
                        <p class="member-desc">Database architect and API specialist ensuring secure, scalable
                            solutions
                            for our growing farmer network.</p>
                        <div class="member-skills">
                            <span class="skill-tag">PHP</span>
                            <span class="skill-tag">Laravel 12</span>
                            <span class="skill-tag">MySQL</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="cta-section">
        <div class="cta-content fade-in-on-scroll">
            <h2 class="cta-title">Join Our E-Commerce</h2>
            <p class="cta-text">Jadilah bagian dari revolusi pertanian. Baik Anda seorang petani yang ingin menjangkau
                pasar baru atau konsumen yang mencari produk segar dan berkualitas, kami siap menghubungkan Anda.</p>
            <a href="{{ route('register') }}" class="cta-button">Register</a>
        </div>
    </div>

    <!-- Enhanced JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -100px 0px'
            };

            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);

            // Observe all animated elements
            document.querySelectorAll('.fade-in-on-scroll, .slide-in-left, .slide-in-right, .scale-in').forEach(
                el => {
                    observer.observe(el);
                });

            // Counter animation
            function animateCounter(counter) {
                const target = parseInt(counter.getAttribute('data-target'));
                const duration = 2000; // 2 seconds
                const step = target / (duration / 16); // 60fps
                let current = 0;

                const timer = setInterval(() => {
                    current += step;
                    if (current >= target) {
                        counter.textContent = target;
                        clearInterval(timer);
                    } else {
                        counter.textContent = Math.floor(current);
                    }
                }, 16);
            }

            // Trigger counter when visible
            const counterObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            document.querySelectorAll('.counter').forEach(counter => {
                counterObserver.observe(counter);
            });

            // Floating particles animation
            function createParticle() {
                const particle = document.createElement('div');
                particle.className = 'particle';

                const size = Math.random() * 5 + 2;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.animationDuration = (Math.random() * 10 + 10) + 's';
                particle.style.animationDelay = Math.random() * 5 + 's';

                return particle;
            }

            // Add particles to hero section
            const particlesContainer = document.getElementById('particles');
            if (particlesContainer) {
                for (let i = 0; i < 20; i++) {
                    particlesContainer.appendChild(createParticle());
                }
            }

            // Parallax scrolling effect
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const parallaxElements = document.querySelectorAll('.parallax-bg');

                parallaxElements.forEach(element => {
                    const speed = 0.5;
                    element.style.transform = translateY($ {
                            scrolled * speed
                        }
                        px);
                });
            });

            // Enhanced hover effects for cards
            document.querySelectorAll('.about-card, .team-member, .value-item').forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-15px) scale(1.02)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Smooth scroll for internal links
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

            // Add typing effect completion callback
            const typingText = document.querySelector('.typing-text');
            if (typingText) {
                setTimeout(() => {
                    typingText.style.borderRight = 'none';
                }, 4000);
            }

            // Random sparkle effect on icons
            function addSparkleEffect(element) {
                const sparkle = document.createElement('div');
                sparkle.style.position = 'absolute';
                sparkle.style.width = '4px';
                sparkle.style.height = '4px';
                sparkle.style.background = '#FFD700';
                sparkle.style.borderRadius = '50%';
                sparkle.style.pointerEvents = 'none';
                sparkle.style.animation = 'sparkle 1s ease-out forwards';

                const rect = element.getBoundingClientRect();
                sparkle.style.left = (rect.left + Math.random() * rect.width) + 'px';
                sparkle.style.top = (rect.top + Math.random() * rect.height) + 'px';

                document.body.appendChild(sparkle);

                setTimeout(() => {
                    sparkle.remove();
                }, 1000);
            }

            // Add sparkle animation keyframes
            const sparkleCSS = `
                @keyframes sparkle {
                    0% {
                        opacity: 0;
                        transform: scale(0) rotate(0deg);
                    }
                    50% {
                        opacity: 1;
                        transform: scale(1) rotate(180deg);
                    }
                    100% {
                        opacity: 0;
                        transform: scale(0) rotate(360deg);
                    }
                }
            `;

            const styleSheet = document.createElement('style');
            styleSheet.textContent = sparkleCSS;
            document.head.appendChild(styleSheet);

            // Add sparkle effect to icons on hover
            document.querySelectorAll('.card-icon, .value-icon').forEach(icon => {
                icon.addEventListener('mouseenter', function() {
                    setInterval(() => {
                        addSparkleEffect(this);
                    }, 300);
                });
            });

            // Staggered animation for grid items
            document.querySelectorAll('.about-grid .about-card').forEach((card, index) => {
                card.style.animationDelay = $ {
                    index * 0.2
                }
                s;
            });

            document.querySelectorAll('.values-grid .value-item').forEach((item, index) => {
                item.style.animationDelay = $ {
                    index * 0.1
                }
                s;
            });

            document.querySelectorAll('.team-grid .team-member').forEach((member, index) => {
                member.style.animationDelay = $ {
                    index * 0.3
                }
                s;
            });

            // Dynamic background color change on scroll
            let lastScrollTop = 0;
            window.addEventListener('scroll', function() {
                const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                const docHeight = document.documentElement.scrollHeight - window.innerHeight;
                const scrollPercent = scrollTop / docHeight;

                // Change hero overlay opacity based on scroll
                const heroSection = document.querySelector('.hero-section');
                if (heroSection) {
                    const overlay = heroSection.querySelector('::before') || heroSection;
                    const opacity = Math.min(scrollPercent * 2, 0.7);
                    heroSection.style.background =
                        linear - gradient(rgba(0, 0, 0, $ {
                            opacity
                        }), rgba(0, 0, 0, $ {
                            opacity
                        })), url("{{ asset('build/assets/image/farm.jpg') }}");
                    heroSection.style.backgroundSize = 'cover';
                    heroSection.style.backgroundPosition = 'center';
                }

                lastScrollTop = scrollTop;
            });

            // Add loading animation
            window.addEventListener('load', function() {
                document.body.style.opacity = '0';
                document.body.style.transition = 'opacity 0.5s ease';

                setTimeout(() => {
                    document.body.style.opacity = '1';
                }, 100);
            });

            // Interactive skill tags
            document.querySelectorAll('.skill-tag').forEach(tag => {
                tag.addEventListener('click', function() {
                    this.style.transform = 'scale(1.1)';
                    this.style.background = '#4CAF50';
                    this.style.color = 'white';

                    setTimeout(() => {
                        this.style.transform = 'scale(1)';
                        this.style.background = '#F1F8E9';
                        this.style.color = '#2E7D32';
                    }, 200);
                });
            });

            // Add mouse trail effect
            let mouseTrail = [];
            document.addEventListener('mousemove', function(e) {
                mouseTrail.push({
                    x: e.clientX,
                    y: e.clientY,
                    time: Date.now()
                });

                // Keep only recent positions
                mouseTrail = mouseTrail.filter(point => Date.now() - point.time < 500);
            });

            // CTA button pulse animation
            const ctaButton = document.querySelector('.cta-button');
            if (ctaButton) {
                setInterval(() => {
                    ctaButton.style.boxShadow = '0 0 20px rgba(255, 255, 255, 0.5)';
                    setTimeout(() => {
                        ctaButton.style.boxShadow = '0 5px 15px rgba(0, 0, 0, 0.2)';
                    }, 500);
                }, 3000);
            }
        });
    </script>
    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
