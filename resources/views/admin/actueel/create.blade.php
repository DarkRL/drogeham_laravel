@extends('admin.layouts')

@section('content')

<form action="" method="post" class="form-group">
    <h6>Nieuw Artikel</h6>
    @csrf
    <input name="headline" class="form-control" placeholder="Titel"></input>
    <textarea name="fulltext" class="form-control" id="file-picker"></textarea>
    <button type="submit" value="Save" class="btn btn-primary">Toevoegen</button>
</form>

@endsection