@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div>
            <div id="message"></div>
            <a href="{{ route('admin.projecten.create') }}"><button type="button" class="btn btn-primary">Add Article</button></a>
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
        </div>
    </div>
</div>

@endsection