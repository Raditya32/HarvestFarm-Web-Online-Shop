<?php

use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\layout;
use function Livewire\Volt\rules;
use function Livewire\Volt\state;

layout('layouts.guest');

state(['email' => '']);

rules(['email' => ['required', 'string', 'email']]);

$sendPasswordResetLink = function () {
    $this->validate();

    // We will send the password reset link to this user. Once we have attempted
    // to send the link, we will examine the response then see the message we
    // need to show to the user. Finally, we'll send out a proper response.
    $status = Password::sendResetLink($this->only('email'));

    if ($status != Password::RESET_LINK_SENT) {
        $this->addError('email', __($status));

        return;
    }

    $this->reset('email');

    Session::flash('status', __($status));
};

?>
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
            backdrop-filter: blur(20px);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 480px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            position: relative;
            overflow: hidden;
        }

        .bg::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #A3D85B, #16a34a, #15803d);
            z-index: 1;
        }

        .bg::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
            z-index: 0;
        }

        .bg>* {
            position: relative;
            z-index: 2;
        }

        /* Header styling for the description */
        .mb-4.text-sm {
            margin-bottom: 2rem;
            padding: 20px;
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            border-left: 4px solid #22c55e;
            border-radius: 12px;
            color: #15803d;
            font-weight: 500;
            line-height: 1.6;
            font-size: 15px;
        }

        /* Session Status Styling */
        .mb-4:not(.text-sm) {
            margin-bottom: 1.5rem;
            padding: 16px 20px;
            background: linear-gradient(135deg, #dcfce7, #bbf7d0);
            border-left: 4px solid #10b981;
            border-radius: 12px;
            color: #065f46;
            font-weight: 500;
            box-shadow: 0 4px 6px rgba(16, 185, 129, 0.1);
        }

        /* Form Styling */
        form {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        /* Input Container */
        form>div {
            position: relative;
        }

        /* Label Styling - targeting Laravel's x-input-label */
        label,
        [class*="input-label"] {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 10px;
            font-size: 15px;
            letter-spacing: 0.025em;
            text-transform: uppercase;
            font-size: 13px;
        }

        /* Input Styling - targeting Laravel's x-text-input */
        input[type="email"],
        input[type="password"],
        [class*="text-input"] {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid #A3D85B;
            border-radius: 14px;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.9);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            outline: none;
            color: #1a202c;
        }

        input[type="email"]:focus,
        input[type="password"]:focus,
        [class*="text-input"]:focus {
            border-color: #16a34a;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            transform: translateY(-2px);
            background: white;
        }

        input[type="email"]:hover,
        input[type="password"]:hover,
        [class*="text-input"]:hover {
            border-color: #a0aec0;
            background: white;
        }

        /* Error Messages - targeting Laravel's x-input-error */
        .mt-2,
        [class*="input-error"] {
            margin-top: 10px;
            color: #dc2626;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .mt-2::before,
        [class*="input-error"]::before {
            content: '⚠';
            font-size: 12px;
        }

        /* Button Container */
        .mt-4:last-child {
            margin-top: 32px;
            display: flex;
            justify-content: center;
        }

        /* Primary Button - targeting Laravel's x-primary-button */
        button,
        [class*="primary-button"] {
            background: linear-gradient(135deg, #A3D85B, #16a34a);
            color: white;
            padding: 16px 32px;
            border: none;
            border-radius: 14px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
            letter-spacing: 0.025em;
            text-transform: uppercase;
            font-size: 14px;
            position: relative;
            overflow: hidden;
            min-width: 200px;
        }

        button::before,
        [class*="primary-button"]::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        button:hover,
        [class*="primary-button"]:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
            background: linear-gradient(135deg, #A3D85B, #16a34a);
        }

        button:hover::before,
        [class*="primary-button"]:hover::before {
            left: 100%;
        }

        button:active,
        [class*="primary-button"]:active {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }

        /* Loading Animation for Form Submission */
        form.loading button,
        form.loading [class*="primary-button"] {
            pointer-events: none;
            opacity: 0.8;
            position: relative;
        }

        form.loading button::after,
        form.loading [class*="primary-button"]::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
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

        /* Responsive Design */
        @media (max-width: 560px) {
            .bg {
                padding: 30px 25px;
                margin: 10px;
                border-radius: 16px;
                max-width: 100%;
            }

            button,
            [class*="primary-button"] {
                width: 100%;
                min-width: auto;
            }
        }

        @media (max-width: 400px) {
            .bg {
                padding: 25px 20px;
            }

            input[type="email"],
            input[type="password"],
            [class*="text-input"] {
                padding: 14px 16px;
                font-size: 15px;
            }

            button,
            [class*="primary-button"] {
                padding: 14px 28px;
                font-size: 13px;
            }
        }

        /* Focus visible for accessibility */
        *:focus-visible {
            outline: 2px solid #667eea;
            outline-offset: 2px;
        }

        /* Enhance Laravel component styling */
        [wire\:submit] {
            background: none;
        }

        /* Style any wire:model inputs specifically */
        [wire\:model] {
            transition: all 0.3s ease;
        }

        [wire\:model]:focus {
            outline: none;
        }
    </style>
</head>

<body>
    <div class="bg">
        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form wire:submit="sendPasswordResetLink">
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-primary-button>
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</body>

</html>
