<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
</head>

<body>
    <x-header />
    <div class="parallax_fixed"></div>
    <div class="container">
        <div class="row my-5" data-masonry='{"percentPosition": true }'>
            @foreach ($posts as $post)

            <x-posts.news_post_thumbnail postid="{{ $post->id }}" headline="{{ $post-> headline }}" datetime="{{ $post->datetime }}" photo="{{ $post->photo }}"/>

            @endforeach
        </div>
    </div>
    <x-footer />
</body>

</html>