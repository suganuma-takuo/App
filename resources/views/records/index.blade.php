<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Records</title>
        <script src="https://js.pusher.com/7.2/pusher.min.js"></script>
        <script>
            Pusher.logToConsole = true;
            var pusher = new Pusher('d168de9db8dae63eec7a', {cluster: 'ap3'});
            var channel = pusher.subscribe('calling');
            channel.bind('App\\Events\\CustomerCalling', function(){
                alert('お客様から呼び出しがあります。');
            });
        </script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <x-slot name="header">
        Records
    </x-slot>
    <body>
        <a href='/records/create'>create</a>
        <div class='records'>
            <div class='record'>
            <table>
                <tr>
                    <td>user_id</td>
                    <td>name</td>
                    <td>date</td>
                    <td>time_in</td>
                    <td>time_out</td>
                    <td>break_in</td>
                    <td>break_out</td>
                    <td>remarks</td>
                </tr>
            @foreach($records as $record)
                <tr>
                    <td><a href="/records/{{ $record->id }}">{{ $record->user->id }}</a> </td>
                    <td>{{ $record->user->name }} </td>
                    <td>{{ $record->date }} </td>
                    <td>{{ substr($record->time_in, 0, 5) }} </td>
                    <td>{{ substr($record->time_out, 0, 5) }} </td>
                    <td>{{ substr($record->break_in, 0, 5) }} </td>
                    <td>{{ substr($record->break_out, 0, 5) }} </td>
                    <td>{{ $record->remarks }} </td>
                    <td>
                        <form action="/records/{{ $record->id }}" id="form_{{ $record->id }}" method="post">
                            @csrf
                            @method('DELETE')
                                <button type="button" onclick="deleteRecord({{ $record->id }})">delete</button> 
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
        </div>
        <div class='paginate'>
            {{ $records->links() }}
        </div>
        <p class="user_name">ユーザーネーム: {{ Auth::user()->name }}</p>
        <script>
        function deleteRecord(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
            }
        }
        </script>
    </body>
    </x-app-layout>
</html>