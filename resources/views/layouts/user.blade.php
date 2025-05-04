<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @notifyCss
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('components.users-header')
    <main>
        {{ $slot }}
    </main>
    <x-notify::notify />
    @notifyJs
    <script>
        window.User = {!! json_encode(optional(auth()->user())->only('id', 'email')) !!}
    </script>
</body>

</html>
