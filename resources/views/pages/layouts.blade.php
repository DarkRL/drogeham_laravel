<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
</head>
@section('content')

<body>
    <div class="custom_hidden_stay_fast"><x-header  meydData="{{ $meydRecords }}" /></div>
    <div class="parallax_fixed"></div>
    <div class="container custom_hidden_stay_fast">
        @yield('content')
    </div>
    <x-footer />
</body>

</html>