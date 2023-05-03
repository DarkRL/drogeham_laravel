<!DOCTYPE html>
<html lang="en">

<head>
    <x-imports />
    <link rel="stylesheet" href="{{URL::asset("./css/admin.css")}}" />
</head>
@section('content')

<body>
    <x-header_admin />
    <x-sidebar />
    <div class="container pt-5">
        <div class="row pt-5">
            <form action="" method="post" class="form-group">
                @csrf
                <textarea name="fulltext" class="form-control" id="file-picker"></textarea>
                <button type="submit" value="Save" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>

</body>

</html>