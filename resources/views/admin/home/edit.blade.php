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
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <h6>Aanpassen</h6>
                    <form action="" method="post" class="form-group">
                        @csrf
                        @method('PATCH')
                        <textarea name="fulltext" class="form-control" id="file-picker">{{ $post->fulltext }}</textarea>
                        <button type="submit" value="Update" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>