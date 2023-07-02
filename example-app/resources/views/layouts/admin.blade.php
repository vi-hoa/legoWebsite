<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        .alert{
            font-weight: bold;
            background: rgb(162, 230, 162);
            color: rgb(2, 53, 2);
            border-radius: 10px;
            font-size: 20px;
            margin: 0 auto ;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>
    @include('admin.partials.nav')
    <div class="admin-main">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @if (session('warning'))
            <div class="alert alert-warning">
                {{ session('warning') }}
            </div>
        @endif
        @yield('content')
    </div>
</body>

</html>
