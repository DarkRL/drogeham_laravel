<script src="https://cdn.tiny.cloud/1/cvn8qonvus0vl48pcypw8d8wfphd1w3kqcu1p87koja5uwb9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#file-picker',
        plugins: 'image code link autoresize',
        menubar: 'edit insert view format table tools',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image link',
        autoresize_bottom_margin: 50,
        branding: false,
        language: 'nl',
        image_title: true,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        images_upload_url : '/upload/post-image',
        file_picker_types: 'none',
        file_picker_callback: function (cv, value, meta){
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function(){
                var file = this.files[0];
                var reader = new FileReader();
                reader.readAsDataURL(file);
                render.onload = function(){
                    var id = 'blobid'+(new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), {title:file.name});
                };
            };
            input.click();
        },

    });
</script>