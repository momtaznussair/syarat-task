<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Syaaraat PHP Task' }}</title>
    @livewireStyles
</head>
<body>
    <x-header />

    <main>
        {{ $slot }}
    </main>

    <x-footer />
    @livewireScripts
</body>
</html>