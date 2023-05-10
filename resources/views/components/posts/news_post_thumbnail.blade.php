<section class="col-4">
    <div class="card">
        <div class="card-body">
            <a href="{{ URL('/templates/'. $postid .'/newspost') }}">
                <h4>{!! html_entity_decode($headline) !!}</h4>
                <img src="{{URL::asset("./img/luchtfoto.jpg")}}" height="100px">
            </a>
        </div>
    </div>
</section>