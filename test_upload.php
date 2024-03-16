<?php
$contentType = basename($_POST['contentType']);

// Ensuring the directory exists
$target_dir = "uploads/" . $contentType . "/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$target_picture = $target_dir . basename($_FILES["pictureToUpload"]["name"]);
$uploadOk = 1;
$title = $_POST['title'];
$content = $_POST['content'];

// Ensuring the data directory exists
if (!file_exists('data')) {
    mkdir('data', 0777, true);
}

// Using a unique identifier for the JSON file name
$jsonDataFile = $target_dir . time() . '_lesson_' . $title . '.json';

// Check if file already exists
if (file_exists($target_picture)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["pictureToUpload"]["tmp_name"], $target_picture)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["pictureToUpload"]["name"])). " has been uploaded.";

        // Create and save the JSON data only after successful upload
        $formData = [
            'title' => $title,
            'content' => $content,
            'contentType' => $contentType,
            'imagePath' => $target_picture
        ];
        $jsonString = json_encode($formData, JSON_PRETTY_PRINT);
        file_put_contents($jsonDataFile, $jsonString . PHP_EOL, FILE_APPEND);
        echo "Submission saved.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
