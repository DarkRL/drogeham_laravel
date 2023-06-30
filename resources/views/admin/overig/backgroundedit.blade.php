@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <h6>Aanpassen achtergronden van alle gebruikerspagina's behalve home</h6>
        <form action="" method="post" class="form-group" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="my-2">
                <input class="form-control" type="file" id="formFile" name="photo" />
                @if($post->photo == "empty")
                <a href="{{ URL::asset("./img/luchtfoto.jpg") }}" target="_blank">Huidige achtergrond</a>
                @else
                <a href="{{ $post->photo }}" target="_blank">Huidige achtergrond</a>
                @endif
            </div>
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary">Annuleren</button></a>
            <button type="submit" value="Update" class="btn btn-primary">Opslaan</button>
        </form>
    </div>
</div>
@endsection