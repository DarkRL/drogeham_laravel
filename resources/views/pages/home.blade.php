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
                                <div class="carousel-item bg-dark rounded @if ($key === 0) active @endif" style="min-height: 400px; ">
                                    <div class="container">

                                        <a class="row text-decoration-none" href="{{ route('templates.projectpost', ['id' => $carouselProject->id]) }}">
                                            <div class="col-8 d-flex justify-content-center">
                                                <img src="{{$carouselProject->photo}}" class="d-block w-auto mw-100 rounded my-4" height="400" alt="Slide {{ ($key + 1) }}">
                                            </div>
                                            <div class="col-4">
                                                <div class="text-white my-3">
                                                    <div class="p-2 h3">
                                                        {!! html_entity_decode($carouselProject->headline) !!}
                                                    </div>
                                                    <div class="p-2"></div>
                                                    <div class="strip-img-iframe mx-2 project-max-character">
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

                            <script>
                                $(document).ready(function() {
                                    $('.strip-img-iframe').each(function() {
                                        $(this).find('img, iframe').remove(); // Remove image and iframe tags
                                    });

                                    var maxLength = 400; // Set your desired maximum character length

                                    $('.project-max-character').each(function() {
                                        var badgeTextElement = $(this);
                                        var badgeText = badgeTextElement.text();

                                        if (badgeText.length > maxLength) {
                                            var truncatedText = badgeText.substring(0, maxLength) + '...';
                                            badgeTextElement.text(truncatedText);
                                        }
                                    });
                                });
                            </script>

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
                                            <a href="{{ route('templates.newspost', ['id' => $NewsPost->id]) }}" class="text-decoration-none text-center text-dark">
                                                <img height="200" src="{{$NewsPost->photo}}" class="d-block w-auto rounded m-auto" alt="Image 4">
                                                <div class="text-center">
                                                    {{$NewsPost->headline}}
                                                </div>
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
                                    <a href="{{ route('templates.newspost', ['id' => $NewsPost->id]) }}">
                                        <img height="200" src="{{$NewsPost->photo}}" class="d-block w-100" alt="Image 4">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5> {{$NewsPost->headline}}</h5>


                                        </div>
                                    </a>
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
                            <p class="text-mute text-center mb-4"><i>Namens de hele gemeenschap van Drogeham wil ik u van harte welkom heten in ons prachtige dorp. We zijn verheugd dat u ervoor heeft gekozen om hier te komen wonen en deel uit te maken van onze hechte gemeenschap.</i></p>
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
                                    <textarea class="form-control" name="message" id="message" rows="5" placeholder="Vertel hier wat over jezelf..."></textarea>
                                </div>
                                <div class="mb-3">
                                    <div class="h-captcha" data-sitekey="13d3c42a-ca96-4cc5-876a-9b403e08db0d" data-theme="licht" required></div>
                                </div>
                                <button type="submit" class="btn btn-primary custom_hidden_repeat">Verstuur</button>
                            </form>
                            <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
                            <div class="col"></div>
                            <script>
                                var form = document.getElementById('Contact');
                                form.addEventListener('submit', function(event) {
                                    var response = hcaptcha.getResponse();
                                    if (!response) {
                                        event.preventDefault(); // Voorkom dat het formulier wordt verzonden
                                        alert('Bevestig dat u een mens bent');
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-footer />
    </div>
</body>

</html>