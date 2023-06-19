@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
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
            <a href="{{ route('admin.extra.create') }}"><button type="button" class="btn btn-success">Voeg een nieuwe pagina toe</button></a>
            <div class="my-3">
                <form action="{{ route('admin.extra.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Zoek...">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit">Zoek</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-responsive w-100">
                    <tr>
                        <th>Titel</th>
                        <th class="small" style="width:35%">Pagina url</th>
                        <th class="small" style="width:7%">Aanpassen</th>
                        <th class="small" style="width:7%">Preview</th>
                        <th class="small" style="width:7%">Verwijderen</th>
                    </tr>
                    @foreach ($posts as $post)

                    <x-admin.extra_post postid="{{ $post->id }}" fulltext="{{ $post->fulltext }}" headline="{{ $post-> headline }}" pagename="{{ url('custom/'.$post->pagename) }}" updated_at="{{ $post->updated_at }}" />

                    @endforeach
                </table>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    {{ $posts->withQueryString()->links() }}
                </div>
                <div>
                    <p class="mb-0">Resultaten: {{ $posts->total() }}</p>
                </div>
            </div>
        </div>
    </div>

    @endsection