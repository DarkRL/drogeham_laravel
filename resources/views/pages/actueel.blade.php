@extends('pages.layouts')

@section('content')
<div class="row my-5">
    @foreach ($posts as $post)

    <x-posts.news_post_thumbnail postid="{{ $post->id }}" headline="{{ $post-> headline }}" datetime="{{ $post->datetime }}" photo="{{ $post->photo }}" />

    @endforeach
</div>
@endsection