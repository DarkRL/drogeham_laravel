@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Home</div>
            <form action = "/create" method = "post" class="form-group">
                @csrf
                <textarea name="fulltext" class="form-control">Welcome to TinyMCE!</textarea>
                <button type="submit" value="Add student" class="btn btn-primary">Submit</button>
            </form>
            <div class="card-body">
                @forelse ($posts as $post)

                <x-admin.home_post postid="{{ $post->id }}" fulltext="{{ $post->fulltext }}" datetime="{{ $post->datetime }}" />

                @empty

                none

                @endforelse
            </div>
            <script>
                var host = window.location.host;
                tinymce.init({
                    selector: 'textarea', // change this value according to your HTML
                    plugin: 'a_tinymce_plugin image',
                    menubar: 'edit insert view format table tools help',
                    toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image',
                    branding: false,
                    a_plugin_option: true,
                    a_configuration_option: 400,
                    language: 'nl',
                });
            </script>
        </div>
    </div>
</div>

@endsection