<section class="col-4">
    <div class="card mb-4">
        <div class="card-body">
            <a href="{{ URL('/templates/'. $postid .'/newspost') }}">
                <img src="{{URL::asset("./img/luchtfoto.jpg")}}" class="img-thumbnail" alt="thumbnail">
                <h4>{!! html_entity_decode($headline) !!}</h4>
                <h6>{!! html_entity_decode($datetime) !!}</h6>
            </a>
        </div>
    </div>
</section>