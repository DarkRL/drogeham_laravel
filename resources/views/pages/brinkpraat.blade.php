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
        @if(!$groupedFiles->isEmpty())
        <div class="border-bottom border-secondary"></div>
        <div class="m-5">
            @foreach($groupedFiles as $year => $files)
            <h4>Publicaties {{ $year }}</h4>
            <ul>
                @foreach($files as $file)
                <li><a target="_blank" href="{{ $file->filepath }}">{{ $file->filename }}-{{ \Carbon\Carbon::parse($file->datetime)->locale('nl')->isoFormat('MMMM') }}</a></li>
                @endforeach
            </ul>
            @endforeach
        </div>
        @else
        @endif
    </div>
</div>
@endsection