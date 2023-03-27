<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="icon" href="{{ url('https://www.drogeham.com/assets/img/favicon.ico') }}">
    <link rel="stylesheet" href="{{URL::asset("./css/app.css")}}" />
</head>

<body>
    <x-header />
    <div class="container">
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
</body>

</html>