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
    <script src="https://cdn.jsdelivr.net/npm/web-push"></script>

    <script>
        window.User = {!! json_encode(optional(auth()->user())->only('id', 'email')) !!}
        navigator.serviceWorker.register("sw.js");

        function askForNotificationPermission() {
            Notification.requestPermission().then(function(permission) {
                if (permission === 'granted') {
                    navigator.serviceWorker.ready.then(function(registration) {


                        registration.pushManager.subscribe({
                            userVisibleOnly: true,
                            applicationServerKey: '<?= env('VAPID_PUBLIC_KEY') ?>'
                        }).then(async function(subscription) {
                            //  console.log(subscription);
                            await fetch("{{ route('save.subscription') }}", {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify(subscription)
                                }).then(function(response) {


                                    if (response.ok) {
                                        console.log('Subscription saved successfully.');
                                    } else {
                                        console.error('Failed to save subscription.');
                                    }
                                }).then(function(data) {
                                    console.log('Subscription saved:', data);
                                })
                                .catch(function(error) {
                                    console.error('Error saving subscription:', error);
                                });
                        });
                    });
                }
            });
        }
    </script>
</body>

</html>
