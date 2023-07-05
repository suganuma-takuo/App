<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <p class='body'>
            従業員を呼び出しています。少々お待ちください。
        </p>
        <form action="\customers" method="GET">
            <button>戻る</button>
        </form>
    </body>
</html>