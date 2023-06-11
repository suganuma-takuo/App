<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Records</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Records</h1>
        <a href='/records/create'>create</a>
        <div class='records'>
            <div class='record'>
            <table>
                <tr>
                    <td>id</td>
                    <td>date</td>
                    <td>time_in</td>
                    <td>time_out</td>
                    <td>break_in</td>
                    <td>break_out</td>
                    <td>remarks</td>
                </tr>
            @foreach($records as $record)
                <tr>
                    <td><a href="/records/{{ $record->id }}">{{ $record->id }}</a> </td>
                    <td>{{ $record->date }} </td>
                    <td>{{ $record->time_in }} </td>
                    <td>{{ $record->time_out }} </td>
                    <td>{{ $record->break_in }} </td>
                    <td>{{ $record->break_out }} </td>
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
        <script>
        function deleteRecord(id) {
            'use strict'

            if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
            }
        }
        </script>
    </body>