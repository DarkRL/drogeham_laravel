@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <div class="mt-3">
            <div id="message">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @elseif ($message = Session::get('fail'))
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @endif
            </div>
        </div>
        <h5>Persoonsgegevens</h5>
        <form action="{{ route('admin.contact.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="search" placeholder="Zoek...">
                <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">Zoek</button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-striped table-responsive w-100">
                <tr>
                    <th>Naam</th>
                    <th class="small" style="width:15%">Aangemeld op</th>
                    <th class="small" style="width:15%">Email</th>
                    <th class="small" style="width:15%">Tel</th>
                    <th class="small" style="width:7%">Bericht</th>
                    <th class="small" style="width:7%">Verwijderen</th>
                </tr>
                @foreach ($posts as $post)

                <x-admin.contact_post_card postid="{{ $post->id }}" headline="{{ $post->naam }}" email="{{$post->email}}" datetime="{{ $post->created_at }}" fulltext="{{ $post-> bericht }}" tel="{{$post->tel}}" />

                @endforeach
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center">
            <div>
                {{ $posts->withQueryString()->links() }}
            </div>
            <div>
                <p class="mb-0">Resultaten: {{ $posts->total() }}</p>
            </div>
        </div>
    </div>
</div>

@endsection