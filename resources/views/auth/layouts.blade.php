<!DOCTYPE html>
<html lang="en">

<head>
    <x-imports />
    <link rel="stylesheet" href="{{URL::asset("./css/admin.css")}}" />
</head>

<body>
    @if ($message = Session::get('success')){
        <x-sidebar />
        <x-header_admin />
    }
    @else{
        <x-header_admin />
    }
    @endif

    <div class="container pt-5">
        <div class="row pt-5">
            @yield('content')
        </div>
    </div>

</body>

</html>