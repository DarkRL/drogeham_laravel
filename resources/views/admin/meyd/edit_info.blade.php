@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="" method="post" class="form-group">
            <h6>Meyd informatiepagina Aanpassen</h6>
            @csrf
            @method('PATCH')
            <textarea name="fulltext" class="form-control" id="file-picker">{{ $post->fulltext }}</textarea>
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary">Annuleren</button></a>
            <button type="submit" value="Update" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection