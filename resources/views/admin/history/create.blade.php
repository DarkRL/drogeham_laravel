@extends('admin.layouts')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <h6>Aanmaken</h6>
        <form action="" method="post" class="form-group">
            @csrf
            <textarea name="fulltext" class="form-control" id="file-picker"></textarea>
            <button type="submit" value="Save" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection