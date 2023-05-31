@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="" method="post" class="form-group" enctype="multipart/form-data">
            <h6>Nieuw Evenement</h6>
            @csrf
            <!-- <p>{{ $start }}</p>
            <p>{{ $end }}</p> -->
            <input name="title" class="form-control" placeholder="Titel" required></input>
            <textarea name="fulltext" class="form-control" id="file-picker"></textarea>
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary">Annuleren</button></a>
            <button type="submit" value="Save" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</div>

@endsection