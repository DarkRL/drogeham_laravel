@extends('pages.layouts')

@section('content')
<div class="row">
    <div class="col-md-12 my-5">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
        @elseif ($message = Session::get('fail'))
        <div class="alert alert-danger">
            {{ $message }}
        </div>
        @endif
        <h2 class="text-center custom_hidden_repeat">Nieuw in Drogeham?</h2>
        <p class="text-mute text-center mb-4"><i>Als Plaatselijk Belang zijn we het aanspreekpunt voor de gemeente, provincie en andere organisaties. We behandelen zaken die onze bewoners en het dorp bezig houden zoals veiligheid, leefbaarheid, voorzieningen, sport, jeugd- en ouderenbeleid, dorpsvernieuwing en verkeersveiligheid. Wat er in het dorp gebeurt raakt ons allemaal. Daarom streven we naar een zo groot mogelijk draagvlak in de gemeenschap. We waarderen uw steun als actief lid of als donateur. Een lidmaatschap bedraagt € 5,00 op jaarbasis.</i></p>
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
                <textarea class="form-control" name="message" id="message" rows="5" placeholder="Vertel hier wat over jezelf..."></textarea>
            </div>
            <div class="mb-3">
                <input type="checkbox" name="privacy" required>
                <label for="privacy" class="form-label">Ik ga akkoord met de <a target="_blank" href="{{ route('privacy') }}">privacy verklaring</a>*</label>
            </div>
            <button type="submit" class="btn btn-primary custom_hidden_repeat">Verstuur</button>
        </form>
    </div>
</div>
@endsection