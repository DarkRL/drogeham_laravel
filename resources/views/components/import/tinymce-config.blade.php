<script src="https://cdn.tiny.cloud/1/cvn8qonvus0vl48pcypw8d8wfphd1w3kqcu1p87koja5uwb9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    var host = window.location.host;
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
            // console.log(json);
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
        plugins: 'image code link autoresize',
        menubar: 'edit insert view format table tools',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | image link',
        images_upload_credentials: true,
        images_upload_handler: example_image_upload_handler,
        /* enable title field in the Image dialog*/
        image_title: true,
        /* enable automatic uploads of images represented by blob or data URIs*/
        automatic_uploads: true,
        autoresize_bottom_margin: 50,
        branding: false,
        language: 'nl',
    });
</script>