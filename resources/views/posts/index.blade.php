<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Blog</title>
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
        <a href='/posts/create'>create</a>
        <h1>みんなの投稿</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}">タイトル:{{ $post->title }}</a>
                    </h2>
                    <p class='body'>本文:{{ $post->body }}</p>
                    <small>著者:{{ $post->user->name }}</small>
                    <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="button" onclick="deletePost({{ $post->id }})">delete</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        <script>
            function deletePost(id){
                'use strict'
                
                if(confirm('削除すると復元できません。\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
    </x-app-layout>
</html>