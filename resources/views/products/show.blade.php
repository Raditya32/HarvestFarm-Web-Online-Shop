<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Detail Produk: {{ $product->name }}
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

        /* Anda bisa memindahkan style ini ke app.css jika lebih rapi */
        .product-detail-container {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .product-image-full {
            width: 100%;
            max-height: 600px;
            object-fit: contain;
            /* atau cover, sesuaikan */
            margin-bottom: 1.5rem;
            /* mb-6 */
            border-radius: 0.375rem;
            /* rounded-md */
        }

        .product-title-show {
            font-size: 2.25rem;
            /* text-4xl */
            font-weight: 700;
            /* font-bold */
            color: var(--custom-text);
            margin-bottom: 0.5rem;
            /* mb-2 */
        }

        .product-category-show {
            font-size: 1rem;
            /* text-base */
            color: var(--custom-green);
            font-weight: 500;
            /* font-medium */
            margin-bottom: 1rem;
            /* mb-4 */
        }

        .product-price-show {
            font-size: 1.875rem;
            /* text-3xl */
            font-weight: 700;
            /* font-bold */
            color: var(--custom-green-dark);
            margin-bottom: 1rem;
            /* mb-4 */
        }

        .product-stock-show {
            font-size: 1rem;
            /* text-base */
            color: #4b5563;
            /* text-gray-600 */
            margin-bottom: 1.5rem;
            /* mb-6 */
        }

        .stock-available {
            color: #059669;
            /* text-emerald-600 */
            font-weight: 600;
        }

        .stock-unavailable {
            color: #dc2626;
            /* text-red-600 */
            font-weight: 600;
        }

        .product-description-show {
            font-size: 1rem;
            /* text-base */
            color: #374151;
            /* text-gray-700 */
            line-height: 1.75;
            /* leading-relaxed */
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
    </style>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="product-detail-container p-6 md:p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8 items-start">
                    <div>
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('build/assets/image/placeholder.png') }}"
                            alt="{{ $product->name }}" class="product-image-full">
                    </div>
                    <div>
                        <h1 class="product-title-show">{{ $product->name }}</h1>
                        <p class="product-category-show">Kategori: {{ $product->category->name ?? 'Tidak Berkategori' }}
                        </p>
                        <p class="product-price-show">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="product-stock-show">
                            Stok (Kg):
                            @if ($product->stock > 0)
                                <span class="stock-available">{{ $product->stock }} Kg tersedia</span>
                            @else
                                <span class="stock-unavailable">Stok habis</span>
                            @endif
                        </p>
                        <div class="mt-4">
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">Deskripsi Produk:</h4>
                            <p class="product-description-show whitespace-pre-wrap">{{ $product->description }}</p>
                        </div>

                        <div class="mt-8 flex items-center space-x-3">
                            <a href="{{ route('products.edit', $product->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-yellow-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 transition ease-in-out duration-150">
                                <i class="fas fa-edit mr-2"></i>Edit
                            </a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    <i class="fas fa-trash mr-2"></i>Hapus
                                </button>
                            </form>
                            <a href="{{ route('products.read') }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 transition ease-in-out duration-150">
                                <i class="fas fa-arrow-left mr-2"></i>Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
