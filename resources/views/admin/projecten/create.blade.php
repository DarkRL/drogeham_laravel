@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="" method="post" class="form-group" enctype="multipart/form-data">
            <h6>Nieuw Artikel</h6>
            @csrf
            <input name="headline" class="form-control mt-2 mb-2" placeholder="Titel" required></input>
            <textarea name="fulltext" class="form-control" id="file-picker"></textarea>
            <div class="my-3">
                <label for="formFile" class="form-label">Upload Thumbnail</label>
                <input class="form-control" type="file" id="formFile" name="photo" required/>
            </div>
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary">Annuleren</button></a>
            <button type="submit" value="Save" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</div>

@endsection