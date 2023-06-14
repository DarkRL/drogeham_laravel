@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="" method="post" class="form-group" enctype="multipart/form-data">
            @if ($message = Session::get('fail'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @endif
            <h6>Nieuwe meyd pagina</h6>
            @csrf
            <div class="input-group mb-2">
                <span class="input-group-text" id="basic-headlinetxt">Titel</span>
                <input name="headline" type="text" class="form-control" placeholder="Titel..." aria-describedby="basic-headlinetxt">
            </div>
            <div class="input-group mb-2">
                <span class="input-group-text" id="basic-pagenametxt">Pagina naam</span>
                <input name="pagename" class="form-control" placeholder="Paginanaam..." aria-describedby="basic-pagenametxt" required></input>
            </div>
            <textarea name="fulltext" class="form-control" id="file-picker"></textarea>
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary">Annuleren</button></a>
            <button type="submit" value="Save" class="btn btn-primary">Toevoegen</button>
        </form>
    </div>
</div>

@endsection