@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <h6>Aanpassen homepagina</h6>
        <form action="" method="post" class="form-group" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <textarea height="500px" name="fulltext" class="form-control" id="file-picker">{{ $post->fulltext }}</textarea>
            <div class="my-2">
                <label for="formFile" class="form-label">Verander homepagina achtergrond</label>
                <input class="form-control" type="file" id="formFile" name="photo"/>
            </div>
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary">Annuleren</button></a>
            <button type="submit" value="Update" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</div>
@endsection