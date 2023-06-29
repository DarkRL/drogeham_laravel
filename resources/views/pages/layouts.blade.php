<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
    <style>
        .parallax_fixed{
            background-image: "{{ url('/img/luchtfoto.jpg')}}";
        }
    </style>
</head>
@section('content')

<body>
    <div class="custom_hidden_stay_fast"><x-header  meydData="{{ $meydRecords }}" /></div>
    <div class="parallax_fixed"></div>
    <div class="container main_container custom_hidden_stay_fast">
        @yield('content')
    </div>
    <x-footer />
</body>

</html>