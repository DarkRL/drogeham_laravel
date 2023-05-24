@extends('templates.page_layouts')

@section('content')

<div class="row">
    <div class="col-1"></div>
    <div class="col-10 my-5">
        <div class="mb-4">
            <h2><b>{!! html_entity_decode($post->headline) !!}</b></h2>
        </div>
        <div>
            {!! html_entity_decode($post->fulltext) !!}
        </div>
    </div>
    <div class="col-1"></div>
</div>

@endsection