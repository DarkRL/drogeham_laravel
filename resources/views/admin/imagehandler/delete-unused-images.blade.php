@extends('admin.layouts')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center mb-3">Afbeeldingen opschonen</h5>
                    <p class="card-text">
                    Met de tool die we hebben gemaakt, kunnen we met een druk op de knop 
                    ongebruikte afbeeldingen van uw website verwijderen. Dit is belangrijk 
                    omdat het de laadtijd van uw website kan verbeteren en de prestaties 
                    kan optimaliseren. Ook kan het helpen om serverruimte te besparen en 
                    eventuele hostingkosten te verminderen. Om ervoor te zorgen dat uw website 
                    altijd snel en efficiënt blijft werken, raden we aan om deze tool 
                    maandelijks te gebruiken. Kortom, onze tool zorgt voor een snellere, 
                    efficiëntere en kosteneffectievere website voor u.
                    </p>
                    <form class="text-center" method="POST" action="{{ route('delete-unused-images') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary rounded-pill py-2 px-4">
                            Verwijder ongebruikte afbeeldingen
                        </button>
                    </form>
                </div>
            </div>
            @if ($message = Session::get('success'))
                    <div class="alert text-center alert-success">
                        {{ $message }}
                    </div>
            @endif
        </div>
    </div>
</div>


@endsection