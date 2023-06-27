@extends('pages.layouts')

@section('content')
<div class="my-3">
    <form action="{{ route('projecten') }}" method="GET">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Zoek...">
            <div class="input-group-append">
                <button class="btn btn-secondary" type="submit">Zoek</button>
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
            <div class="card mb-4 custom_hidden_stay_up">
                <div class="card-body">
                    <a class="hoverProjectArticle" href="{{ route('templates.projectpost', ['id' => $post->id]) }}" style="color: black; text-decoration: none">
                        <img src="{{ $post->photo }}" class="img-fluid rounded" alt="thumbnail">
                        <div class="m-3">
                            <h5 class="prevent-text-overflow headline-max-character">{!! html_entity_decode($post->headline) !!}</h5>
                            <p class="mt-3 text-muted">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z" />
                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z" />
                                </svg>
                                {{ \Carbon\Carbon::parse($post->updated_at)->locale('nl')->isoFormat('D MMMM, YYYY') }} - Project
                            </p>
                            <div class="hover-arrow-container">
                                <span class="hover-underline-animation hover-underline-grey hovertextarrow">Lees meer</span>
                                <span class="hoverarrowicon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
                                    </svg>
                                </span>
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
        var maxLength = 70; // Set your desired maximum character length

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