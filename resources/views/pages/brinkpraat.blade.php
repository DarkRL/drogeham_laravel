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
                        <h2>Brinkpraat</h2>
                        <p>Drogeham heeft sinds 1986 een dorpskrant met de naam Brinkpraat. Deze naam herinnert aan de vroegere brink. De inhoud bestaat uit activiteiten, geschiedenis en algemene informatie over het dorp.</p>
                        <p>Hieronder staat een overzicht met alle edities van de Brinkpraat van 2019. Wanneer er een nieuwe editie verschenen is, zal die zo snel mogelijk hieronder gepubliceerd worden.</p>
                        <a href="mailto:brinkpraat@chello.nl">Hier kunt u terecht met vragen en/of opmerkingen over de dorpskrant</a>
                    </div>
                    <div class="mt-4">
                        <h6>FILES STAAN HIER</h6>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <x-footer />
</body>

</html>