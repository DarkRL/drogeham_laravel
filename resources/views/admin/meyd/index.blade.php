@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Preview:</h5>
            </div>
            <div class="card-body">
                @forelse ($posts_info as $posts_inf)

                <x-admin.meydinfo_post postid="{{ $posts_inf->id }}" fulltext="{{ $posts_inf->fulltext }}" datetime="{{ $posts_inf->updated_at }}" />

                @empty

                Leeg

                @endforelse
            </div>
        </div>
        <div>
            <div class="mt-3">
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
            <a href="{{ route('admin.meyd.create') }}"><button type="button" class="btn btn-primary">Voeg pagina toe</button></a>
            <div class="table-responsive">
                <table class="table table-striped table-responsive w-100">
                    <tr>
                        <th>Titel</th>
                        <th class="small" style="width:15%">Pagina Naam</th>
                        <th class="small" style="width:7%">Aanpassen</th>
                        <th class="small" style="width:7%">Preview</th>
                        <th class="small" style="width:7%">Verwijderen</th>
                        <th class="small" style="width:10%">Actief zetten</th>
                    </tr>
                    @foreach ($posts as $post)

                    <x-admin.meyd_post postid="{{ $post->id }}" fulltext="{{ $post->fulltext }}" headline="{{ $post-> headline }}" pagename="{{ $post->pagename }}" publishid="{{ $post->public }}" updated_at="{{ $post->updated_at }}" />

                    @endforeach
                </table>
            </div>
        </div>
    </div>

    @endsection