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
            <script>
                var host = window.location.host;
                // tinymce.init({
                //     selector: 'textarea', // change this value according to your HTML
                //     plugin: 'a_tinymce_plugin image',
                //     menubar: 'edit insert view format table tools help',
                //     toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image',
                //     branding: false,
                //     a_plugin_option: true,
                //     a_configuration_option: 400,
                //     language: 'nl',
                // });
                // tinymce.init({
                //     selector: 'textarea#file-picker',
                //     plugins: 'image code link',
                //     toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image',
                //     menubar: 'edit insert view format table tools',
                //     /* enable title field in the Image dialog*/
                //     image_title: true,
                //     branding: false,
                //     /* enable automatic uploads of images represented by blob or data URIs*/
                //     automatic_uploads: true,
                //     /*
                //       URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                //       images_upload_url: 'postAcceptor.php',
                //       here we add custom filepicker only to Image dialog
                //     */
                //     file_picker_types: 'image',
                //     /* and here's our custom image picker*/
                //     file_picker_callback: (cb, value, meta) => {
                //         const input = document.createElement('input');
                //         input.setAttribute('type', 'file');
                //         input.setAttribute('accept', 'image/*');

                //         input.addEventListener('change', (e) => {
                //             const file = e.target.files[0];

                //             const reader = new FileReader();
                //             reader.addEventListener('load', () => {
                //                 /*
                //                   Note: Now we need to register the blob in TinyMCEs image blob
                //                   registry. In the next release this part hopefully won't be
                //                   necessary, as we are looking to handle it internally.
                //                 */
                //                 const id = 'blobid' + (new Date()).getTime();
                //                 const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                //                 const base64 = reader.result.split(',')[1];
                //                 const blobInfo = blobCache.create(id, file, base64);
                //                 blobCache.add(blobInfo);

                //                 /* call the callback and populate the Title field with the file name */
                //                 cb(blobInfo.blobUri(), {
                //                     title: file.name
                //                 });
                //             });
                //             reader.readAsDataURL(file);
                //         });

                //         input.click();
                //     },
                //     content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
                // });

                const example_image_upload_handler = (blobInfo, progress) => new Promise((resolve, reject) => {
                    const xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', 'postAcceptor.php');

                    xhr.upload.onprogress = (e) => {
                        progress(e.loaded / e.total * 100);
                    };

                    xhr.onload = () => {
                        if (xhr.status === 403) {
                            reject({
                                message: 'HTTP Error: ' + xhr.status,
                                remove: true
                            });
                            return;
                        }

                        if (xhr.status < 200 || xhr.status >= 300) {
                            reject('HTTP Error: ' + xhr.status);
                            return;
                        }

                        const json = JSON.parse(xhr.responseText);

                        if (!json || typeof json.location != 'string') {
                            reject('Invalid JSON: ' + xhr.responseText);
                            return;
                        }

                        resolve(json.location);
                    };

                    xhr.onerror = () => {
                        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr.status);
                    };

                    const formData = new FormData();
                    formData.append('upload', blobInfo.blob(), blobInfo.filename());

                    xhr.send(formData);
                });


                tinymce.init({
                    selector: 'textarea#file-picker',
                    plugins: 'image code',
                    toolbar: 'undo redo | link image | code',
                    images_upload_credentials: true,

                    images_upload_handler: example_image_upload_handler,
                    /* enable title field in the Image dialog*/
                    image_title: true,
                    /* enable automatic uploads of images represented by blob or data URIs*/
                    automatic_uploads: true,

                    /*
                      URL of our upload handler (for more details check: https://www.tiny.cloud/docs/configure/file-image-upload/#images_upload_url)
                      images_upload_url: 'postAcceptor.php',
                      here we add custom filepicker only to Image dialog
                    */
                    file_picker_types: 'image',
                    /* and here's our custom image picker*/
                    file_picker_callback: (cb, value, meta) => {
                        const input = document.createElement('input');
                        input.setAttribute('type', 'file');
                        input.setAttribute('accept', 'image/*');

                        input.addEventListener('change', (e) => {
                            const file = e.target.files[0];

                            const reader = new FileReader();
                            reader.addEventListener('load', () => {
                                /*
                                  Note: Now we need to register the blob in TinyMCEs image blob
                                  registry. In the next release this part hopefully won't be
                                  necessary, as we are looking to handle it internally.
                                */
                                const id = 'blobid' + (new Date()).getTime();
                                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                                const base64 = reader.result.split(',')[1];
                                const blobInfo = blobCache.create(id, file, base64);
                                blobCache.add(blobInfo);

                                /* call the callback and populate the Title field with the file name */
                                cb(blobInfo.blobUri(), {
                                    title: file.name
                                });
                            });
                            reader.readAsDataURL(file);
                        });

                        input.click();
                    },
                    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
                });
            </script>
        </div>
    </div>
</div>

@endsection