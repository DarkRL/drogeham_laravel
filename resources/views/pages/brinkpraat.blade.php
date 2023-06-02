@extends('pages.layouts')

@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col-10">
        <div class="m-5">
            <div class="custom_hidden_repeat">
                @foreach ($posts as $post)
                {!! html_entity_decode($post->fulltext) !!}
                @endforeach
            </div>
        </div>
    </div>
    <div class="col"></div>
</div>
@endsection