<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title inertia>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/sass/app.scss', 'resources/js/app.js'])
    @inertiaHead

    <style>


    </style>
</head>
<body>
<div>
    @routes
    <nav class="navbar bg-dark navbar-expand-md border-bottom border-body" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
               DDD for dummies
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <main style="padding-bottom: 5rem !important; background-color: white" class="mt-4">
        @inertia
    </main>
</div>

</body>
</html>
