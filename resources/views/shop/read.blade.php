<x-app-layout>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    </head>
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

        .hero {
            background-color: var(--custom-green-dark);
            color: var(--custom-white);
            padding: 3rem 2rem;
            text-align: center;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero h2 {
            font-size: 2.3rem;
            margin-bottom: 1rem;
            font-weight: bold;
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .filter-section {
            padding: 1.5rem 2rem;
            background-color: var(--custom-white);
            box-shadow: var(--box-shadow);
            margin-bottom: 2rem;
            margin-top: 2rem;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            border-radius: 8px;
        }

        #filterForm {
            display: flex;
            gap: 1rem;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .search-bar {
            display: flex;
            flex: 1;
            max-width: 500px;
            position: relative;
        }

        .search-bar input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--custom-gray-dark);
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            padding-right: 3rem;
        }

        .search-bar button {
            position: absolute;
            right: 0;
            top: 0;
            bottom: 0;
            background: var(--custom-green);
            border: none;
            color: white;
            padding: 0 1rem;
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
            cursor: pointer;
            transition: var(--transition);
        }

        .search-bar button:hover {
            background: var(--custom-green-dark);
        }

        .category-filter select {
            padding: 0.75rem 1rem;
            border: 1px solid var(--custom-gray-dark);
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
            min-width: 200px;
            cursor: pointer;
            height: calc(1.5em + 1.5rem + 2px);
        }

        .products-container h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--custom-green);
            font-size: 1.8rem;
            font-weight: bold;
        }

        .products-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background-color: var(--custom-white);
            border-radius: 8px;
            box-shadow: var(--box-shadow);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
        }

        .product-image-link img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
        }

        .product-info {
            padding: 1rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .product-name {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--custom-text);
            margin-bottom: 0.25rem;
        }

        .product-category {
            font-size: 0.8rem;
            color: var(--custom-green-light);
            margin-bottom: 0.5rem;
        }

        .product-price {
            font-size: 1.1rem;
            font-weight: bold;
            color: var(--custom-green-dark);
            margin-bottom: 0.75rem;
        }

        .product-description {
            font-size: 0.9rem;
            color: #555;
            line-height: 1.5;
            margin-bottom: 1rem;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .col-md-3 {
            width: 300px;
            position: absolute;
            right: 0px;
            /* Tersembunyi sepenuhnya */
            bottom: auto;
            top: 650px;
            height: calc(100vh - 40px);
            border-radius: 20px;
            overflow-y: auto;
            transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
        }

        /* Icon keranjang belanja floating */
        .cart-icon {
            position: fixed;
            right: 40px;
            top: 50%;
            transform: translateY(-50%);
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(76, 175, 80, 0.3);
            z-index: 1001;
        }

        .cart-icon:hover {
            background: linear-gradient(135deg, #45a049 0%, #7cb342 100%);
            transform: translateY(-50%) scale(1.1);
            box-shadow: 0 6px 25px rgba(76, 175, 80, 0.4);
        }

        /* Ketika keranjang terbuka */
        .col-md-3.cart-open {
            right: 0;
            opacity: 1;
            visibility: visible;
        }

        /* Icon berubah ketika keranjang terbuka */
        .cart-icon.cart-open {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            transform: translateY(-50%) rotate(45deg);
        }

        .cart-icon.cart-open::before {
            content: '✕';
            font-size: 1.2rem;
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #ffffff;
            background-clip: border-box;
            border: none;
            border-radius: 10px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(20px);
            overflow: hidden;
        }

        .card-body {
            flex: 1 1 auto;
            padding: 1.5rem;
        }

        .text-center {
            text-align: center;
        }

        .border-bottom {
            border-bottom: 1px solid #e8ecef;
            position: relative;
        }

        .border-bottom::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 2px;
            background: linear-gradient(90deg, #4CAF50, #8BC34A);
            border-radius: 1px;
        }

        .fw-bold {
            font-weight: 700;
        }

        .bg-body-tertiary {
            background: linear-gradient(145deg, #f8f9ff 0%, #f0f2f5 100%);
            border-radius: 15px;
            margin: -1.5rem;
            padding: 1.5rem;
        }

        .vstack {
            display: flex;
            flex: 1 1 auto;
            flex-direction: column;
            align-self: stretch;
        }

        .gap-2 {
            gap: 0.75rem;
        }

        .text-decoration-none {
            text-decoration: none;
        }

        .product-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 1px solid #e8ecef;
            border-radius: 12px;
            overflow: hidden;
            position: relative;
        }

        .product-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .product-card:hover::before {
            left: 100%;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            border-color: #8BC34A;
        }

        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .form-text {
            margin-top: 0.25rem;
            font-size: 0.875em;
            color: #6c757d;
        }

        .ms-auto {
            margin-left: auto;
        }

        .d-grid {
            display: grid;
        }

        .mb-0 {
            margin-bottom: 0;
        }

        .flex-row-reverse {
            flex-direction: row-reverse;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            line-height: 1.5;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            user-select: none;
            border: none;
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
            border-radius: 50px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            color: #ffffff;
            background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        }

        .btn-danger {
            color: #ffffff;
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
            box-shadow: 0 4px 15px rgba(238, 90, 82, 0.4);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(238, 90, 82, 0.6);
        }

        .keranjang h2 {
            font-size: 1.25rem;
            font-weight: 700;
            margin: 0 0 1rem 0;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        h4 {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin: 0;
            background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .cart-header {
            background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%);
            color: white;
            padding: 1.5rem;
            margin: -1.5rem -1.5rem 1.5rem -1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            font-size: 1.1rem;
        }

        .customer-section {
            background: linear-gradient(145deg, #f8f9ff 0%, #ffffff 100%);
            border-radius: 15px;
            padding: 1.5rem;
            margin: -1.5rem -1.5rem 0 -1.5rem;
            border: 1px solid #e8ecef;
        }

        .total-section {
            background: linear-gradient(145deg, #ffffff 0%, #f8f9ff 100%);
            border-radius: 15px;
            padding: 1.5rem;
            margin: -1.5rem;
            border: 1px solid #e8ecef;
        }

        .payment-section {
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #e8ecef;
            position: relative;
        }

        .payment-section::before {
            content: '';
            position: absolute;
            top: -1px;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 2px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e8ecef;
            border-radius: 12px;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background: white;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
            transform: translateY(-1px);
        }

        .empty-cart {
            text-align: center;
            padding: 2rem;
            color: #6c757d;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .empty-cart i {
            font-size: 3rem;
            opacity: 0.3;
        }

        .product-stock-show {
            font-size: 1rem;
            color: #4b5563;
            margin-bottom: 1.5rem;
        }

        .button-section {
            background: linear-gradient(145deg, #f8f9ff 0%, #ffffff 100%);
            padding: 1.5rem;
            margin: 0 -1.5rem -1.5rem -1.5rem;
            border-top: 1px solid #e8ecef;
        }

        /* Overlay untuk mobile ketika cart terbuka */
        .cart-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1001;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .cart-overlay.active {
            display: block;
            opacity: 1;
        }

        /* Close button untuk mobile */
        .mobile-close-btn {
            display: none;
            position: absolute;
            top: 15px;
            right: 15px;
            width: 35px;
            height: 35px;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 50%;
            color: #333;
            font-size: 1.2rem;
            cursor: pointer;
            z-index: 20;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        @media (max-width: 767.98px) {
            .mobile-close-btn {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .cart-overlay.active {
                display: block;
            }
        }

        /* Badge untuk menampilkan jumlah item */
        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            min-width: 20px;
            height: 20px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            padding: 0 6px;
        }

        /* Responsive untuk mobile */
        @media (max-width: 767.98px) {
            .col-md-3 {
                width: 100%;
                height: 100vh;
                right: -100%;
                /* Tersembunyi sepenuhnya di mobile */
                top: 0;
                border-radius: 0;
                z-index: 1002;
            }

            .col-md-3.cart-open {
                right: 0;
            }

            .cart-icon {
                right: 15px;
                top: auto;
                bottom: 80px;
                width: 56px;
                height: 56px;
                font-size: 1.4rem;
                box-shadow: 0 4px 20px rgba(76, 175, 80, 0.4);
            }

            .cart-icon:hover {
                transform: scale(1.05);
            }

            /* Penyesuaian card untuk mobile */
            .card {
                border-radius: 0;
                height: 100%;
            }

            .card-body {
                padding: 1rem;
            }

            /* Header keranjang untuk mobile */
            .text-center.card-body.border-bottom.fw-bold {
                position: sticky;
                top: 0;
                background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%);
                color: white;
                z-index: 10;
                margin: 0;
                padding: 1rem;
                font-size: 1.1rem;
            }

            /* Area scroll untuk mobile */
            .bg-body-tertiary {
                max-height: calc(100vh - 300px);
                overflow-y: auto;
                margin: 0;
                border-radius: 0;
            }

            .vstack {
                padding: 1rem;
            }

            /* Product cards dalam mobile */
            .product-card {
                margin-bottom: 0.75rem;
                border-radius: 8px;
            }

            .product-card .card-body {
                padding: 0.75rem;
            }

            /* Button section untuk mobile */
            .card-body.d-flex.flex-row-reverse.justify-content-between {
                position: sticky;
                bottom: 0;
                background: white;
                border-top: 2px solid #e8ecef;
                margin: 0;
                padding: 1rem;
                z-index: 10;
            }

            .btn {
                padding: 0.75rem 1.25rem;
                font-size: 0.9rem;
                min-width: 100px;
            }

            /* Input fields untuk mobile */
            input[type="text"],
            input[type="number"] {
                padding: 0.75rem;
                font-size: 1rem;
                border-radius: 8px;
            }

            /* Total section untuk mobile */
            h4 {
                font-size: 1.3rem;
            }

            /* Customer section untuk mobile */
            .keranjang h2 {
                font-size: 1.1rem;
                margin-bottom: 0.75rem;
            }
        }

        /* Scrollbar styling */
        .col-md-3::-webkit-scrollbar {
            width: 6px;
        }

        .col-md-3::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }

        .col-md-3::-webkit-scrollbar-thumb {
            background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%);
            border-radius: 3px;
        }

        /* Animasi untuk konten keranjang */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card {
            animation: fadeInUp 0.5s ease forwards;
        }

        /* Indikator jumlah item di keranjang */
        .cart-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }


        footer {
            background-color: var(--custom-green);
            color: white;
            padding: 2rem;
            top: 4rem;
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


        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-error {
            background: linear-gradient(135deg, #fee2e2 0%, #fecaca 100%);
            border: 1px solid #f87171;
            border-radius: 12px;
            padding: 16px 20px;
            margin: 16px 0;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.15);
            position: relative;
            overflow: hidden;
        }

        .alert-error::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: linear-gradient(180deg, #dc2626 0%, #ef4444 100%);
        }

        .alert-error ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .alert-error li {
            color: #991b1b;
            font-size: 14px;
            font-weight: 500;
            line-height: 1.5;
            padding: 8px 0;
            padding-left: 24px;
            position: relative;
            transition: all 0.2s ease;
        }

        .alert-error li::before {
            content: '⚠️';
            position: absolute;
            left: 0;
            top: 8px;
            font-size: 16px;
            animation: pulse 2s infinite;
        }

        .alert-error li:hover {
            color: #7f1d1d;
            transform: translateX(2px);
        }

        .alert-error li:not(:last-child) {
            border-bottom: 1px solid rgba(239, 68, 68, 0.2);
        }

        .pagination {
            margin-top: 2rem;
            text-align: center;
        }
    </style>

    <x-slot name="header">
        <div class="w-full text-center">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('Toko Produk Hasil Pertanian') }}
            </h2>
        </div>
    </x-slot>

    <main>
        <section class="hero">
            <div class="hero-content">
                <h2>Hasil Tani Segar Langsung Dari Petani</h2>
                <p>Temukan produk hasil tani berkualitas untuk kebutuhan Anda</p>
            </div>
        </section>

        <section class="filter-section">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('shop.read') }}" method="GET" id="filterForm">
                <div class="search-bar">
                    <input type="text" name="search" id="search" placeholder="Cari produk..."
                        value="{{ request()->search }}">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
                <div class="category-filter">
                    <select name="category_id" id="category_id" onchange="this.form.submit()">
                        <option value="0">Semua Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ request()->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
        </section>

        <section class="products-container">
            <h2>Produk Petani Kami</h2>
        </section>

        <section class="products-container">
            @if ($products->isEmpty())
                <p style="text-align: center; color: #555; font-size: 1.1rem; margin-top: 2rem;">
                    Belum ada produk yang tersedia untuk filter ini.
                </p>
            @else
                <div class="product-grid">
                    @foreach ($products as $product)
                        @if ($product && $product->id)
                            <div class="product-card">
                                <a href="{{ route('shop.create', ['product' => $product->id]) }}"
                                    class="product-image-link">
                                    <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                                    <div class="product-info">
                                        <h3 class="product-name" style="color: inherit; text-decoration: none;">
                                            {{ $product->name }}
                                        </h3>
                                        <p class="product-category">
                                            {{ $product->category->name ?? 'Tidak Berkategori' }}</p>
                                        <p class="product-price">Rp
                                            {{ number_format($product->price, 0, ',', '.') }}/Kg
                                        </p>
                                        @php
                                            $cart = session('shop', ['details' => []]);
                                            $inCartQty = $cart['details'][$product->id]['qty'] ?? 0;
                                            $displayStock = $product->stock - $inCartQty;
                                        @endphp

                                        <p class="product-stock-show">
                                            Stok:
                                            @if ($displayStock > 0)
                                                <span class="stock-available">{{ $displayStock }} Kg</span>
                                            @else
                                                <span class="stock-unavailable">Stok habis</span>
                                            @endif
                                        </p>
                                        <p class="product-description">{{ Str::limit($product->description, 70) }}</p>
                                    </div>
                                </a>
                            </div>
                        @else
                            <div class="product-card">
                                <div class="product-info">
                                    <h3 class="product-name">Produk tidak valid</h3>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

            <div class="pagination">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </section>

        {{-- keranjang belanja --}}

        <section class="col-md-3">
            <form class="card" method="POST" action="{{ route('shop.checkout') }}">
                @csrf
                @if ($errors->any())
                    <div class="alert-error ">
                        <ul style="margin-bottom: 1;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="text-center card-body border-bottom fw-bold">Keranjang Belanja</div>
                <div class="card-body border-bottom fw-bold">
                    <h2 class="keranjang">Customer</h2>
                    <x-text-input name="customer" value="{{ Auth::user()->name }}" readonly></x-text-input>
                </div>
                <div class="card-body bg-body-tertiary border-bottom">
                    <div class="vstack gap-2">
                        @php
                            $total = 0;
                            $shop = session('shop', ['details' => []]);
                        @endphp

                        @forelse ($shop['details'] as $detail)
                            @php
                                $total += $detail['qty'] * $detail['price'];
                                $product = \App\Models\Products::find($detail['product_id']);
                            @endphp
                            <a href="{{ route('shop.create', ['product' => $detail['product_id']]) }}"
                                class="text-decoration-none">
                                <div class="card product-card">
                                    <div class="card-body">
                                        <div class="fw-bold">{{ $product->name ?? 'Produk tidak ditemukan' }}</div>
                                        <div class="d-flex justify-content-between">
                                            <div class="form-text fw-bold">
                                                {{ $detail['qty'] }} Kg x {{ number_format($detail['price']) }}
                                            </div>
                                            <div class="ms-auto form-text fw-bold">
                                                Rp{{ number_format($detail['qty'] * $detail['price']) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @empty
                            <div class="fw-bold text-center">Keranjang Kosong</div>
                        @endforelse
                    </div>
                </div>
                <div class="card-body border-bottom d-grid gap-2">
                    @php
                        $adminFee = 2500;
                        $grandTotal = $total + $adminFee;
                    @endphp
                    <div class="d-flex justify-content-between">
                        <div class="fw-bold">Subtotal</div>
                        <div class="ms-auto">Rp {{ number_format($total) }}</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="fw-bold">Biaya Admin</div>
                        <div class="ms-auto">Rp {{ number_format($adminFee) }}</div>
                    </div>
                    <div class="d-flex justify-content-between">
                        <div class="fw-bold">Total</div>
                        <h4 class="ms-auto mb-0">Rp {{ number_format($grandTotal) }}</h4>
                    </div>
                    <div class="fw-bold">
                        <h2>Alamat</h2>
                        <x-text-input type="text" name="alamat" label="alamat"></x-text-input>
                    </div>
                    <div class="fw-bold">
                        <h2>Pembayaran</h2>
                        <x-text-input type="number" name="payment" label="payment"></x-text-input>
                    </div>
                </div>
                <div class="card-body d-flex flex-row-reverse justify-content-between">
                    <button type="submit" class="ms-auto btn btn-primary">Checkout</button>
                    <a href="{{ route('shop.cancel') }}" class="btn btn-danger">Cancel</a>
                </div>
            </form>
        </section>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartContainer = document.querySelector('.col-md-3');

            // Buat icon keranjang belanja floating
            const cartIcon = document.createElement('button');
            cartIcon.className = 'cart-icon';
            cartIcon.innerHTML = '🛒';
            cartIcon.setAttribute('type', 'button');
            cartIcon.setAttribute('title', 'Buka Keranjang Belanja');

            // Tambahkan badge untuk jumlah item (opsional)
            const cartBadge = document.createElement('span');
            cartBadge.className = 'cart-badge';
            cartBadge.textContent = '0'; // Update dengan jumlah item sesungguhnya
            cartIcon.appendChild(cartBadge);

            document.body.appendChild(cartIcon);

            cartIcon.addEventListener('click', function() {
                cartContainer.classList.toggle('cart-open');
                cartIcon.classList.toggle('cart-open');

                // Update title
                if (cartContainer.classList.contains('cart-open')) {
                    cartIcon.setAttribute('title', 'Tutup Keranjang');
                    cartIcon.innerHTML = '✕<span class="cart-badge">' + cartBadge.textContent + '</span>';
                } else {
                    cartIcon.setAttribute('title', 'Buka Keranjang Belanja');
                    cartIcon.innerHTML = '🛒<span class="cart-badge">' + cartBadge.textContent + '</span>';
                }

                // Toggle overlay untuk mobile
                let overlay = document.querySelector('.cart-overlay');
                if (!overlay) {
                    overlay = document.createElement('div');
                    overlay.className = 'cart-overlay';
                    document.body.appendChild(overlay);

                    overlay.addEventListener('click', function() {
                        cartContainer.classList.remove('cart-open');
                        cartIcon.classList.remove('cart-open');
                        overlay.classList.remove('active');
                        cartIcon.setAttribute('title', 'Buka Keranjang Belanja');
                        cartIcon.innerHTML = '🛒<span class="cart-badge">' + cartBadge.textContent +
                            '</span>';
                    });
                }

                if (window.innerWidth <= 767.98) {
                    overlay.classList.toggle('active');
                }
            });

            // Update badge count (panggil fungsi ini ketika item ditambah/dikurang)
            function updateCartBadge(count) {
                cartBadge.textContent = count;
                if (count > 0) {
                    cartBadge.style.display = 'flex';
                } else {
                    cartBadge.style.display = 'none';
                }
            }

            // Contoh: updateCartBadge(3); // akan menampilkan badge dengan angka 3
        });
    </script>
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
