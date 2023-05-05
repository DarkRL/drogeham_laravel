<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
</head>

<body>
    <div class="wrapper">
        <x-header />
        <div style="align-items:center;" class="header_parallax_section d-flex flex-column justify-content-around h-100">
            <img src="https://www.drogeham.com/assets/img/luchtfoto.jpg" class="parallax_background">
            <div></div>
            <div class="container">
                <div class="text-center text-white text-capitalize">
                    <h1>Plaatselijk belang drogeham</h1>
                    <!-- <button type="button" class="btn btn-primary rounded-pill">Word Lid</button> -->
                    <button type="button" class="button_custom_lid">Word Lid</button>

                </div>
            </div>
            <div style="align-items:center" class="text-center text-capitalize d-flex flex-column">
                <a class="clicktohome" href="#home" style="text-decoration:none;"><span class="text-white pb-3">Onze projecten</span></a>
                <a class="clicktohome" href="#home"><img class="arrows" src="{{URL::asset("./img/arrow-down.svg")}}" alt="Arrow-down" height="35" width="35" /></a>
            </div>
        </div>
        <div id="home" style="position:absolute"></div> <!-- Scrolling to this element -->
        <div class="bg-light mt-5">
            <div class="row">

                <div class="col">

                </div>
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
                                                <p>This div has a width of 25% and is positioned to the left of the image</p>
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
                                                <p>This div has a width of 25% and is positioned to the left of the image</p>
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
                                                <p>This div has a width of 25% and is positioned to the left of the image</p>
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
                        <div class="pt-5 pb-5 custom_hidden">
                            <h2>Drogeham</h2>
                            <p>Het dorp Drogeham dat lokaal ook wel 'De Ham' wordt genoemd, heeft ongeveer 1800 inwoners.
                                Het ligt onder het Prinses Margrietkanaal in het westelijke deel van de gemeente Achtkarspelen in het noordoosten van Friesland. Onder Drogeham vallen ook de buurtschappen: Buweklooster, Hamshorn, Hamsterpein en Westerend. Het dorp is bekend om zijn vele grote
                                evenementen die er jaarlijks worden georganiseerd zoals de gondelvaart op wielen, concours hippique en de ronde van de kerspelen.
                            </p>
                            <p>
                                Drogeham heeft een goed voorzieningenniveau met onder andere een supermarkt, drogisterij, verfwinkel, cafetaria, bakkerij, pompstation, camping en een agrarische winkel met diervoeding, ijzerwaren en huishoudelijke artikelen. Daarnaast zijn er nog vele andere bedrijven gevestigd in Drogeham.
                            </p>
                            <p>
                                In en rond het dorp zijn vier rijksmonumenten te bewonderen zoals een Kop-hals-rompboerderij, Klokkenstoel, Buweklooster, Walburgakerk en een Arbeiderswoning. Voor de sport- en natuurliefhebbers biedt de directe omgeving prachtige fiets- en wandelroutes, het Hossebos en het strand genaamd 'Schuilenburg'.
                            </p>
                        </div>
                        <div id="CarouselArtikelen" class="carousel slide custom_hidden" data-bs-ride="carousel">
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
                <div class="col">

                </div>
            </div>
        </div>
        <x-footer />
    </div>
</body>

</html>