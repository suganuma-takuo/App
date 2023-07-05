<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script>
            Pusher.logToConsole = true;
            var pusher = new Pusher('d168de9db8dae63eec7a', {cluster: 'ap3'});
            var channel = pusher.subscribe('calling');
            channel.bind('App\\Events\\CustomerCalling', function(data){
                alert('お客様から呼び出しがあります。');
            });
        </script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <body>
        <h1 class="title">
           タイトル:{{ $post->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $post->body }}</p>    
            </div>
        </div>
        <div class="author"><small>著者:{{ $post->user->name }}</small></div>
        <div class="footer">
            <div class="edit"><a href="/posts/{{ $post->id }}/edit">edit</a></div>
            <a href="/posts">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>