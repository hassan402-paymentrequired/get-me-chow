<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
     @notifyCss
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-black relative">
        @include('layouts.navigation')
        @include('components.flash')
        {{-- <x:notify-messages /> --}}

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-neutral-800 hidden items-center justify-between sm:flex px-10">
                <div class=" py-6  lg:px-8">
                    {{ $header }}
                </div>
                @if (!auth()->user()->is_buyer)
                    <x-primary-link link="{{ route('order.create') }}">Make Order</x-primary-link>
                @endif
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
          <x-notify::notify />
    </div>
   @notifyJs
    <script>
        window.User = {!! json_encode(optional(auth()->user())->only('id', 'email')) !!}
    </script>
</body>

</html>
