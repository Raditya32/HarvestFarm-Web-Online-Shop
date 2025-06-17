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

        main {
            margin-top: 170px;
        }

        /* Container */
        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Row */
        .row {
            display: flex;
            flex-wrap: wrap;
            width: 100%;
            justify-content: center;
        }

        /* Column */
        .col {
            flex: 1;
            width: 100%;
        }

        .col-lg-4 {
            width: 100%;
            max-width: 400px;
        }

        /* Card */
        .card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .card-body {
            padding: 24px;
        }

        .card-body.border-bottom {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            padding-bottom: 16px;
            margin-bottom: 0;
        }

        .fw-bold {
            font-weight: 600;
            color: #333333;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        /* Link styling */
        .text-decoration-none {
            text-decoration: none;
        }

        .text-black {
            color: #333333 !important;
        }

        /* Form styling */
        form {
            margin: 0;
        }

        /* Form labels and inputs */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            color: #333333;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        /* Input styling */
        input[type="text"],
        input[type="number"] {
            display: block;
            width: 100%;
            padding: 12px 16px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.5;
            color: #333;
            background-color: #ffffff;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        input[type="text"]:disabled,
        input[type="number"]:disabled {
            background-color: #f8f9fa;
            color: #6c757d;
            cursor: not-allowed;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(66, 133, 244, 0.3);
            transform: translateY(-1px);
        }

        /* Flex utilities */
        .d-flex {
            display: flex;
        }

        .flex-row-reverse {
            flex-direction: row-reverse;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 24px;
        }

        /* Button styling */
        .btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 600;
            line-height: 1.5;
            text-align: center;
            text-decoration: none;
            vertical-align: middle;
            cursor: pointer;
            border: none;
            border-radius: 8px;
            transition: all 0.3s ease;
            flex: 1;
            min-width: 100px;
        }

        .btn-primary {
            color: #fff;
            background: linear-gradient(135deg, #4285f4 0%, #1a73e8 100%);
            box-shadow: 0 4px 12px rgba(66, 133, 244, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(66, 133, 244, 0.5);
        }

        .btn-danger {
            color: #fff;
            background: linear-gradient(135deg, #ea4335 0%, #d33b2c 100%);
            box-shadow: 0 4px 12px rgba(234, 67, 53, 0.4);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(234, 67, 53, 0.5);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 480px) {
            .card-body {
                padding: 20px;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                width: 100%;
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

        /* Additional styling for form elements */
        h2 {
            font-size: 16px;
            font-weight: 600;
            color: #333333;
            margin-bottom: 8px;
            margin-top: 16px;
        }

        h2:first-child {
            margin-top: 0;
        }

        /* Custom button styles to match Laravel classes */
        .inline-flex {
            display: inline-flex;
        }

        .justify-center {
            justify-content: center;
        }

        .items-center {
            align-items: center;
        }

        .px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .py-2 {
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }

        .border {
            border-width: 1px;
        }

        .border-transparent {
            border-color: transparent;
        }

        .border-gray-300 {
            border-color: #d1d5db;
        }

        .rounded-md {
            border-radius: 0.375rem;
        }

        .shadow-sm {
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .text-sm {
            font-size: 0.875rem;
        }

        .font-medium {
            font-weight: 500;
        }

        .text-white {
            color: #ffffff;
        }

        .text-gray-700 {
            color: #374151;
        }

        .bg-blue-600 {
            background-color: #2563eb;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .bg-gray-50 {
            background-color: #f9fafb;
        }

        .hover\:bg-blue-700:hover {
            background-color: #1d4ed8;
        }

        .hover\:bg-gray-50:hover {
            background-color: #f9fafb;
        }

        .focus\:outline-none:focus {
            outline: 2px solid transparent;
            outline-offset: 2px;
        }

        .focus\:ring-2:focus {
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
        }

        .focus\:ring-offset-2:focus {
            box-shadow: 0 0 0 2px #ffffff, 0 0 0 4px rgba(59, 130, 246, 0.5);
        }

        .focus\:ring-blue-500:focus {
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.5);
        }

        .focus\:ring-indigo-500:focus {
            box-shadow: 0 0 0 2px rgba(99, 102, 241, 0.5);
        }

        .mr-2 {
            margin-right: 0.5rem;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Masukkan ke Keranjang') }}
        </h2>
    </x-slot>

    <main>
        <div class="container">
            <div class="row">
                <div class="col col-lg-4">
                    <div class="card">
                        <div class="card-body border-bottom fw-bold">
                            <a href="{{ route('shop.create', $product->id) }}" class="text-decoration-none text-black">
                                <i class="bi-arrow-left"></i>
                            </a>
                            Product Qty
                        </div>
                        <div class="card-body">
                            <form action="{{ route('shop.store', $product) }}" method="post">
                                @csrf
                                @if (isset($product) && $product)
                                    <div class="form-group">
                                        <h2>Nama</h2>
                                        <input type="text" name="name" value="{{ $product->name }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <h2>Jumlah (Kg)</h2>
                                        <input type="number" name="qty"
                                            value="{{ old('qty', $detail['qty'] ?? 1) }}">
                                    </div>

                                    <div class="form-group">
                                        <h2>Harga/Kg</h2>
                                        <input type="number" name="price" value="{{ $product->price }}" disabled>
                                    </div>
                                @endif

                                <div class="d-flex flex-row-reverse justify-content-between" style="margin-top: 24px;">
                                    <button type="submit"
                                        class="inline-flex justify-center items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <i class="fas fa-save mr-2"></i>Simpan
                                    </button>
                                    <a href="{{ route('shop.cancel') }}"
                                        class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                        values="destroy">
                                        Batal
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
