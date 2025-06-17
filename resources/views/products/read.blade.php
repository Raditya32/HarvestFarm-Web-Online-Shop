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

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--custom-gray);
            color: var(--custom-text);
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

        .product-actions {
            padding: 0.75rem 1rem;
            border-top: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-action {
            padding: 0.5rem 1rem;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.875rem;
            font-weight: 500;
            transition: background-color 0.2s ease;
            display: inline-flex;
            align-items: center;
        }

        .btn-action i {
            margin-right: 0.3rem;
        }

        .btn-view {
            background-color: var(--custom-green-light);
            color: white;
        }

        .btn-view:hover {
            background-color: var(--custom-green);
        }

        .btn-edit {
            background-color: var(--custom-yellow);
            color: var(--custom-text);
        }

        .btn-edit:hover {
            background-color: #e9b300;
        }

        .btn-delete {
            background-color: var(--custom-red);
            color: white;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .tambah-btn-container {
            /* Gaya untuk container tombol jika diperlukan */
        }

        .tambah-btn {
            background-color: #004d2c;
            color: white;
            padding: 15px 15px;
            border: none;
            border-radius: 5px;
            font-weight: 500;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
            text-decoration: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            display: inline-flex;
            align-items: center;
            transition: background-color 0.3s ease;
        }

        .tambah-btn:hover {
            background-color: #003720;
        }

        .tambah-btn i {
            margin-right: 0.5rem;
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

        .pagination {
            margin-top: 2rem;
            text-align: center;
        }

        .alert {
            padding: 0.75rem 1.25rem;
            margin-bottom: 1rem;
            border: 1px solid transparent;
            border-radius: 0.25rem;
        }

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }

        .alert-error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .pagination {
            margin-top: 2rem;
            text-align: center;
        }
    </style>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <main>

        <section class="filter-section">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif {{-- Penutup @if session success --}}
            @if (session('error'))
                <div class="alert alert-error">
                    {{ session('error') }}
                </div>
            @endif {{-- Penutup @if session error --}}

            <form action="{{ route('products.read') }}" method="GET" id="filterForm">
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
                        @endforeach {{-- Penutup @foreach categories --}}
                    </select>
                </div>
                <div class="tambah-btn-container" style="margin-left: auto;">
                    <a href="{{ route('products.create') }}" class="tambah-btn">
                        <i class="fas fa-plus"></i>Tambah Produk
                    </a>
                </div>
            </form>
        </section>

        <section class="products-container">
            @if ($products->isEmpty())
                <p style="text-align: center; color: #555; font-size: 1.1rem; margin-top: 2rem;">
                    Belum ada produk yang tersedia untuk filter ini.
                </p>
            @else
                <div class="product-grid">
                    @foreach ($products as $product)
                        <div class="product-card">
                            <a href="{{ route('products.show', $product) }}" class="product-image-link">
                                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}">
                                <div class="product-info" style="color: inherit; text-decoration: none;">
                                    <h3 class="product-name">{{ $product->name }}</h3>
                                    <p class="product-category">
                                        {{ $product->category->name ?? 'Tidak Berkategori' }}
                                    </p>
                                    <p class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}/Kg
                                    </p>
                                    <p class="product-description">{{ Str::limit($product->description, 70) }}</p>
                                </div>
                            </a>

                            <div class="product-actions">
                                <a href="{{ route('products.show', $product) }}" class="btn-action btn-view"><i
                                        class="fas fa-eye"></i> Lihat</a>
                                <a href="{{ route('products.edit', $product) }}" class="btn-action btn-edit"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <form action="{{ route('products.destroy', $product) }}" method="POST"
                                    onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete"><i class="fas fa-trash"></i>
                                        Hapus</button>
                                </form>
                            </div>
                        </div>
                    @endforeach {{-- Penutup @foreach products --}}
                </div>
            @endif
            <div class="pagination">
                {{ $products->appends(request()->query())->links() }}
            </div>
        </section>
    </main>
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
