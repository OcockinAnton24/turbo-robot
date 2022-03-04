<?php
$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 1;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $frtn = file_get_contents($target_file);
  $frtt = file_get_contents($_FILES["file"]["tmp_name"]);
  if ($frtn == $frtt){
    echo "File is actually the same";
    $uploadOk = 0;
  }else{
    echo "File is not the same";
    exec('rm "'.$target_file.'"');
    $uploadOk = 1;
  }
}

// Check file size
if ($_FILES["file"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo '{"status":"success", "text":"file uploaded success"}';
  } else {
    echo '{"status":"error", "text":"Sorry, there was an error uploading your file."}';
  }
}
?>