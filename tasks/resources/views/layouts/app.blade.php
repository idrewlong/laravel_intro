<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}@isset($title)
        - {{ $title }}
    @endisset
</title>
{{-- @vite('resources/css/app.css') --}}
<script src="https://cdn.tailwindcss.com"></script>


@yield('styles')
</head>

<body class="container mx-auto mt-10 mb-10 max-w-3xl px-4">
<div class="mb-8">
    @if (session()->has('success'))
        <div class="mb-4 rounded border border-green-400 bg-green-100 px-4 py-3 text-lg text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="mb-4 text-2xl">@yield('title')</h1>
</div>

<div>
    @yield('content')
</div>
</body>

</html>
