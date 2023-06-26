@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div>
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
            <h5>Homepagina
                <a href="{{ route('admin.projecten.create') }}"><button type="button" class="btn btn-success">Voeg een nieuw project toe</button></a>
            </h5>
            <div class="my-3">
                <form action="{{ route('admin.projecten.index') }}" method="GET">
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
                        <th class="small" style="width:15%">Datum</th>
                        <th class="small" style="width:7%">Aanpassen</th>
                        <th class="small" style="width:7%">Preview</th>
                        <th class="small" style="width:7%">Verwijderen</th>
                        <th class="small" style="width:10%">Actief zetten</th>
                    </tr>
                    @foreach ($posts as $post)

                    <x-admin.project_post postid="{{ $post->id }}" headline="{{ $post-> headline }}" fulltext="{{ $post->fulltext }}" datetime="{{ $post->updated_at }}" photo="{{ $post-> photo }}" publishid="{{ $post->public}}" />

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
</div>

@endsection