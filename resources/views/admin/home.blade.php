@extends('admin.layouts')

@section('content')

<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Home</div>
            <textarea>
     Welcome to TinyMCE!
  </textarea>
            <div class="card-body">
                @forelse ($posts as $post)

                <x-admin.home_post postid="{{ $post->id }}" fulltext="{{ $post->fulltext }}" datetime="{{ $post->datetime }}" />

                @empty

                none

                @endforelse
            </div>
            <script>
                tinymce.init({
                    selector: 'textarea', // change this value according to your HTML
                    plugin: 'a_tinymce_plugin',
                    menubar: 'edit insert view format table tools help',
                    a_plugin_option: true,
                    a_configuration_option: 400
                });
                console.log(window.location);
            </script>
        </div>
    </div>
</div>

@endsection