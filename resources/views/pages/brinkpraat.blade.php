@extends('pages.layouts')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="m-5">
            <div class="custom_hidden_repeat text-display-area">
                @foreach ($posts as $post)
                {!! html_entity_decode($post->fulltext) !!}
                @endforeach
            </div>
        </div>
        <div class="border-bottom border-secondary"></div>
        <div class="m-5">
            @foreach($groupedFiles as $year => $files)
            <h4>Publicaties {{ $year }}</h4>
            <ul>
                @foreach($files as $file)
                <li><a target="_blank" href="{{ $file->filepath }}">{{ $file->filename }}</a></li>
                @endforeach
            </ul>
            @endforeach
        </div>
    </div>
</div>
@endsection