@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div>
            <div id="message"></div>
            <a href="{{ route('admin.meyd.create') }}"><button type="button" class="btn btn-primary">Add Article</button></a>
            <div class="row">
                <!-- @foreach ($posts as $post)

                @endforeach -->
            </div>
        </div>
    </div>

    @endsection