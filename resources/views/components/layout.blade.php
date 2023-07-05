@props([
    'title' => "パワーワーズ | ??",
    'script' => '',
])
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://unpkg.com/ress/dist/ress.min.css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DotGothic16&family=Hachi+Maru+Pop&family=Klee+One:wght@600&family=Potta+One&family=Rampart+One&family=Reggae+One&family=RocknRoll+One&family=Stick&family=Zen+Antique&family=Zen+Kaku+Gothic+New:wght@700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="/custom/style.css">
    {{ $script }}
</head>
<body>
    <div class="lg:w-3/5 lg:mx-auto">
        {{ $slot }}
    </div>
</body>
</html>