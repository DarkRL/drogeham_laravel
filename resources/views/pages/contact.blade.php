<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <x-imports />
</head>

<body class="custom_hidden_stay_fast">
    <x-header />
    <div class="parallax_fixed"></div>
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col-10">
                <div class="m-5">
                    <div class="container">
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
                                    <button type="submit" class="btn btn-primary">Verstuur</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <x-footer />
</body>

</html>