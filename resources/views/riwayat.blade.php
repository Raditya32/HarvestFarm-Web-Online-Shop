<x-app-layout>

    <x-slot name="header">

        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Riwayat Transakasi') }}
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
            margin-top: 60px;
            padding-left: 20px;
            padding-right: 20px;
        }

        .table-wrapper {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }

        .modern-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Poppins', sans-serif;
            min-width: 900px;
        }

        .modern-table thead {
            background: linear-gradient(135deg, #1E6B43, #2e7d32);
            color: white;
        }

        .modern-table thead th {
            padding: 20px 16px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            border: none;
            white-space: nowrap;
        }

        .transaction-row {
            transition: all 0.3s ease;
            border-bottom: 1px solid #f1f3f4;
        }

        .transaction-row:hover {
            background: linear-gradient(90deg, rgba(103, 126, 234, 0.05), rgba(118, 75, 162, 0.05));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .transaction-row td {
            padding: 20px 16px;
            vertical-align: top;
            border: none;
        }

        .transaction-id {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            font-weight: medium
        }

        .id-badge {
            background: linear-gradient(135deg, #4CAF50 0%, #8BC34A 100%);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 4px;
            white-space: nowrap;
        }

        .id-label {
            font-size: 11px;
            color: #8e8e93;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .datetime-info {
            display: flex;
            flex-direction: column;
            min-width: 120px;
        }

        .date-primary {
            font-weight: 600;
            color: #2c3e50;
            font-size: 14px;
            white-space: nowrap;
        }

        .amount {
            display: flex;
            align-items: baseline;
            font-weight: bold;
            min-width: 100px;
        }

        .total-amount {
            color: rgb(212, 0, 0);
            font-size: 16px;
        }

        .payment-amount {
            color: #27ae60;
            font-size: 16px;
        }

        .currency {
            font-size: 12px;
            margin-right: 2px;
            opacity: 0.8;
        }

        .value {
            font-size: 16px;
        }

        .product-list {
            max-width: 300px;
            min-width: 250px;
        }

        .product-item {
            background: #f8f9fa;
            padding: 12px;
            margin-bottom: 8px;
            border-radius: 8px;
            border-left: 4px solid #4CAF50;
            transition: all 0.2s ease;
        }

        .product-item:hover {
            background: #e3f2fd;
            transform: translateX(4px);
        }

        .product-item:last-child {
            margin-bottom: 0;
        }

        .product-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 6px;
        }

        .product-name {
            font-weight: 600;
            color: #2c3e50;
            font-size: 14px;
        }

        .deleted-badge {
            background: #e74c3c;
            color: white;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 10px;
            text-transform: uppercase;
        }

        .product-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .qty {
            background: #ecf0f1;
            padding: 4px 8px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            color: #7f8c8d;
        }

        .price {
            font-weight: bold;
            color: #27ae60;
            font-size: 13px;
        }

        .status-badge {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .status-badge.completed {
            background: linear-gradient(135deg, #56ab2f, #a8e6cf);
            color: white;
        }

        .status-icon {
            font-size: 14px;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .empty-icon {
            font-size: 64px;
            margin-bottom: 20px;
        }

        .empty-state h3 {
            color: #2c3e50;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .empty-state p {
            color: #7f8c8d;
            font-size: 14px;
        }

        .btn-modern-gradient {
            background: linear-gradient(135deg, #56ab2f, #a8e6cf);
            border: none;
            color: white;
            padding: 8px 16px;
            font-size: 12px;
            font-weight: 500;
            border-radius: 20px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
            white-space: nowrap;
        }

        .btn-modern-gradient:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(40, 167, 69, 0.4);
            color: white;
            text-decoration: none;
        }

        .btn-modern-gradient:active {
            transform: translateY(0);
        }

        /* Mobile Card Layout */
        .mobile-card-container {
            display: none;
        }

        .mobile-transaction-card {
            background: white;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 16px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #4CAF50;
        }

        .mobile-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #f1f3f4;
        }

        .mobile-card-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 8px 0;
            border-bottom: 1px solid #f8f9fa;
        }

        .mobile-card-row:last-child {
            border-bottom: none;
            padding-top: 15px;
        }

        .mobile-card-label {
            font-weight: 600;
            color: #7f8c8d;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .mobile-card-value {
            font-weight: 500;
            color: #2c3e50;
        }

        .mobile-product-list {
            margin-top: 10px;
        }

        .mobile-product-item {
            background: #f8f9fa;
            padding: 10px;
            margin-bottom: 6px;
            border-radius: 8px;
            border-left: 3px solid #4CAF50;
        }

        .mobile-product-item:last-child {
            margin-bottom: 0;
        }

        .mobile-status-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #f1f3f4;
        }

        /* Responsive Design */
        @media (max-width: 1200px) {
            .modern-table {
                min-width: 800px;
            }

            .product-list {
                max-width: 250px;
                min-width: 200px;
            }
        }

        @media (max-width: 1024px) {
            main {
                padding-left: 15px;
                padding-right: 15px;
            }

            .modern-table {
                font-size: 13px;
                min-width: 750px;
            }

            .modern-table thead th,
            .transaction-row td {
                padding: 15px 12px;
            }

            .product-list {
                max-width: 220px;
                min-width: 180px;
            }

            .id-badge {
                padding: 6px 12px;
                font-size: 12px;
            }

            .total-amount,
            .payment-amount {
                font-size: 14px;
            }
        }

        @media (max-width: 768px) {
            main {
                padding-left: 10px;
                padding-right: 10px;
                margin-top: 40px;
            }

            .table-wrapper {
                border-radius: 12px;
            }

            .modern-table {
                font-size: 12px;
                min-width: 650px;
            }

            .modern-table thead th,
            .transaction-row td {
                padding: 12px 8px;
            }

            .product-list {
                max-width: 180px;
                min-width: 150px;
            }

            .product-item {
                padding: 8px;
                margin-bottom: 6px;
            }

            .product-name {
                font-size: 12px;
            }

            .btn-modern-gradient {
                padding: 6px 12px;
                font-size: 11px;
            }
        }

        /* Mobile First Approach - Switch to Card Layout */
        @media (max-width: 640px) {
            .table-wrapper {
                display: none;
            }

            .mobile-card-container {
                display: block;
            }

            main {
                padding-left: 12px;
                padding-right: 12px;
            }

            .mobile-transaction-card {
                padding: 16px;
                margin-bottom: 12px;
            }

            .mobile-card-header .id-badge {
                font-size: 12px;
                padding: 6px 12px;
            }

            .mobile-card-header .date-primary {
                font-size: 12px;
            }

            .mobile-card-value .total-amount,
            .mobile-card-value .payment-amount {
                font-size: 14px;
            }

            .mobile-product-item {
                padding: 8px;
            }

            .mobile-product-item .product-name {
                font-size: 12px;
            }

            .btn-modern-gradient {
                padding: 8px 16px;
                font-size: 12px;
            }
        }

        @media (max-width: 480px) {
            main {
                padding-left: 8px;
                padding-right: 8px;
                margin-top: 30px;
            }

            .mobile-transaction-card {
                padding: 12px;
                margin-bottom: 10px;
                border-radius: 12px;
            }

            .mobile-card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }

            .mobile-card-row {
                padding: 6px 0;
            }

            .mobile-card-label {
                font-size: 11px;
            }

            .mobile-card-value {
                font-size: 13px;
            }

            .mobile-product-item {
                padding: 6px;
                margin-bottom: 4px;
            }

            .mobile-product-item .product-name {
                font-size: 11px;
            }

            .mobile-product-item .qty {
                font-size: 10px;
                padding: 3px 6px;
            }

            .mobile-product-item .price {
                font-size: 11px;
            }

            .btn-modern-gradient {
                padding: 6px 12px;
                font-size: 11px;
            }

            .status-badge {
                padding: 6px 12px;
                font-size: 11px;
            }
        }

        @media (max-width: 360px) {
            main {
                padding-left: 6px;
                padding-right: 6px;
            }

            .mobile-transaction-card {
                padding: 10px;
                margin-bottom: 8px;
            }

            .mobile-card-header .id-badge {
                font-size: 10px;
                padding: 4px 8px;
            }

            .mobile-card-label {
                font-size: 10px;
            }

            .mobile-card-value {
                font-size: 12px;
            }

            .mobile-product-item {
                padding: 5px;
            }

            .mobile-product-item .product-name {
                font-size: 10px;
            }

            .mobile-product-item .qty {
                font-size: 9px;
                padding: 2px 4px;
            }

            .mobile-product-item .price {
                font-size: 10px;
            }

            .btn-modern-gradient {
                padding: 5px 10px;
                font-size: 10px;
            }

            .status-badge {
                padding: 5px 10px;
                font-size: 10px;
            }

            .empty-state {
                padding: 40px 15px;
            }

            .empty-icon {
                font-size: 48px;
            }
        }

        /* Landscape phone orientation */
        @media (max-width: 768px) and (orientation: landscape) {
            .table-wrapper {
                display: block;
            }

            .mobile-card-container {
                display: none;
            }

            .modern-table {
                min-width: 600px;
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
        @forelse($riwayat as $shop)
            @if ($loop->first)
                <!-- Desktop/Tablet Table View -->
                <div class="transaction-container">
                    <div class="table-wrapper">
                        <table class="modern-table">
                            <thead>
                                <tr>
                                    <th>Transaksi</th>
                                    <th>Waktu</th>
                                    <th>Total Belanja</th>
                                    <th>Pembayaran</th>
                                    <th>Detail Produk</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
            @endif
            <tr class="transaction-row">
                <td>
                    <div class="transaction-id">
                        <div class="id-badge">{{ $shop->customer }}</div>
                    </div>
                </td>
                <td>
                    <div class="datetime-info">
                        <div class="date-primary">{{ $shop->formatted_created_at }}</div>
                    </div>
                </td>
                <td>
                    <div class="amount total-amount">
                        <span class="currency">Rp </span>
                        <span class="value"> {{ number_format($shop->total) }}</span>
                    </div>
                </td>
                <td>
                    <div class="amount payment-amount">
                        <span class="currency">Rp </span>
                        <span class="value"> {{ number_format($shop->payment) }}</span>
                    </div>
                </td>
                <td>
                    <div class="product-list">
                        @foreach ($shop->details as $detail)
                            <div class="product-item">
                                <div class="product-header">
                                    <span class="product-name">{{ $detail->product->name ?? 'Produk dihapus' }}</span>
                                    @if (!$detail->product)
                                        <span class="deleted-badge">Dihapus</span>
                                    @endif
                                </div>
                                <div class="product-details">
                                    <span class="qty">{{ $detail->qty }}x</span>
                                    <span class="price">Rp{{ number_format($detail->price) }}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </td>
                <td>
                    <div class="status-badge completed">
                        <i class="status-icon">✓</i>
                        <span>Selesai</span>
                    </div>
                    <a href="{{ route('shop.show', ['shop' => $shop->id]) }}" class="btn-modern-gradient">
                        Struk
                    </a>
                </td>
            </tr>
            @if ($loop->last)
                </tbody>
                </table>
                </div>
                </div>

                <!-- Mobile Card View -->
                <div class="mobile-card-container">
                    @foreach ($riwayat as $shop)
                        <div class="mobile-transaction-card">
                            <div class="mobile-card-header">
                                <div class="id-badge">{{ $shop->customer }}</div>
                                <div class="date-primary">{{ $shop->formatted_created_at }}</div>
                            </div>

                            <div class="mobile-card-row">
                                <span class="mobile-card-label">Total Belanja</span>
                                <div class="mobile-card-value">
                                    <div class="amount total-amount">
                                        <span class="currency">Rp </span>
                                        <span class="value">{{ number_format($shop->total) }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mobile-card-row">
                                <span class="mobile-card-label">Pembayaran</span>
                                <div class="mobile-card-value">
                                    <div class="amount payment-amount">
                                        <span class="currency">Rp </span>
                                        <span class="value">{{ number_format($shop->payment) }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="mobile-card-row">
                                <span class="mobile-card-label">Detail Produk</span>
                                <div class="mobile-card-value">
                                    <div class="mobile-product-list">
                                        @foreach ($shop->details as $detail)
                                            <div class="mobile-product-item">
                                                <div class="product-header">
                                                    <span
                                                        class="product-name">{{ $detail->product->name ?? 'Produk dihapus' }}</span>
                                                    @if (!$detail->product)
                                                        <span class="deleted-badge">Dihapus</span>
                                                    @endif
                                                </div>
                                                <div class="product-details">
                                                    <span class="qty">{{ $detail->qty }}x</span>
                                                    <span class="price">Rp{{ number_format($detail->price) }}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="mobile-status-section">
                                <div class="status-badge completed">
                                    <i class="status-icon">✓</i>
                                    <span>Selesai</span>
                                </div>
                                <a href="{{ route('shop.show', ['shop' => $shop->id]) }}" class="btn-modern-gradient">
                                    Struk
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @empty
            <div class="empty-state">
                <div class="empty-icon">🛍️</div>
                <h3>Belum Ada Transaksi</h3>
                <p>Transaksi Anda akan muncul di sini setelah melakukan pembelian</p>
            </div>
        @endforelse
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
