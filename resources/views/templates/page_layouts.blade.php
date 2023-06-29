<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
    @foreach($images as $image)
    @if($image->photo == 'empty')
    <style>
        .parallax_fixed {
            background-image: url('/img/luchtfoto.jpg');
        }
    </style>
    @else
    <style>
        .parallax_fixed {
            background-image: url("/storage/uploads/{{ basename($image->photo)}}");
        }
    </style>
    @endif
    @endforeach
</head>
@section('content')

<body>
    <div class="custom_hidden_stay_fast"><x-header /></div>
    <div class="parallax_fixed"></div>
    <div class="container main_container custom_hidden_stay_fast">
        @yield('content')
    </div>
    <x-footer />
</body>

</html>