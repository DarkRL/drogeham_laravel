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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>