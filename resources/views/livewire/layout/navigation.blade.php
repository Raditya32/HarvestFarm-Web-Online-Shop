<?php

use App\Livewire\Actions\Logout;

$logout = function (Logout $logout) {
    $logout->logout();

    $this->redirect('/', navigate: true);
};

?>

<body>
    <nav x-data="{ open: false }" class="bg-white border-b border-gray-500">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="w-full flex justify-between items-center px-4 py-2">
                    <!-- KIRI: Logo dan Brand -->
                    <div class="flex items-center">
                        <a href="{{ route('beranda') }}" wire:navigate>
                            <img src="{{ asset('build/assets/image/logo2.png') }}" alt="Logo" class="h-12 w-12">
                        </a>
                        <a style="color: #004d2c !important; font-weight: 1000; font-size: 23px;" wire:navigate
                            class="ms-2">
                            HarvestFarm
                        </a>
                    </div>

                    <div class="hidden sm:flex items-center space-x-8">
                        <x-nav-link :href="route('beranda')" :active="request()->routeIs('beranda')" wire:navigate class="px-3">
                            {{ __('Beranda') }}
                        </x-nav-link>

                        @auth
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petani')
                                <x-nav-link :href="route('products.read')" :active="request()->routeIs('products.read')" wire:navigate class="px-3">
                                    {{ __('Products') }}
                                </x-nav-link>
                                <x-nav-link :href="route('gudang')" :active="request()->routeIs('gudang')" wire:navigate class="px-3">
                                    {{ __('Gudang') }}
                                </x-nav-link>
                            @endif
                            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'user')
                                <x-nav-link :href="route('shop.read')" :active="request()->routeIs('shop.read')" wire:navigate class="px-3">
                                    {{ __('Shop') }}
                                </x-nav-link>
                                <x-nav-link :href="route('riwayat')" :active="request()->routeIs('riwayat')" wire:navigate class="px-3">
                                    {{ __('Riwayat') }}
                                </x-nav-link>
                            @endif
                        @endauth
                    </div>


                    <!-- KANAN: Profile dan Hamburger -->
                    <div class="flex items-center gap-4">
                        <!-- Profile Dropdown (desktop) -->
                        <div class="hidden sm:flex items-center">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <button
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                        <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name"
                                            x-on:profile-updated.window="name = $event.detail.name"></div>
                                        <div class="ms-1">
                                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link :href="route('profile')" wire:navigate>
                                        {{ __('Profile') }}
                                    </x-dropdown-link>
                                    <button wire:click="logout" class="w-full text-start">
                                        <x-dropdown-link>
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </button>
                                </x-slot>
                            </x-dropdown>
                        </div>

                        <!-- Hamburger (mobile) -->
                        <div class="sm:hidden">
                            <button @click="open = ! open"
                                class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                    <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 6h16M4 12h16M4 18h16" />
                                    <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('beranda')" :active="request()->routeIs('beranda')" wire:navigate>
                        {{ __('Beranda') }}
                    </x-responsive-nav-link>
                    @auth
                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'petani')
                            <x-responsive-nav-link :href="route('products.read')" :active="request()->routeIs('products.read')" wire:navigate>
                                {{ __('Products') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('gudang')" :active="request()->routeIs('gudang')" wire:navigate>
                                {{ __('Gudang') }}
                            </x-responsive-nav-link>
                        @endif

                        @if (auth()->user()->role == 'admin' || auth()->user()->role == 'user')
                            <x-responsive-nav-link :href="route('shop.read')" :active="request()->routeIs('shop.read')" wire:navigate>
                                {{ __('Shop') }}
                            </x-responsive-nav-link>
                            <x-responsive-nav-link :href="route('riwayat')" :active="request()->routeIs('riwayat')" wire:navigate>
                                {{ __('Riwayat') }}
                            </x-responsive-nav-link>
                        @endif
                    @endauth
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name"
                            x-on:profile-updated.window="name = $event.detail.name"></div>
                        <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-responsive-nav-link>

                        <!-- Authentication -->
                        <button id="logout-button" class="w-full text-start">
                            <x-responsive-nav-link>
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>


</body>
