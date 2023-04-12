<!DOCTYPE html>
<html lang="en">

<head>
    <x-imports />
    <link rel="stylesheet" href="{{URL::asset("./css/admin.css")}}" />
</head>

<body>
    <x-header_admin />


    <div class="container pt-5">
        <div class="row pt-5">
            @yield('content')
        </div>
    </div>

</body>

</html>