@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div>
            <div id="message"></div>
            <a href="{{ route('admin.actueel.create') }}"><button type="button" class="btn btn-primary">Add Article</button></a>
            <div class="row">
                @foreach ($posts as $post)

                <x-admin.news_post_card postid="{{ $post->id }}" headline="{{ $post-> headline }}" datetime="{{ $post->datetime }}" photo="{{ $post-> photo }}" publishid="{{ $post->public}}" />

                @endforeach
            </div>
        </div>
    </div>

    @endsection