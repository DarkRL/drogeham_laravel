@extends('pages.layouts')

@section('content')
<div class="my-3">
    <form action="{{ route('actueel') }}" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Zoek...">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">Zoek</button>
                <a href="{{ route('actueel') }}" class="btn btn-secondary" type="submit">Alle artikelen</a>
            </div>
        </div>
    </form>
</div>

<div class="container">
    <div class="row my-5">
        @php
        $startingArray = $posts;
        $sortedArrays = [[], [], []];

        $chunkSize = ceil(count($startingArray) / 3);

        for ($i = 0; $i < count($startingArray); $i++) { $sortedArrays[$i % 3][]=$startingArray[$i]; } @endphp @foreach ($sortedArrays as $chunks_arrays) <div class="col-lg-4 mb-4 mb-lg-0">
            @foreach ($chunks_arrays as $post)

            <div class="position-relative custom_hidden_stay_up">
                <div class="d-flex align-items-end custom-badge">
                    <a class="mt-5 mb-3 w-100" title="{!! html_entity_decode($post->headline) !!}" href="{{ route('templates.newspost', ['id' => $post->id]) }}">
                        <div class="justify-content-center text-center align-center">
                            <img src="{{ $post->photo }}" style="min-width: 22rem" class="img-fluid rounded w-100" alt="thumbnail">
                        </div>
                        <div class="custom-text">
                            <div class="position-absolute bottom-0 start-50 translate-middle-x bg-light badge w-75 shadow-lg p-3" style="transform: translateZ(0);">
                                <div style="word-break: break-all;" class="text-dark h6 text-top-left text-wrap h-100 headline-max-character">{!! html_entity_decode($post->headline) !!}</div>
                                <div class="text-muted mt-3 text-top-left hideOverflow h-100 text-smaller-badge">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                        </svg>
                                        {{ \Carbon\Carbon::parse($post->updated_at)->locale('nl')->isoFormat('D MMMM, YYYY') }}
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
<script>
    $(document).ready(function() {
        var maxLength = 62; // Set your desired maximum character length

        $('.headline-max-character').each(function() {
            var badgeTextElement = $(this);
            var badgeText = badgeTextElement.text();

            if (badgeText.length > maxLength) {
                var truncatedText = badgeText.substring(0, maxLength) + '...';
                badgeTextElement.text(truncatedText);
            }
        });
    });
</script>

<div class="d-flex justify-content-between align-items-center">
    <div>
        {{ $posts->withQueryString()->links() }}
    </div>
    <div>
        <p class="mb-0">Resultaten: {{ $posts->total() }}</p>
    </div>
</div>
@endsection