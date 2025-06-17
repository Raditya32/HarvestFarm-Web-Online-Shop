<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Tambah Produk Baru') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-100"> {{-- Latar belakang halaman abu-abu standar Tailwind --}}
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8"> {{-- Kontainer form dengan lebar maksimal --}}
            <div class="bg-white shadow-md rounded-lg p-6 md:p-8">
                <h3 class="text-2xl font-semibold text-gray-800 mb-6 text-center">Formulir Tambah Produk</h3>

                {{-- Notifikasi Error --}}
                @if (session('error'))
                    <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md" role="alert">
                        <p class="font-bold">Error:</p>
                        <p>{{ session('error') }}</p>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded-md" role="alert">
                        <p class="font-bold">Oops! Ada beberapa kesalahan input:</p>
                        <ul class="mt-2 list-disc list-inside text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf

                    {{-- Nama Produk --}}
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk<span
                                class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('name') border-red-500 ring-1 ring-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi<span
                                class="text-red-500">*</span></label>
                        <textarea name="description" id="description" rows="4" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('description') border-red-500 ring-1 ring-red-500 @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Harga dan Stok dalam satu baris pada layar medium ke atas --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-6">
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Harga
                                (Rp)/Kg<span class="text-red-500">*</span></label>
                            <input type="number" name="price" id="price" value="{{ old('price') }}" required
                                min="0" step="1" {{-- step="0.01" jika perlu desimal --}}
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('price') border-red-500 ring-1 ring-red-500 @enderror">
                            @error('price')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="stock" class="block text-sm font-medium text-gray-700 mb-1">Stok (Kg)<span
                                    class="text-red-500">*</span></label>
                            <input type="number" name="stock" id="stock" value="{{ old('stock') }}" required
                                min="0"
                                class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('stock') border-red-500 ring-1 ring-red-500 @enderror">
                            @error('stock')
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Kategori --}}
                    <div>
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori<span
                                class="text-red-500">*</span></label>
                        <select name="category_id" id="category_id" required
                            class="mt-1 block w-full px-3 py-2 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm @error('category_id') border-red-500 ring-1 ring-red-500 @enderror">
                            <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>-- Pilih
                                Kategori --</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Gambar Produk --}}
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Gambar Produk
                            (Opsional, max 2MB)</label>
                        <input type="file" name="image" id="image"
                            accept="image/png, image/jpeg, image/gif, image/webp"
                            class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none
                                      file:mr-4 file:py-2 file:px-4 file:rounded-l-lg file:border-0
                                      file:text-sm file:font-semibold file:bg-indigo-100 file:text-indigo-700
                                      hover:file:bg-indigo-200 @error('image') border-red-500 ring-1 ring-red-500 @enderror">
                        <small class="text-xs text-gray-500 mt-1 block">Format: JPG, JPEG, PNG, GIF, WEBP.</small>
                        @error('image')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                        <div id="image-preview-container" class="mt-4 hidden">
                            <p class="text-sm font-medium text-gray-700 mb-1">Preview Gambar:</p>
                            <img id="image-preview" src="#" alt="Preview Gambar Produk"
                                class="max-h-48 rounded-md border border-gray-200" />
                        </div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="pt-8 mt-8 border-t border-gray-200">
                        <div class="flex justify-end items-center space-x-3">
                            <a href="{{ route('products.read') }}"
                                class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                <i class="fas fa-save mr-2"></i>Simpan Produk
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        // Script preview gambar
        document.addEventListener('DOMContentLoaded', function() {
            const imageInput = document.getElementById('image');
            const imagePreview = document.getElementById('image-preview');
            const imagePreviewContainer = document.getElementById('image-preview-container');

            if (imageInput && imagePreview && imagePreviewContainer) {
                imageInput.addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreviewContainer.classList.remove('hidden');
                        }
                        reader.readAsDataURL(file);
                    } else {
                        imagePreview.src = '#';
                        imagePreviewContainer.classList.add('hidden');
                    }
                });
            }
        });
    </script>
</x-app-layout>

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
