@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="" method="post" class="form-group">
            <h6>Nieuw Artikel</h6>
            @csrf
            <input name="headline" class="form-control" placeholder="Titel"></input>
            <textarea name="fulltext" class="form-control" id="file-picker"></textarea>
            <button type="submit" value="Save" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</div>

@endsection