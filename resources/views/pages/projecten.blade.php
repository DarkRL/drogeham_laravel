@extends('pages.layouts')

@section('content')
<div class="my-3">
    <form action="{{ route('projecten') }}" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Zoek...">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">Zoek</button>
            </div>
        </div>
    </form>
</div>

<div class="row my-5">
    @foreach ($posts as $post)

    <x-posts.project_post_thumbnail postid="{{ $post->id }}" headline="{{ $post-> headline }}" datetime="{{ $post->updated_at }}" photo="{{ $post->photo }}" />

    @endforeach
</div>

<div class="d-flex justify-content-between align-items-center">
    <div>
        {{ $posts->withQueryString()->links() }}
    </div>
    <div>
        <p class="mb-0">Resultaten: {{ $posts->total() }}</p>
    </div>
</div>
@endsection