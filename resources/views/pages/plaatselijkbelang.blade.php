<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{URL::asset("./css/app.css")}}" />
</head>

<body>
    <x-header />
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <div class="m-5">
                    <div>
                        <h2>Plaatselijk belang</h2>
                        <p>Bestuur plaatselijk belang Drogeham bestaat uit zeven leden.</p>
                        <ul>
                            <li>Klaas Alma 0633513612 (voorzitter)</li>
                            <li>Anneke v/d Galiën (secretaresse)</li>
                            <li>Lonneke Wijma (penningmeester)</li>
                            <li>Henrike de Jong (algemeen bestuurslid)</li>
                            <li>Jan Tjoelker (algemeen bestuurslid/Webmaster)</li>
                        </ul>
                        <p>Hieronder zijn de presentaties te vinden van de jaarvergaderingen van Plaatselijk Belang Drogeham.</p>
                    </div>
                    <div>
                        <h6>FILES KOMEN HIER</h6>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <x-footer />
</body>

</html>