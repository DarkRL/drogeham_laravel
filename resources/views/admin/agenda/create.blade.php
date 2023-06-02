@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="" method="post" class="form-group" enctype="multipart/form-data">
            <h4>Nieuw Evenement</h4>
            @csrf
            
            <input name="title" class="form-control mb-2" placeholder="Titel" required></input>

            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Startdatum</div>
                </div>
                <input name="startdate" class="form-control" type="date" value="{{ $start }}"></input>
            </div>

            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Einddatum</div>
                </div>
                <input name="enddate" class="form-control" type="date" value="{{ $end }}"></input>
            </div>

            <textarea name="fulltext" class="form-control" id="file-picker"></textarea>
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary mt-2">Annuleren</button></a>
            <button type="submit" value="Save" class="btn btn-primary mt-2">Toevoegen</button>
        </form>
    </div>
</div>

@endsection