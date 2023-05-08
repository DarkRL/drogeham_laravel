@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <h5>Homepagina
            @php
            use App\Models\HomePost;
            @endphp
            @if (!HomePost::where('id', 1)->exists())
            <a href="{{ route('admin.home.create') }}">
                <button type="button" class="btn btn-success btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                </button>
            </a>
            @endif
        </h5>

        <div class="card mt-3">
            <div class="card-header">Feedback</div>
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5 class="text-center">Preview:</h5>
            </div>
            <div class="card-body">
                @forelse ($posts as $post)

                <x-admin.home_post postid="{{ $post->id }}" fulltext="{{ $post->fulltext }}" datetime="{{ $post->datetime }}" />

                @empty

                none

                @endforelse
            </div>
        </div>
    </div>
</div>

@endsection