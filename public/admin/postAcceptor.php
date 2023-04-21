<?php

// Define the path where the uploaded image will be stored
$uploadPath = realpath('/img/');

// Check if the file was uploaded successfully
if (isset($_FILES['upload']) && $_FILES['upload']['error'] === UPLOAD_ERR_OK) {

    // Get the uploaded file name
    $fileName = $_FILES['upload']['name'];

    // Generate a unique file name to avoid overwriting existing files
    $uniqueName = uniqid() . '-' . $fileName;

    // Move the uploaded file to the destination directory with the unique name
    if (move_uploaded_file($_FILES['upload']['tmp_name'], $uploadPath . $uniqueName)) {

        // Return the file URL to TinyMCE
        $fileUrl = 'http://127.0.0.1:8000/img/' . $uniqueName;
        echo json_encode(['location' => $fileUrl]);
    } else {

        // Return an error message to TinyMCE
        echo json_encode(['error' => 'Error uploading file']);
    }
} else {

    // Return an error message to TinyMCE
    echo json_encode(['error' => 'No file uploaded']);
}
