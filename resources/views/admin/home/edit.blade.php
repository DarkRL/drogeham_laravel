@extends('admin.layouts')

@section('content')

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
@endsection