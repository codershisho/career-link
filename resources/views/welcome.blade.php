<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel Vite Vue</title>
    @vite(['resources/css/app.css', 'resources/js/app.ts'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP&display=swap" rel="stylesheet">

    <link href="https://use.fontawesome.com/releases/v6.5.1/css/all.css" rel="stylesheet">
</head>

<body>
    <div id="app"></div>
</body>

</html>