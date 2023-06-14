@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <h5>Brinkpraat
            @php
            use App\Models\admin\BrinkpraatPosts;
            @endphp
            @if (!BrinkpraatPosts::where('id', 1)->exists())
            <a href="{{ route('admin.home.create') }}">
                <button type="button" class="btn btn-success btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                </button>
            </a>
            @endif
        </h5>

        <div id="message">
            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
            @elseif ($message = Session::get('fail'))
            <div class="alert alert-danger">
                {{ $message }}
            </div>
            @endif
        </div>
    </div>
</div>
<div class="row justify-content-center mt-1">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Preview:</h5>
            </div>
            <div class="card-body">
                @forelse ($posts as $post)

                <x-admin.brinkpraat_post postid="{{ $post->id }}" fulltext="{{ $post->fulltext }}" datetime="{{ $post->updated_at }}" />

                @empty

                none

                @endforelse
            </div>
        </div>
        <a href="{{ route('admin.brinkpraat.create.files') }}"><button type="button" class="btn btn-primary m-2">Voeg een nieuw bestand toe</button></a>
        <div class="my-3">
                <form action="{{ route('admin.brinkpraat.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Zoek...">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit">Zoek</button>
                        </div>
                    </div>
                </form>
            </div>
        <div class="table-responsive mt-2">
            <table class="table table-striped table-responsive w-100">
                <tr>
                    <th>Bestand</th>
                    <th class="small text-center" style="width:15%">Publicatiedatum</th>
                    <th class="small text-center" style="width:7%">Aanpassen</th>
                    <th class="small text-center" style="width:7%">Verwijderen</th>
                    <th class="small text-center" style="width:10%">Actief zetten</th>
                </tr>
                @forelse ($posts_files as $posts_file)

                <x-admin.brinkpraatfile_post filepath="{{$posts_file->filepath}}" filename="{{ $posts_file->filename }}" datetime="{{ date('d-m-Y', strtotime($posts_file->datetime)) }}" postid="{{ $posts_file->id }}" public="{{ $posts_file->public }}" />

                @empty

                <tr>
                    <td colspan="5">Geen bestanden geüpload</td>
                </tr>

                @endforelse
            </table>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    {{ $posts_files->withQueryString()->links() }}
                </div>
                <div>
                    <p class="mb-0">Resultaten: {{ $posts_files->total() }}</p>
                </div>
            </div>
        </div>
    </div>

    @endsection