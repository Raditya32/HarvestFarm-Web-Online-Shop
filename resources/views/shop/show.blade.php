<x-app-layout>
    <x-slot name="header">

        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Struk Transaksi') }}
        </h2>
    </x-slot>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
                box-sizing: border-box;
            }

            main {
                padding: 20px;
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .container {
                width: 100%;
                max-width: 2000px;
                margin: 0 auto;
                padding: 0 15px;
            }

            .row {
                display: flex;
                justify-content: center;
                width: 100%;
                margin: 0;
            }

            .col-4 {
                width: 100%;
                max-width: 500px;
                padding: 0 15px;
            }

            .card {
                background: rgba(255, 255, 255, 0.98);
                backdrop-filter: blur(15px);
                border: none;
                border-radius: 20px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
                transition: transform 0.3s ease, box-shadow 0.3s ease;
                overflow: hidden;
                animation: fadeInUp 0.6s ease-out;
            }

            .card:hover {
                transform: translateY(-5px);
                box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
            }

            .card.mb-2 {
                margin-bottom: 1.5rem;
            }

            .card-body {
                padding: 3rem;
                position: relative;
            }

            .card-body::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                right: 0;
                height: 4px;
                background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%);
            }

            .border-bottom {
                border-bottom: 2px solid #f1f3f4;
                position: relative;
                margin-bottom: 0;
            }

            .border-bottom::after {
                content: '';
                position: absolute;
                bottom: -2px;
                left: 50%;
                transform: translateX(-50%);
                width: 60px;
                height: 2px;
                background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%);
                border-radius: 2px;
            }

            .d-flex {
                display: flex;
                align-items: center;
                justify-content: space-between;
                margin-bottom: 1rem;
                padding: 8px 0;
                flex-wrap: wrap;
            }

            .d-flex:last-child {
                margin-bottom: 0;
            }

            .ms-auto {
                font-weight: 600;
                color: #2c3e50;
                text-align: right;
            }

            .d-grid {
                display: grid;
                gap: 1rem;
            }

            .form-text {
                font-size: 0.875em;
                color: #6c757d;
                font-weight: 500;
            }

            .fw-bold {
                font-weight: 700;
                color: #2c3e50;
                font-size: 1.1em;
            }

            .mb-0 {
                margin-bottom: 0;
            }

            /* Product items styling */
            .d-grid .card {
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
                border-radius: 12px;
                transition: all 0.3s ease;
                border-left: 4px solid #4CAF50;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            }

            .d-grid .card:hover {
                transform: translateX(5px);
                box-shadow: 0 8px 25px rgba(76, 175, 80, 0.2);
            }

            .d-grid .card .card-body {
                padding: 1.2rem;
            }

            .d-grid .card .card-body::before {
                display: none;
            }

            .d-grid .card .card-body>div:first-child {
                font-weight: 600;
                color: #2c3e50;
                margin-bottom: 0.5rem;
                font-size: 1.05em;
            }

            /* Button styling */
            .btn {
                display: inline-block;
                padding: 12px 32px;
                font-size: 1.1rem;
                font-weight: 600;
                line-height: 1.5;
                text-align: center;
                text-decoration: none;
                vertical-align: middle;
                cursor: pointer;
                border: none;
                border-radius: 50px;
                transition: all 0.3s ease;
                text-transform: uppercase;
                letter-spacing: 1px;
                position: relative;
                overflow: hidden;
                width: 100%;
                max-width: 200px;
                margin: 0 auto;
                animation: fadeInUp 0.8s ease-out;
            }

            .btn::before {
                content: '';
                position: absolute;
                top: 0;
                left: -100%;
                width: 100%;
                height: 100%;
                background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
                transition: left 0.5s;
            }

            .btn:hover::before {
                left: 100%;
            }

            .btn-danger {
                color: #fff;
                background: linear-gradient(135deg, #ff6b6b 0%, #ee5a24 100%);
                box-shadow: 0 8px 25px rgba(238, 90, 36, 0.3);
            }

            .btn-danger:hover {
                background: linear-gradient(135deg, #ee5a24 0%, #ff6b6b 100%);
                transform: translateY(-2px);
                box-shadow: 0 12px 35px rgba(238, 90, 36, 0.4);
            }

            .card-body:first-child .d-flex>div:first-child {
                color: #4CAF50;
                font-weight: 600;
                font-size: 1.05em;
            }

            .card-body:last-child {
                background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            }

            .card-body:last-child .d-flex>div:first-child {
                font-weight: 600;
                color: #2c3e50;
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

            /* Enhanced Mobile Responsiveness */
            @media (max-width: 768px) {
                main {
                    padding: 10px;
                    align-items: flex-start;
                    padding-top: 20px;
                }

                .container {
                    padding: 0 5px;
                    width: 100%;
                }

                .row {
                    margin: 0;
                    width: 100%;
                }

                .col-4 {
                    max-width: 100%;
                    padding: 0;
                    width: 100%;
                }

                .card {
                    margin: 0;
                    border-radius: 15px;
                    width: 100%;
                }

                .card-body {
                    padding: 1rem;
                }

                .d-flex {
                    display: flex;
                    flex-direction: row;
                    justify-content: space-between;
                    align-items: flex-start;
                    margin-bottom: 0.5rem;
                    padding: 0.3rem 0;
                    gap: 0.5rem;
                }

                .d-flex>div:first-child {
                    font-size: 0.9rem;
                    flex-shrink: 0;
                    color: #666;
                    font-weight: 500;
                    width: auto;
                    min-width: 70px;
                }

                .ms-auto {
                    font-size: 0.9rem;
                    word-break: break-word;
                    text-align: right;
                    flex: 1;
                    font-weight: 600;
                    color: #2c3e50;
                    margin-left: 0.5rem;
                }

                .btn {
                    padding: 12px 20px;
                    font-size: 0.9rem;
                    width: 100%;
                    max-width: none;
                    margin-top: 1rem;
                }

                .d-grid {
                    gap: 0.5rem;
                }

                .d-grid .card {
                    margin: 0;
                }

                .d-grid .card .card-body {
                    padding: 0.8rem;
                }

                .d-grid .card .card-body>div:first-child {
                    font-size: 0.9rem;
                    margin-bottom: 0.3rem;
                    font-weight: 600;
                    line-height: 1.3;
                }

                .d-grid .card .d-flex {
                    margin-bottom: 0;
                    padding: 0.2rem 0;
                }

                .form-text {
                    font-size: 0.75rem;
                }

                .fw-bold {
                    font-size: 1rem;
                }
            }

            /* Extra Small Devices */
            @media (max-width: 480px) {
                main {
                    padding: 8px;
                    padding-top: 15px;
                }

                .container {
                    padding: 0;
                }

                .card-body {
                    padding: 0.8rem;
                }

                .d-flex {
                    flex-direction: column;
                    align-items: flex-start;
                    gap: 0.2rem;
                    margin-bottom: 0.4rem;
                    padding: 0.2rem 0;
                }

                .d-flex>div:first-child {
                    font-size: 0.8rem;
                    color: #666;
                    min-width: auto;
                    width: 100%;
                    font-weight: 500;
                }

                .ms-auto {
                    margin-left: 0;
                    font-size: 0.85rem;
                    font-weight: 700;
                    color: #2c3e50;
                    text-align: left;
                    width: 100%;
                }

                .fw-bold {
                    font-size: 0.95rem;
                }

                .btn {
                    padding: 10px 15px;
                    font-size: 0.85rem;
                    letter-spacing: 0.3px;
                    margin-top: 0.5rem;
                }

                .d-grid {
                    gap: 0.4rem;
                }

                .d-grid .card .card-body {
                    padding: 0.6rem;
                }

                .d-grid .card .card-body>div:first-child {
                    font-size: 0.8rem;
                    margin-bottom: 0.2rem;
                    line-height: 1.2;
                }

                .d-grid .card .d-flex {
                    margin-bottom: 0;
                    padding: 0.1rem 0;
                }

                .form-text {
                    font-size: 0.7rem;
                }

                .border-bottom::after {
                    width: 40px;
                }
            }

            /* Mobile First - Base responsive styles */
            @media (max-width: 576px) {
                body {
                    font-size: 14px;
                }

                main {
                    padding: 5px;
                    min-height: auto;
                }

                .container {
                    padding: 0;
                    max-width: 100%;
                }

                .row {
                    margin: 0;
                    padding: 0;
                }

                .col-4 {
                    padding: 0;
                    max-width: 100%;
                }

                .card {
                    margin: 0 0 10px 0;
                    border-radius: 12px;
                }

                .card-body {
                    padding: 12px;
                }

                .d-flex {
                    display: block;
                    margin-bottom: 8px;
                    padding: 4px 0;
                }

                .d-flex>div:first-child {
                    display: block;
                    font-size: 12px;
                    color: #666;
                    margin-bottom: 2px;
                    font-weight: 500;
                }

                .ms-auto {
                    display: block;
                    font-size: 13px;
                    font-weight: 600;
                    color: #2c3e50;
                    margin-left: 0;
                    text-align: left;
                }

                .fw-bold {
                    font-size: 14px;
                    font-weight: 700;
                }

                .btn {
                    width: 100%;
                    padding: 10px;
                    font-size: 13px;
                    margin-top: 10px;
                    letter-spacing: 0.5px;
                }

                .d-grid {
                    gap: 8px;
                }

                .d-grid .card .card-body {
                    padding: 10px;
                }

                .d-grid .card .card-body>div:first-child {
                    font-size: 12px;
                    margin-bottom: 4px;
                    line-height: 1.2;
                    font-weight: 600;
                }

                .form-text {
                    font-size: 11px;
                }

                .border-bottom {
                    margin-bottom: 0;
                }

                .border-bottom::after {
                    width: 30px;
                    height: 1px;
                }
            }

            /* Large Screens */
            @media (min-width: 1200px) {
                .col-4 {
                    max-width: 500px;
                }

                main {
                    padding: 40px 20px;
                }
            }

            /* Print Styles */
            @media print {
                body {
                    background: white;
                }

                main {
                    padding: 0;
                }

                .card {
                    box-shadow: none;
                    border: 1px solid #ddd;
                }

                .btn {
                    display: none;
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
    <main>
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <div class="card mb-2">
                        <div class="card-body border-bottom">
                            <div class="d-flex">
                                <div>Customer:</div>
                                <div class="ms-auto">{{ $shop->customer }}</div>
                            </div>

                            <div class="d-flex">
                                <div>Date:</div>
                                <div class="ms-auto">{{ $shop->formatted_created_at }}</div>
                            </div>
                            <div class="d-flex">
                                <div>Alamat: &nbsp;&nbsp;</div>
                                <div class="ms-auto">
                                    {{ $shop->alamat }}</div>
                            </div>
                        </div>
                        <div class="card-body border-bottom">
                            <div class="d-grid gap-2">
                                @foreach ($shop->details as $detail)
                                    <div class="card">
                                        <div class="card-body">
                                            <div>{{ $detail->product->name }}</div>
                                            <div class="d-flex">
                                                <div class="form-text">
                                                    {{ number_format($detail->qty) }} Kg x
                                                    {{ number_format($detail->price) }}
                                                </div>
                                                <div class="ms-auto form-text">
                                                    Rp{{ number_format($detail->qty * $detail->price) }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                <div>Total</div>
                                <div class="ms-auto mb-0 fw-bold">Rp{{ number_format($shop->total) }}</div>
                            </div>
                            <div class="d-flex">
                                <div>Payment</div>
                                <div class="ms-auto mb-0">Rp{{ number_format($shop->payment) }}</div>
                            </div>
                            <div class="d-flex">
                                <div>Return</div>
                                <div class="ms-auto mb-0">Rp{{ number_format($shop->payment - $shop->total) }}</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('riwayat') }}" class="btn btn-danger">Back</a>
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
