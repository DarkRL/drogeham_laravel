@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-10">
        <h5>Achtergrond afbeelding alle pagina's behalve home</h5>

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
<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Preview:</h5>
            </div>
            <div class="m-3">
                @forelse ($posts as $post)

                <section>
                    <a href="{{ route('admin.imageasign.edit', ['id' => $post->id]) }}">
                        <button type="button" class="btn btn-primary btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </button>
                    </a>
                    <div class="pt-2 pb-2 container-fluid">
                        @if($post->photo == "empty")
                        <img src="{{ URL::asset("./img/luchtfoto.jpg") }}" />
                        @else
                        <img src="{{ $post->photo }}" />
                        @endif
                    </div>
                </section>

                @empty

                none

                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection