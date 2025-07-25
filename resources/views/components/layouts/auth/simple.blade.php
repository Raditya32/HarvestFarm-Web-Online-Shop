<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>

<body>

    <div
        class="bg-white/70 backdrop-blur-md rounded-xl shadow-lg flex min-h-svh flex-col items-center justify-center gap-4 p-4 md:p-6">
        <div class="flex w-full max-w-xs flex-col gap-2">
            <a href="{{ route('home') }}" class="flex flex-col items-center gap-2 font-medium" wire:navigate>
                <span class="flex h-8 w-8 mb-1 items-center justify-center rounded-md">
                    <x-app-logo-icon class="size-8 fill-current text-black" />
                </span>
                <span class="sr-only">{{ config('app.name', 'HarvestFarm') }}</span>
            </a>
            <div class="flex flex-col gap-4">
                {{ $slot }}
            </div>
        </div>
    </div>
</body>

</html>
