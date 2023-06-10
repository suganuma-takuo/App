<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Record</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Records</h1>
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
                    <td>{{ $record->id }} </td>
                    <td>{{ $record->date }} </td>
                    <td>{{ $record->time_in }} </td>
                    <td>{{ $record->time_out }} </td>
                    <td>{{ $record->break_in }} </td>
                    <td>{{ $record->break_out }} </td>
                    <td>{{ $record->remarks }} </td>
                </tr>
            @endforeach
            </div>
        </div>
        <div class='paginate'>
            {{ $records->links() }}
        </div>
    </body>