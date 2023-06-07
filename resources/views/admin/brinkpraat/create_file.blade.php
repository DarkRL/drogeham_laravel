@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="" method="post" class="form-group" enctype="multipart/form-data">
            <h6>Nieuw Bestand</h6>
            @csrf
            <input type="text" name="filename" class="form-control" placeholder="File naam" required></input>
            <div class="my-2">
                <label for="formFile" class="form-label">Upload bestand</label>
                <input class="form-control" type="file" id="formFile" name="photo"/>
            </div>
            <input name="date" class="form-control" placeholder="File naam" required></input>
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary">Annuleren</button></a>
            <button type="submit" value="Save" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</div>

@endsection