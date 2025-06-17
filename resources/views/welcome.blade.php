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
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            font-family: 'Poppins', sans-serif;
            color: #ffffff;
        }

        .hero-container {
            position: relative;
            height: 100vh;
            width: 100%;
            overflow: hidden;
        }

        .hero-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("{{ asset('build/assets/image/farm.jpg') }}");
            background-size: cover;
            background-position: center;
            z-index: -1;
            /* Animation for hero image */
            animation: heroZoom 20s infinite alternate ease-in-out;
        }

        /* Animasi zoom pada hero image */
        @keyframes heroZoom {
            0% {
                transform: scale(1);
            }

            100% {
                transform: scale(1.1);
            }
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
            z-index: 0;
            /* Animation for overlay */
            animation: fadeIn 1.5s ease-in;
        }

        .content {
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            text-align: center;
            color: white;
            z-index: 1;
        }

        .logo {
            width: 150px;
            height: 150px;
            background-color: white;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            padding: 15px;
            /* Animation for logo */
            animation: fadeInDown 1.2s ease-out;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease-in-out;
        }

        .logo:hover {
            transform: translateY(-5px) scale(1.05);
        }

        .logo img {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }

        .brand-name {
            font-size: 5rem;
            font-weight: bold;
            letter-spacing: 5px;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            /* Animation for brand name */
            animation: fadeInUp 1.5s ease-out;
        }

        .tagline {
            font-size: 2.5rem;
            font-weight: 300;
            margin-top: 20px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
            /* Animation for tagline */
            animation: fadeIn 2s ease-out;
            opacity: 0;
            animation-fill-mode: forwards;
            animation-delay: 0.5s;
        }

        /* Navbar styling - opsional */
        .navbar {
            position: absolute;
            top: 0;
            width: 100%;
            padding: 20px;
            display: flex;
            justify-content: flex-end;
            z-index: 2;
            /* Animation for navbar */
            animation: slideInDown 1s ease-out;
        }

        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
            font-weight: bold;
            position: relative;
            transition: all 0.3s ease;
        }

        .navbar a:hover {
            text-decoration-color: #004d2c;
            transform: translateY(-2px);
        }

        .navbar a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background-color: #004d2c;
            transition: width 0.3s ease;
        }

        .navbar a:hover::after {
            width: 100%;
        }

        /* Button animation */
        .cta-button {
            background-color: #004d2c;
            color: white;
            padding: 12px 24px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            animation: fadeIn 2s ease-out;
            opacity: 0;
            animation-fill-mode: forwards;
            animation-delay: 1s;
            transition: all 0.3s ease;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0, 77, 44, 0.3);
        }

        .cta-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }

        .cta-button:hover::before {
            left: 100%;
            animation: shine 1.5s;
        }

        @keyframes shine {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .brand-name {
                font-size: 3.5rem;
            }

            .tagline {
                font-size: 1.8rem;
            }
        }

        @media (max-width: 480px) {
            .brand-name {
                font-size: 2.5rem;
            }

            .tagline {
                font-size: 1.5rem;
            }

            .logo {
                width: 100px;
                height: 100px;
            }
        }
    </style>
</head>

<body>
    <div class="hero-container">
        <div class="hero-image"></div>
        <div class="overlay"></div>

        @if (Route::has('login'))
            <div class="navbar">
                @auth
                    <a href="{{ route('dashboard') }}" class="animate__animated animate__fadeIn animate__delay-1s">Back</a>
                @else
                    <a href="{{ route('login') }}"
                        class="active animate__animated animate__fadeIn animate__delay-1s">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="animate__animated animate__fadeIn animate__delay-1s">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="logo">
                <img src="{{ asset('build/assets/image/logo-white.png') }}" alt="HarvestFarm Logo">
            </div>
            <h1 class="brand-name">HarvestFarm</h1>
            <h2 class="tagline">Smart Farming Fair Trading</h2>

            <div style="margin-top: 40px;">
                <a href="{{ route('about') }}" class="cta-button">About Us</a>
            </div>
        </div>
    </div>

    <script>
        // Tambahan animasi untuk tombol CTA
        document.addEventListener('DOMContentLoaded', function() {
            const ctaButton = document.querySelector('.cta-button');

            ctaButton.addEventListener('mouseover', function() {
                this.style.backgroundColor = '#006d3e';
            });

            ctaButton.addEventListener('mouseout', function() {
                this.style.backgroundColor = '#004d2c';
            });
        });
    </script>

    @livewireScripts
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</body>

</html>
