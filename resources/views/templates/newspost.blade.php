@extends('templates.page_layouts')

@section('content')

<div>
    {!! html_entity_decode($post->fulltext) !!}
</div>

@endsection