<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
</head>
@section('content')

<body>
    <x-header />
    <div class="parallax_fixed"></div>
    <div class="container">
        @yield('content')
    </div>
    <x-footer />
</body>

</html>