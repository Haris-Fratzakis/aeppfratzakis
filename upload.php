<?php
// Specify the directory where you want to save the uploaded files
$target_dir = "uploads/"; // Make sure this directory exists on your server
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
echo basename($_FILES["fileToUpload"]["name"]);
// Check if file already exists
if (file_exists($target_file)) {
    echo $target_file;
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
