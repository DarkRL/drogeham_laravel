@extends('pages.layouts')

@section('content')
<div class="my-3">
    <form action="{{ route('actueel') }}" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Zoek...">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">Zoek</button>
            </div>
        </div>
    </form>
</div>

<div class="container">
    <div class="row">
        @php
        $startingArray = $posts;
        $sortedArrays = [[], [], []];

        $chunkSize = ceil(count($startingArray) / 3);

        for ($i = 0; $i < count($startingArray); $i++) { $sortedArrays[$i % 3][]=$startingArray[$i]; } @endphp @foreach ($sortedArrays as $chunks_arrays) <div class="col-lg-4 mb-4 mb-lg-0">
            @foreach ($chunks_arrays as $post)

            <div class="position-relative">
                <div class="d-flex align-items-end custom-badge">
                    <a class="mt-5 mb-3" href="{{ route('templates.newspost', ['id' => $post->id]) }}">
                        <img src="{{ $post->photo }}" class="img-fluid rounded" alt="thumbnail">

                        <div class="custom-text">
                            <div class="position-absolute bottom-0 start-50 translate-middle-x bg-light badge w-75 shadow-lg p-3" style="transform: translateZ(0);">
                                <div class="text-dark h6 text-top-left hideOverflow h-100">{!! html_entity_decode($post->headline) !!}</div>
                                <div class="text-dark mt-3 text-top-left hideOverflow h-100 text-smaller-badge">
                                    <span class="hover-underline-animation hover-underline-grey mb-1">Lees meer
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
    </div>
    @endforeach
</div>
</div>

<div class="d-flex justify-content-between align-items-center">
    <div>
        {{ $posts->withQueryString()->links() }}
    </div>
    <div>
        <p class="mb-0">Resultaten: {{ $posts->total() }}</p>
    </div>
</div>
@endsection