<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
</head>

<body>
    <x-header />
    <div class="parallax_fixed"></div>
    <div class="container">
        <div class="row">
            <div class="col">

            </div>
            <div class="col-10">
                <div class="m-5">
                    <div class="custom_hidden">
                        @foreach ($posts as $post)
                        {!! html_entity_decode($post->fulltext) !!}
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
    <x-footer />
</body>

</html>