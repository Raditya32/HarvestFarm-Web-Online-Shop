<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\form;
use function Livewire\Volt\layout;

layout('layouts.guest');

form(LoginForm::class);

$login = function () {
    $this->validate();

    $this->form->authenticate();

    Session::regenerate();

    $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
};

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        .bg {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }

        .bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #A3D85B, #16a34a, #15803d);
            border-radius: 20px 20px 0 0;
        }

        .bg {
            position: relative;
        }

        /* Session Status Styling */
        .mb-4 {
            margin-bottom: 1rem;
            padding: 12px;
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            border-left: 4px solid #22c55e;
            border-radius: 8px;
            color: #15803d;
            font-weight: 500;
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        /* Input Container */
        form>div {
            position: relative;
        }

        /* Label Styling */
        label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            font-size: 14px;
            letter-spacing: 0.025em;
        }

        /* Input Styling */
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 16px;
            background: white;
            transition: all 0.3s ease;
            outline: none;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #A3D85B;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
            transform: translateY(-1px);
        }

        input[type="email"]:hover,
        input[type="password"]:hover {
            border-color: #16a34a;
        }

        /* Error Messages */
        .mt-2 {
            margin-top: 8px;
            color: #dc2626;
            font-size: 14px;
            font-weight: 500;
        }

        /* Remember Me Section */
        .block.mt-4 {
            margin-top: 24px;
        }

        .inline-flex.items-center {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: background-color 0.2s ease;
        }

        .inline-flex.items-center:hover {
            background-color: rgba(34, 197, 94, 0.05);
        }

        /* Checkbox Styling */
        input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #A3D85B;
            cursor: pointer;
        }

        .ms-2 {
            color: #6b7280;
            font-size: 14px;
            font-weight: 500;
        }

        /* Button Container */
        .flex.items-center.justify-end.mt-4 {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 32px;
            flex-wrap: wrap;
            gap: 16px;
        }

        /* Forgot Password Link */
        .underline {
            color: #004B35;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 8px;
            transition: all 0.2s ease;
        }

        .underline:hover {
            background-color: rgba(34, 197, 94, 0.1);
            color: #004B35;
            text-decoration: underline;
        }

        /* Primary Button */
        .ms-3 {
            background: linear-gradient(135deg, #A3D85B, #16a34a);
            color: white;
            padding: 14px 28px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
            letter-spacing: 0.025em;
        }

        .ms-3:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(34, 197, 94, 0.4);
            background: linear-gradient(135deg, #A3D85B, #15803d);
        }

        .ms-3:active {
            transform: translateY(0);
            box-shadow: 0 4px 12px rgba(34, 197, 94, 0.3);
        }

        /* Responsive Design */
        @media (max-width: 480px) {
            .bg {
                padding: 30px 20px;
                margin: 10px;
                border-radius: 16px;
            }

            .flex.items-center.justify-end.mt-4 {
                flex-direction: column;
                align-items: stretch;
            }

            .ms-3 {
                width: 100%;
                order: 2;
            }

            .underline {
                text-align: center;
                order: 1;
            }
        }

        @media (max-width: 360px) {
            .bg {
                padding: 25px 15px;
            }

            input[type="email"],
            input[type="password"] {
                padding: 12px 14px;
                font-size: 15px;
            }

            .ms-3 {
                padding: 12px 24px;
                font-size: 15px;
            }
        }

        /* Loading Animation for Form Submission */
        form.loading .ms-3 {
            pointer-events: none;
            opacity: 0.7;
            position: relative;
        }

        form.loading .ms-3::after {
            content: '';
            position: absolute;
            width: 16px;
            height: 16px;
            margin: auto;
            border: 2px solid transparent;
            border-top: 2px solid white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes spin {
            0% {
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }

        /* Focus visible for accessibility */
        *:focus-visible {
            outline: 2px solid #22c55e;
            outline-offset: 2px;
        }
    </style>
</head>

<body>
    <div class="bg">
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form wire:submit="login">
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="form.email" id="email" class="block mt-1 w-full" type="email"
                    name="email" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input wire:model="form.password" id="password" class="block mt-1 w-full" type="password"
                    name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
            </div>



            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}" wire:navigate>
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function() {
            this.classList.add('loading');
        });
    </script>
</body>

</html>
