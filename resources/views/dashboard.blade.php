<head>
    <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script>
            Pusher.logToConsole = true;
            var pusher = new Pusher('d168de9db8dae63eec7a', {cluster: 'ap3'});
            var channel = pusher.subscribe('calling');
            channel.bind('App\\Events\\CustomerCalling', function(){
                confirm('お客様から呼び出しがあります。');
            });
        </script>
</head>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
