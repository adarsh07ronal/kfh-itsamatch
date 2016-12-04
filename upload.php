<?php
$target_dir = "uploads/";
$target_file1 = $target_dir . basename($_FILES["userfile"]["name"][0]);
$target_file2 = $target_dir . basename($_FILES["userfile"]["name"][1]);
print ("changi");
$username1 = isset($_POST['name1']) ? $_POST['name1'] : '';
print ($username1);
$username2 = isset($_POST['name2']) ? $_POST['name2'] : '';
print ($username2);

$uploadOk = 1;
$imageFileType = pathinfo($target_file1,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["userfile"]["tmp_name"][0]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file1)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// // Check file size
// if ($_FILES["userfile"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["userfile"]["tmp_name"][0], $target_dir."./b.png")) {
        echo "The file ". basename( $_FILES["userfile"]["name"][0]). " has been uploaded, And renamed to " . $username1;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    if (move_uploaded_file($_FILES["userfile"]["tmp_name"][1], $target_dir."./a.png")) {
        echo "The file ". basename( $_FILES["userfile"]["name"][1]). " has been uploaded, And renamed to " . $username2;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$doc = new DOMDocument();
$doc->loadHTMLFile("outputscreen.html");
echo $doc->saveHTML();

?>