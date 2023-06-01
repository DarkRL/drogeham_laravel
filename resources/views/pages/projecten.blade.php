@extends('pages.layouts')

@section('content')
<div class="row my-5">
    @foreach ($posts as $post)

    <x-posts.project_post_thumbnail postid="{{ $post->id }}" headline="{{ $post-> headline }}" datetime="{{ $post->updated_at }}" photo="{{ $post->photo }}" />

    @endforeach
</div>
@endsection