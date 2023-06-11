<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <div class='record'>
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
                    <form action="/records" method="POST">
                    @csrf
                        <td><input type="date" name="record[date]" placeholder="日付" value="{{ old('record.date') }}"/> </td>
                        <td><input type="time" name="record[time_in]" placeholder="勤務開始時刻" value="{{ old('record.time_in') }}"/> </td>
                        <td><input type="time" name="record[time_out]" placeholder="勤務終了時刻" value="{{ old('record.time_out') }}"/> </td>
                        <td><input type="time" name="record[break_in]" placeholder="休憩開始時刻" value="{{ old('record.break_in') }}"/> </td>
                        <td><input type="time" name="record[break_out]" placeholder="休憩終了時刻" value="{{ old('record.break_out') }}"/> </td>
                        <td><input type="text" name="record[remarks]" placeholder="備考" value="{{ old('record.remarks') }}"/> </td>
                        <input type="submit" value="store"/>
                    </form>
                </tr>
                <tr>
                    <td><p class="date_error" style="color:red">{{ $errors->first('record.date') }}</p></td>
                    <td><p class="time_in_error" style="color:red">{{ $errors->first('record.time_in') }}</p></td>
                    <td><p class="time_out_error" style="color:red">{{ $errors->first('record.time_out') }}</p></td>
                    <td><p class="break_in_error" style="color:red">{{ $errors->first('record.break_in') }}</p></td>
                    <td><p class="break_out_error" style="color:red">{{ $errors->first('record.break_out') }}</p></td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>