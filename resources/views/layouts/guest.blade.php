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

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

    <!-- Scripts -->
    <scripts src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="flex flex-col sm:flex-row items-center">

            <div class="flex px-12 py-12 bg-white shadow-md overflow-hidden sm:rounded-2xl"
                style="min-height: auto;">
                <div class="flex flex-col items-center justify-center w-auto mr-10 ml-10">
                    <img src="{{ asset('image/petshop.png') }}" alt="" class="mb-4 hidden sm:block h-36">
                </div>

                <div class="flex flex-col items-center w-80">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

</body>

</html>