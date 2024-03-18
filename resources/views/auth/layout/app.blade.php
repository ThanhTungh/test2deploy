<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="{{ URL::asset('css/login.css') }}" />
    <script src="{{ 'js/login.js' }}" defer></script>
    <title>
        @yield('title')
    </title>
</head>

<body>
    
    @yield('main_content')

</body>

</html>