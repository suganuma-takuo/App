<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Records</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <x-app-layout>
    <body>
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
                <tr>
                    <td>{{ $record->user->id }} </td>
                    <td>{{ $record->user->name }}</td>
                    <td>{{ $record->date }} </td>
                    <td>{{ substr($record->time_in, 0, 5) }} </td>
                    <td>{{ substr($record->time_out, 0, 5) }} </td>
                    <td>{{ substr($record->break_in, 0, 5) }} </td>
                    <td>{{ substr($record->break_out, 0, 5) }} </td>
                    <td>{{ $record->remarks }} </td>
                </tr>
            </table>
        </div>
        <div class="edit"><a href="/records/{{ $record->id }}/edit">edit</a></div>
        <div class="footer">
            <a href="/records">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>