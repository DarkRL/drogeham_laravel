<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
</head>

<body>
    <div class="wrapper custom_hidden_stay_fast">
        <x-header meydData="{{ $meydRecords }}" />
        <div style="align-items:center;" class="header_parallax_section d-flex flex-column justify-content-around h-100">
            <img src="{{URL::asset('/img/luchtfoto.jpg')}}" class="parallax_background">
            <div></div>
            <div class="container">
                <div class="text-center text-white text-capitalize">
                    <h1 class="roboto custom_hidden_stay">Plaatselijk belang drogeham</h1>
                    <a href="{{route('contact')}}" class="custom_lid_button_home text-decoration-none custom_hidden_stay">Word lid</a>
                </div>
            </div>
            <div style="align-items:center" class="text-center text-capitalize d-flex flex-column custom_hidden_stay">
                <a class="clicktohome" href="#home" style="text-decoration:none;"><span class="text-white pb-3">Onze projecten</span></a>
                <a class="clicktohome" href="#home"><img class="arrows" src="{{URL::asset("./img/arrow-down.svg")}}" alt="Arrow-down" height="35" width="35" /></a>
            </div>
        </div>
        <div id="home" style="position:absolute"></div> <!-- Scrolling to this element -->
        <div class="bg-light mt-5">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="m-5">
                        <div id="CarouselProjecten" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @for ($i = 0; $i < count($carouselProjecten); $i++) <button type="button" data-bs-target="#CarouselProjecten" data-bs-slide-to="{{$i}}" @if ($i===0) class="active" aria-current="true" @endif aria-label="Slide {{ ($i + 1) }}"></button>
                                    @endfor
                            </div>
                            <div class="carousel-inner">
                                @forelse ($carouselProjecten as $key => $carouselProject)
                                <div class="carousel-item bg-dark @if ($key === 0) active @endif" style="min-height: 400px; ">
                                    <div class="container">

                                        <a class="row text-decoration-none" href="{{ route('templates.projectpost', ['id' => $carouselProject->id]) }}">
                                            <div class="col-8">
                                                <img src="{{$carouselProject->photo}}" class="d-block w-100" height="400" alt="Slide {{ ($key + 1) }}">
                                            </div>
                                            <div class="col-4">
                                                <div class="text-white">
                                                    <div class="p-2 mw-50">
                                                        {!! html_entity_decode($carouselProject->headline) !!}
                                                        <div class="p-2"></div>
                                                        {!! html_entity_decode($carouselProject->fulltext) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#CarouselProjecten" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#CarouselProjecten" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>


                        <div class="pt-5 pb-3 custom_hidden_repeat">

                            @foreach ($posts as $post)
                            {!! html_entity_decode($post->fulltext) !!}

                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-10 mt-5">
                    <div class="mb-5">
                        <div id="CarouselArtikelen" class="carousel slide custom_hidden_stay_up" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @if (count($carouselNewsPosts) > 0)
                                @if (gettype($carouselNewsPosts[0]) === "array")
                                @forelse ($carouselNewsPosts as $key => $carouselNewsPost)
                                <div class="carousel-item @if ($key === 0) active @endif">
                                    <div class="row ">
                                        @forelse ($carouselNewsPost as $NewsPost)
                                        <div class="col">
                                            <div class="text-center bg-dark text-light">
                                                {{$NewsPost->headline}}
                                            </div>
                                            <a href="{{ route('templates.newspost', ['id' => $NewsPost->id]) }}">
                                                <img height="200" src="{{$NewsPost->photo}}" class="d-block w-100" alt="Image 4">
                                            </a>
                                        </div>
                                        @empty
                                        @endforelse
                                    </div>
                                </div>
                                @empty
                                @endforelse
                                @elseif (gettype($carouselNewsPosts[0]) === "object")
                                @forelse ($carouselNewsPosts as $key => $NewsPost)
                                <div class="carousel-item @if ($key === 0) active @endif">
                                    <div class="row">
                                        <div class="col ">
                                            <div class="text-center bg-dark text-light">
                                                {{$NewsPost->headline}}
                                            </div>
                                            <a href="{{ route('templates.newspost', ['id' => $NewsPost->id]) }}">
                                                <img height="200" src="{{$NewsPost->photo}}" class="d-block w-100" alt="Image 4">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                                @else
                                @endif
                                @endif
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#CarouselArtikelen" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#CarouselArtikelen" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="container bg-light-custom pt-5 pb-5">
                    <div class="row">
                        <div class="col-md-8 mx-auto">
                            <h2 class="text-center custom_hidden_repeat">Nieuw in Drogeham?</h2>
                            <p class="text-mute text-center mb-4"><i>Namens de hele gemeenschap van Drogeham wil ik je van harte welkom heten in ons prachtige dorp. We zijn verheugd dat je ervoor hebt gekozen om hier te komen wonen en deel uit te maken van onze hechte gemeenschap.</i></p>
                            <form action="/contact/post" method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Naam*</label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Vul je naam hier in..." required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" name="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tel" class="form-label">Telefoonnummer</label>
                                    <input type="text" name="Tel" class="form-control phonenumber" id="tel" min="6" max="15">
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Bericht</label>
                                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="Vertel hier wat over jezelf..." required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary custom_hidden_repeat">Verstuur</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</body>

</html>