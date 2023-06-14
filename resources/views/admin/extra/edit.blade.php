@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="" method="post" class="form-group">
            @if ($message = Session::get('fail'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @endif
            <h6>Pagina Aanpassen</h6>
            @csrf
            @method('PATCH')
            <div class="input-group mb-2">
                <span class="input-group-text" id="basic-headlinetxt">Titel</span>
                <input name="headline" type="text" class="form-control" placeholder="Titel" value="{{ $post->headline }}" aria-describedby="basic-headlinetxt">
            </div>
            <div class="input-group mb-2">
                <span class="input-group-text" id="basic-pagenametxt">Pagina naam</span>
                <input name="pagename" class="form-control" placeholder="Pagina naam" value="{{ $post->pagename }}" aria-describedby="basic-pagenametxt" required></input>
            </div>
            <textarea name="fulltext" class="form-control" id="file-picker" required>{{ $post->fulltext }}</textarea>
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary">Annuleren</button></a>
            <button type="submit" value="Update" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection