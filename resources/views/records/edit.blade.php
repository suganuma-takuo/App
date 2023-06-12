<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Records</title>
    </head>
    <x-app-layout>
    <body>
        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/records/{{ $record->id }}" method="POST">
                @csrf
                @method('PUT')
                <table>
                    <tr>
                        <td>date</td>
                        <td>time_in</td>
                        <td>time_out</td>
                        <td>break_in</td>
                        <td>break_out</td>
                        <td>remarks</td>
                    </tr>
                    <tr>
                        <td><input type="date" name="record[date]" placeholder="日付" value="{{ $record->date }}"/> </td>
                        <td><input type="time" name="record[time_in]" placeholder="勤務開始時刻" value="{{ $record->time_in }}"/> </td>
                        <td><input type="time" name="record[time_out]" placeholder="勤務終了時刻" value="{{ $record->time_out }}"/> </td>
                        <td><input type="time" name="record[break_in]" placeholder="休憩開始時刻" value="{{ $record->break_in }}"/> </td>
                        <td><input type="time" name="record[break_out]" placeholder="休憩終了時刻" value="{{ $record->break_out }}"/> </td>
                        <td><input type="text" name="record[remarks]" placeholder="備考" value="{{ $record->remarks }}"/> </td>
                        <input type="submit" value="保存">
                    </tr>
                </table>
            </form>
            <a href="/records/{{$record->id}}">戻る</a>
        </div>
    </body>
    </x-app-layout>
</html>