<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Berhasil</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: #ffff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            overflow: hidden;
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .header {
            background: linear-gradient(135deg, #2e7d32 0%, #4caf50 100%);
            padding: 40px 30px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(180deg);
            }
        }

        .success-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            position: relative;
            z-index: 1;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .checkmark {
            width: 40px;
            height: 40px;
            border: 3px solid white;
            border-radius: 50%;
            position: relative;
        }

        .checkmark::after {
            content: '';
            position: absolute;
            left: 12px;
            top: 6px;
            width: 8px;
            height: 16px;
            border: solid white;
            border-width: 0 3px 3px 0;
            transform: rotate(45deg);
            animation: checkmark 0.8s ease-in-out 0.5s both;
        }

        @keyframes checkmark {
            0% {
                opacity: 0;
                transform: rotate(45deg) scale(0);
            }

            100% {
                opacity: 1;
                transform: rotate(45deg) scale(1);
            }
        }

        .header h1 {
            color: white;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
            position: relative;
            z-index: 1;
        }

        .header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 16px;
            position: relative;
            z-index: 1;
        }

        .content {
            padding: 40px 30px;
        }

        .success-message {
            text-align: center;
            margin-bottom: 40px;
        }

        .success-text h2 {
            color: #4caf50;
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .success-text p {
            color: #64748b;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .benefits-info {
            background: linear-gradient(135deg, #2e7d32 0%, #4caf50 100%);
            border-radius: 15px;
            padding: 25px;
            border-left: 5px solid #4caf50;
            text-align: left;
        }

        .benefits-info h3 {
            color: #fff;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            text-align: center;
        }

        .benefits-info ul {
            list-style: none;
            padding: 0;
        }

        .benefits-info li {
            color: #fff;
            font-size: 15px;
            margin-bottom: 12px;
            padding: 8px 0;
            border-bottom: 1px solid rgba(16, 185, 129, 0.1);
        }

        .benefits-info li:last-child {
            border-bottom: none;
            margin-bottom: 0;
        }

        .buttons {
            display: flex;
            gap: 15px;
            flex-direction: column;
        }

        .btn {
            padding: 15px 25px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: linear-gradient(135deg, #2e7d32 0%, #4caf50 100%);
            color: white;
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
        }

        .btn-secondary {
            background: white;
            color: #4caf50;
            border: 2px solid #4caf50;
        }

        .btn-secondary:hover {
            background: #4caf50;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-print {
            background: linear-gradient(135deg, #6b7280, #4b5563);
            color: white;
            margin-top: 10px;
        }

        .btn-print:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(107, 114, 128, 0.3);
        }

        @media (min-width: 640px) {
            .buttons {
                flex-direction: row;
            }

            .btn {
                flex: 1;
            }

            .btn-print {
                margin-top: 0;
                flex: none;
                min-width: 150px;
            }
        }

        .footer {
            text-align: center;
            padding: 20px 30px;
            color: #64748b;
            font-size: 14px;
            background: #f8fafc;
        }

        /* Print styles */
        @media print {
            body {
                background: white;
                margin: 0;
                padding: 0;
            }

            .container {
                box-shadow: none;
                max-width: none;
                border-radius: 0;
            }

            .buttons,
            .btn-print {
                display: none !important;
            }

            .header {
                background: #2e7d32 !important;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="success-icon">
                <div class="checkmark"></div>
            </div>
            <h1>Pembayaran Berhasil!</h1>
            <p>Transaksi Anda telah diproses dengan sukses</p>
        </div>

        <div class="content">
            <div class="success-message">
                <div class="success-text">
                    <h2>Transaksi Selesai</h2>
                    <p>Pembayaran Anda telah berhasil diproses dan dikonfirmasi. Terima kasih atas kepercayaan Anda
                        menggunakan layanan kami!</p>
                </div>

                <div class="benefits-info">
                    <h3>✨ Apa Selanjutnya?</h3>
                    <ul>
                        <li>📧 Email konfirmasi telah dikirim</li>
                        <li>🎯 Pesanan akan dikemas dan dikirim</li>
                        <li>📦 Nikmati produk setelah datang</li>
                    </ul>
                </div>
            </div>

            <div class="buttons">
                <a class="btn btn-primary" href="{{ route('beranda') }}">
                    Kembali ke Beranda
                </a>
                <a class="btn btn-secondary" href="{{ route('shop.show', ['shop' => $shop->id]) }}">
                    Cetak Struk
                </a>
            </div>
        </div>

        <div class="footer">
            <p>Terima kasih telah menggunakan layanan kami! 💚</p>
            <p>Hubungi customer service jika ada pertanyaan: 0800-123-4567</p>
        </div>
    </div>

    <script>
        // Set transaction date to current date and time
        document.addEventListener('DOMContentLoaded', function() {
            // Animation for success message
            const successMessage = document.querySelector('.success-message');
            successMessage.style.opacity = '0';
            successMessage.style.transform = 'translateY(20px)';

            setTimeout(() => {
                successMessage.style.transition = 'all 0.8s ease';
                successMessage.style.opacity = '1';
                successMessage.style.transform = 'translateY(0)';
            }, 500);
        });

        function printReceipt() {
            // Hide buttons before printing
            const buttons = document.querySelector('.buttons');
            const printBtn = document.querySelector('.btn-print');

            buttons.style.display = 'none';
            printBtn.style.display = 'none';

            // Print the page
            window.print();

            // Show buttons after printing
            setTimeout(() => {
                buttons.style.display = 'flex';
                printBtn.style.display = 'inline-block';
            }, 1000);
        }

        function goHome() {
            // Simulate navigation - replace with actual URL
            alert('Navigasi ke halaman beranda...');
            // window.location.href = '/';
        }

        function downloadReceipt() {
            // Simulate email sending
            alert('Email struk akan dikirim ke alamat email terdaftar Anda dalam beberapa menit.');
        }

        // Add some interactive animations
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('click', function() {
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            });
        });
    </script>
</body>

</html>
