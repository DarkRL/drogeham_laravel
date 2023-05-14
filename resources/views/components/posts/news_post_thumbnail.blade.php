<section class="col-4">
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ URL('/templates/'. $postid .'/newspost') }}" class="text-center" style="color: black; text-decoration: none">
                <img src="{{ $photo }}" class="img-thumbnail d-block mx-auto" alt="thumbnail">
                <h4>{!! html_entity_decode($headline) !!}</h4>
                <p>{!! html_entity_decode($datetime) !!}</p>
            </a>
        </div>
    </div>
</section>