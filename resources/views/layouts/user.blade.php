<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('components.users-header')
    @include('components.flash')
    <main>
        {{ $slot }}
    </main>
    <script>
        window.User = {!! json_encode(optional(auth()->user())->only('id', 'email')) !!}
    </script>
</body>

</html>
