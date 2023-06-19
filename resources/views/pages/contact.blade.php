@extends('pages.layouts')

@section('content')
<div class="row">
    <div class="col"></div>
    <div class="col-10">
        <div class="m-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <h2 class="text-center custom_hidden_repeat">Nieuw in Drogeham?</h2>
                        <p class="text-mute text-center mb-4"><i>Namens de hele gemeenschap van Drogeham wil ik je van harte welkom heten in ons prachtige dorp. We zijn verheugd dat je ervoor hebt gekozen om hier te komen wonen en deel uit te maken van onze hechte gemeenschap.</i></p>
                        <form id="Contact" action="{{route('contact.post')}}" method="post">
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
                                <div class="mb-3">
                                  <div class="h-captcha" data-sitekey="13d3c42a-ca96-4cc5-876a-9b403e08db0d" data-theme="licht" required></div>
                                </div>
                                <button type="submit" class="btn btn-primary custom_hidden_repeat">Verstuur</button>
                            </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endsection
