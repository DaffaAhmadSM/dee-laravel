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
    @if (session()->has('success'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-300" role="alert">
        <span class="sr-only">Info</span>
        <div>
            {{ session('success') }}
        </div>
    </div>
    @endif
    @if (session()->has('error'))
        <div class="flex items-center p-4 mb-4 text-sm text-white border border-red-300 rounded-lg bg-red-500" role="alert">
            <span class="sr-only">Info</span>
            <div>
                {{ session('error') }}
            </div>
        </div>
    @endif
    <div class="h-screen w-full flex">
        @include('components.admin-sidebar')
        @yield('content')
    </div>
</body>
</html>