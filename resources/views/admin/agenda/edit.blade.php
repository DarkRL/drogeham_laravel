@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="{{ route('admin.agenda.update', ['id' => $post->id]) }}" method="POST" class="form-group" enctype="multipart/form-data">
            <h4>Evenement Aanpassen</h4>
            @csrf
            @method('PATCH')
            
            <input name="title" class="form-control mb-2" placeholder="Titel" value="{{ $post->title }}" required></input>

            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Startdatum</div>
                </div>
                <input name="startdate" class="form-control" type="date" value="{{ $post->start }}"></input>
            </div>

            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Einddatum</div>
                </div>
                <input name="enddate" class="form-control" type="date" value="{{ $end }}"></input>
            </div>

            <textarea name="fulltext" class="form-control" id="file-picker">{{ $post->fulltext }}</textarea>
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary mt-2">Annuleren</button></a>
            <button type="submit" value="Update" class="btn btn-primary mt-2">Aanpassen</button>
        </form>
    </div>
</div>

@endsection