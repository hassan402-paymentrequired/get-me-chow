<!DOCTYPE html>
<html lang="en" class="h-full bg-background text-[var(--foreground)]">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @notifyCss
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full" x-data="{ sidebarOpen: false, drop: false }">
    @include('layouts.admin-header')
    @include('components.flash')
    <main>
        {{ $slot }}
    </main>

    <button onclick="requestPermission()">Enable Notification</button>

    <script>
        window.User = {!! json_encode(optional(auth()->user())->only('id', 'email')) !!}
        navigator.serviceWorker.register("sw.js");

        // widow.addEventListener("load", requestPermission);

        function requestPermission() {
            Notification.requestPermission().then((permission) => {
                
                if (permission === 'granted') {

                    // get service worker
                    navigator.serviceWorker.ready.then((sw) => {

                        // subscribe
                        sw.pushManager.subscribe({
                            userVisibleOnly: true,
                            applicationServerKey: "BC5zel9JoqeOY2yVTJjDhiE1IisJTVHq-_p4rxC3zd60gQSqXzra_7_m7B12axwI42tZIUXYGXhIJ-t5MolKjNY"
                        }).then((subscription) => {

                            // subscription successful
                            fetch("/api/push-subscribe", {
                                method: "post",
                                body: JSON.stringify(subscription)
                            }).then(alert("ok"));
                        });
                    });
                }
            });
        }
    </script>
</body>

</html>
