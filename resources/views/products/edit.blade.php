<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Produk') }}
        </h2>
    </x-slot>

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

        .form-section {
            padding: 2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .form-section h2 {
            text-align: center;
            margin-bottom: 2rem;
            color: var(--custom-green);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-row {
            display: flex;
            gap: 1.5rem;
            flex-wrap: wrap;
        }

        .form-row .form-group {
            flex: 1;
            min-width: 200px;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--custom-gray-dark);
            border-radius: 4px;
            font-family: 'Poppins', sans-serif;
            font-size: 1rem;
        }

        input[type="file"] {
            padding: 0.5rem 0;
        }

        .error {
            color: var(--custom-red);
            font-size: 0.85rem;
            margin-top: 0.3rem;
            display: block;
        }

        .alert {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
        }

        .alert-error {
            background-color: #ffebee;
            color: var(--custom-red);
            border: 1px solid #ffcdd2;
        }

        .alert-success {
            background-color: #e8f5e9;
            color: #2e7d32;
            border: 1px solid #c8e6c9;
        }

        .current-image {
            margin: 1rem 0;
        }

        .current-image p {
            margin-bottom: 0.5rem;
        }

        .thumbnail {
            max-width: 150px;
            max-height: 150px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid var(--custom-gray-dark);
        }

        .image-preview {
            margin-top: 1rem;
            max-width: 200px;
        }

        .image-preview img {
            max-width: 100%;
            border-radius: 4px;
            border: 1px solid var(--custom-gray-dark);
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
        }

        .form-section {
            padding: 2rem;
            max-width: 800px;
            margin: 0 auto;
        }

        .form-section h2 {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--custom-green);
        }


        /* Button Styles */
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-size: 0.95rem;
            font-weight: 500;
            text-decoration: none;
            border: none;
            cursor: pointer;
            transition: var(--transition);
            font-family: 'Poppins', sans-serif;
            background-color: var(--custom-gray);
            color: var(--custom-text);
        }

        .btn:hover {
            background-color: var(--custom-gray-dark);
        }

        .btn-primary {
            background-color: var(--custom-green);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--custom-green-dark);
        }

        .btn-view {
            background-color: #1976d2;
            color: white;
        }

        .btn-view:hover {
            background-color: #1565c0;
        }

        .btn-edit {
            background-color: #ff9800;
            color: white;
        }

        .btn-edit:hover {
            background-color: #f57c00;
        }

        .btn-delete,
        .btn-danger {
            background-color: var(--custom-red);
            color: white;
        }

        .btn-delete:hover,
        .btn-danger:hover {
            background-color: #b71c1c;
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


    <main>
        <section class="form-section">
            <h2>Edit Produk</h2>

            @if ($errors->any())
                <div class="alert alert-error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="productForm" action="{{ route('products.update', $product->id) }}" method="POST"
                enctype="multipart/form-data" novalidate>
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Nama Produk<span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}"
                        class="@error('name') error @enderror" required>
                    @error('name')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi<span class="text-red-500">*</span></label>
                    <textarea id="description" name="description" rows="4" class="@error('description') error @enderror" required>{{ old('description', $product->description) }}</textarea>
                    @error('description')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="price">Harga (Rp)/Kg<span class="text-red-500">*</span></label>
                        <input type="number" id="price" name="price" min="0" step="0.01"
                            value="{{ old('price', $product->price) }}" class="@error('price') error @enderror"
                            required>
                        @error('price')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="stock">Stok (Kg)<span class="text-red-500">*</span></label>
                        <input type="number" id="stock" name="stock" min="0"
                            value="{{ old('stock', $product->stock) }}" class="@error('stock') error @enderror"
                            required>
                        @error('stock')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="category_id">Kategori</label>
                    <select id="category_id" name="category_id" class="@error('category_id') error @enderror" required>
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="image">Gambar Produk</label>
                    <input type="file" id="image" name="image" accept="image/*"
                        class="@error('image') error @enderror">

                    <div class="current-image">
                        <p>Gambar saat ini:</p>
                        @if ($product->image && Storage::disk('public')->exists($product->image))
                            <img src="{{ asset('storage/' . $product->image) }}" alt="Current Product Image"
                                class="thumbnail">
                        @else
                            <p>Tidak ada gambar</p>
                        @endif
                    </div>

                    <div id="imagePreview" class="image-preview"></div>

                    @error('image')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Perbarui Produk</button>
                    <a href="{{ route('products.read') }}" class="btn">Batal</a>
                </div>
            </form>
        </section>
    </main>

    @push('scripts')
        <script src="{{ asset('js/form-validation.js') }}"></script>
    @endpush
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
