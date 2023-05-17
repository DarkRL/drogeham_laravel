@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <form action="" method="post" class="form-group">
            <h6>Artikel Aanpassen</h6>
            @csrf
            @method('PATCH')
            <input name="headline" class="form-control" placeholder="Titel" value="{{ $post->headline }}" required></input>
            <textarea name="fulltext" class="form-control" id="file-picker" required>{{ $post->fulltext }}</textarea>
            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-secondary">Annuleren</button></a>
            <button type="submit" value="Update" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

@endsection