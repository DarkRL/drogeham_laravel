<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
</head>

<body>
    <div class="wrapper">
        <x-header />
        <div style="align-items:center" class="header_parallax_section d-flex flex-column justify-content-around h-100">
            <img src="https://www.drogeham.com/assets/img/luchtfoto.jpg" class="parallax_background">
            <div></div>
            <div class="container">
                <div class="text-center text-white text-capitalize">
                    <h1>Plaatselijk belang drogeham</h1>
                    <button type="button" class="btn btn-primary rounded-pill">Word Lid</button>

                </div>
            </div>
            <div style="align-items:center" class="text-center text-capitalize d-flex flex-column">
                <a class="clicktohome" href="#home" style="text-decoration:none;"><span class="text-white pb-3">Onze projecten</span></a>
                <a class="clicktohome" href="#home"><img class="arrows" src="{{URL::asset("./img/arrow-down.svg")}}" alt="Arrow-down" height="35" width="35" /></a>
            </div>
        </div>
        <div id="home" style="position:absolute"></div> <!-- Scrolling to this element -->
        <div class="bg-light mt-5" >
            <div class="row">
                <div class="col">

                </div>
                <div class="col-10">
                    <div class="m-5">
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
                </div>
                <div class="col">

                </div>
            </div>
        </div>
        <x-footer />
    </div>
</body>

</html>