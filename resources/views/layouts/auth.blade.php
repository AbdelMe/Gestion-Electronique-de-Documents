<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel 11 Custom User Login Page - itsolutionstuff.com</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" --}}
    <style type="text/css">
        body {
            background: #F8F9FA;
        }
    </style>
    @include('layouts.head')
</head>

<body class="overflow-hidden">

    @yield('content')

    <div class="text-center mt-4">
        @yield('auth-footer')
    </div>

</body>

</html>