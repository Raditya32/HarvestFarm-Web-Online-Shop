<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Gudang') }}
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

        main {
            max-width: 1500px;
            margin-top: 100px;
            left: 50px;
        }

        .container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            margin: 0 auto;
            border-radius: 24px;
            padding: 40px;
            box-shadow:
                0 25px 50px -12px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(135deg, #1E6B43, #2e7d32);
            border-radius: 24px 24px 0 0;
        }

        .mb-4 {
            color: #1a202c;
            font-size: clamp(1.5rem, 4vw, 2.5rem);
            font-weight: 700;
            position: relative;
            background: linear-gradient(135deg, #1E6B43, #2e7d32);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-align: center;
        }

        .mb-4::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: linear-gradient(135deg, #1E6B43, #2e7d32);
            border-radius: 2px;
        }

        .mb-4 {
            margin-bottom: 2rem;
        }

        #stockChart {
            background: rgba(255, 255, 255, 0.7);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            transition: all 0.3s ease;
        }

        #stockChart:hover {
            transform: translateY(-2px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
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

        /* Responsive Design */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .container {
                padding: 20px;
                border-radius: 16px;
            }

            h2 {
                font-size: 1.5rem;
            }

            #stockChart {
                padding: 15px;
            }
        }

        @media (max-width: 480px) {
            .container {
                padding: 15px;
            }

            h2 {
                font-size: 1.25rem;
            }

            #stockChart {
                padding: 10px;
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
    <main>
        <div class="container">
            <h2 class="mb-4">Diagram Stok Barang per Kategori</h2>
            <canvas id="stockChart" height="100"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('stockChart').getContext('2d');
            const stockChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: @json($chartCategories),
                    datasets: [{
                        label: 'Total Stok',
                        data: @json($chartStocks),
                        backgroundColor: '#4CAF50',
                        borderColor: '#4CAF50',
                        borderWidth: 1,
                        borderRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Stok Produk Berdasarkan Kategori'
                        },
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
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
