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
        @if(!$posts_files->isEmpty())
        <div class="border-bottom border-secondary"></div>
        <div class="m-5">
            <h6>Hieronder zijn de presentaties te vinden van de jaarvergaderingen van Plaatselijk Belang Drogeham.</h6>
            <ul>
                @foreach($posts_files as $file)
                <li><a target="_blank" href="{{ $file->filepath }}">{{ $file->filename }}-{{ date('Y', strtotime($file->datetime)) }}</a></li>
                @endforeach
            </ul>
        </div>
        @else
        @endif
    </div>
</div>
@endsection