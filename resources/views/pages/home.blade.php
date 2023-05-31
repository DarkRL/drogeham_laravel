<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
</head>

<body>
    <div class="wrapper custom_hidden_stay_fast">
        <x-header meydData="{{ $meydRecords }}"/>
        <div style="align-items:center;" class="header_parallax_section d-flex flex-column justify-content-around h-100">
            <img src="{{URL::asset('/img/luchtfoto.jpg')}}" class="parallax_background">
            <div></div>
            <div class="container">
                <div class="text-center text-white text-capitalize">
                    <h1 class="roboto custom_hidden_stay">Plaatselijk belang drogeham</h1>
                    <a href="{{route('page', ['page' => 'contact'])}}" class="custom_lid_button_home text-decoration-none custom_hidden_stay">Word lid</a>
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
                                <button type="button" data-bs-target="#CarouselProjecten" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#CarouselProjecten" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#CarouselProjecten" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>

                            <div class="carousel-inner">
                                <div class="carousel-item bg-dark active">
                                    <div class="d-flex">
                                        <div class="col-8">
                                            <img src="https://via.placeholder.com/800x400?text=Slide+1" class="d-block w-100" alt="Slide 3">
                                        </div>
                                        <div class="col-4 d-flex align-items-center text-white">
                                            <div class="w-100 p-4 ">
                                                <p>Hier komt een project te staan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item bg-dark">
                                    <div class="d-flex">
                                        <div class="col-8">
                                            <img src="https://via.placeholder.com/800x400?text=Slide+2" class="d-block w-100" alt="Slide 3">
                                        </div>
                                        <div class="col-4 d-flex align-items-center text-white">
                                            <div class="w-100 p-4 ">
                                                <p>Hier komt een project te staan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item bg-dark">
                                    <div class="d-flex">
                                        <div class="col-8">
                                            <img src="https://via.placeholder.com/800x400?text=Slide+3" class="d-block w-100" alt="Slide 3">
                                        </div>
                                        <div class="col-4 d-flex align-items-center text-white">
                                            <div class="w-100 p-4 ">
                                                <p>Hier komt een project te staan.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col">
                                            <img src="https://via.placeholder.com/300x200?text=Image+1" class="d-block w-100" alt="Image 1">
                                        </div>
                                        <div class="col">
                                            <img src="https://via.placeholder.com/300x200?text=Image+2" class="d-block w-100" alt="Image 2">
                                        </div>
                                        <div class="col">
                                            <img src="https://via.placeholder.com/300x200?text=Image+3" class="d-block w-100" alt="Image 3">
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col">
                                            <img src="https://via.placeholder.com/300x200?text=Image+4" class="d-block w-100" alt="Image 4">
                                        </div>
                                        <div class="col">
                                            <img src="https://via.placeholder.com/300x200?text=Image+5" class="d-block w-100" alt="Image 5">
                                        </div>
                                        <div class="col">
                                            <img src="https://via.placeholder.com/300x200?text=Image+6" class="d-block w-100" alt="Image 6">
                                        </div>
                                    </div>
                                </div>
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
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Naam</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Bericht</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
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