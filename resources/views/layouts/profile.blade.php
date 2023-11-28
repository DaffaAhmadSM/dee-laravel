<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    @include('components.script')
</head>
<body class="overflow-hidden">
    @include('components.navbar')
    <div class="h-screen w-full flex">
        @include('components.user-sidebar')
        @yield('content')
    </div>
</body>
</html>