@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Home</div>
            <form action="/create" method="post" class="form-group">
                @csrf
                <!-- <textarea name="fulltext" class="form-control">Welcome to TinyMCE!</textarea> -->
                <textarea name="fulltext" class="form-control" id="file-picker"></textarea>
                <button type="submit" value="Add student" class="btn btn-primary">Submit</button>
            </form>
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