@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="" method="post" class="form-group" enctype="multipart/form-data">
            <h6>Nieuw Bestand uploaden</h6>
            @csrf
            @method('PATCH')
            <input type="text" name="filename" class="form-control" placeholder="File naam" value="{{ $post->filename }}" required></input>
            <div class="my-2">
                <input class="form-control @error('file') is-invalid @enderror" type="file" id="formpath" name="filepath" value="{{ $post->filepath }}"/>
            </div>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">Publicatiedatum</div>
                </div>
                <input name="datetime" class="form-control" type="date" value="{{ date('Y-m-d', strtotime($post->datetime)) }}"></input>
            </div>         
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary">Annuleren</button></a>
            <button type="submit" value="Save" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</div>

@endsection