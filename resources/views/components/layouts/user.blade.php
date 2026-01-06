@props(['title' => 'News Portal'])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KESIT {{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('kesit.ico') }}" type="image/x-icon">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
</head>
<body>
{{-- Header (Public Partial) --}}
@include('partials.user.header')

{{-- Main Content Slot --}}
<main class="px-5 md:px-10 xl:px-36 py-12 mb-12">
    {{ $slot }}
</main>
<x-toast />
{{ $scripts ?? '' }}
</body>
</html>
