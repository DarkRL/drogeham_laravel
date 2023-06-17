@extends('templates.page_layouts')

@section('content')

<div class="row">
    <div class="col-1"></div>
    <div class="col-10 my-5">
        <a href="{{ route('actueel') }}" class="btn btn-sm btn-secondary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
            </svg> 
            Terug
        </a>
        <div class="mb-4 mt-2">
            <h2><b>{!! html_entity_decode($post->headline) !!}</b></h2>
        </div>
        <div>
            {!! html_entity_decode($post->fulltext) !!}
        </div>
    </div>
    <div class="col-1"></div>
</div>

@endsection