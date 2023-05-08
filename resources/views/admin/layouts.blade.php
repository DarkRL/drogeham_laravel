<!DOCTYPE html>
<html lang="en">

<head>
    <x-imports />
    <link rel="stylesheet" href="{{URL::asset("./css/admin.css")}}" />
</head>
@section('content')

<body>
    <div class="d-flex">
        <x-sidebar />
        <div class="vw-100">
            @yield('content')
        </div>
    </div>

</body>

</html>