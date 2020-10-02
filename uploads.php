<?php
$target_dir = "uploads/imagestorageavatar";
$target_file = $target_dir . basename($_FILES["102.jpg"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// récupère l'id 
$prep_user = "SELECT id  FROM ADMINISTRATEUR WHERE mail = 102 ";
            $requser = $bdd->prepare($prep_user);
            $requser->execute();
// Check si l'image en est une ou pas 
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["102.jpg"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0; 
  }
}

// Check si le fichier existe deja
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// taille maximal du fichier
if ($_FILES["102.jpg"]["size"] > 500000) 
{
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// authorises certain formats de fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) 
{
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Vérifie si $uploadOk est mis à 0 par une erreur
if ($uploadOk == 0) 
{
  echo "Sorry, your file was not uploaded.";
// Si tout est bon tente d'upload le fichier
} else {
  if (move_uploaded_file($_FILES["102.jpg"]["tmp_name"], $target_file)) 
{
    echo "The file ". htmlspecialchars( basename( $_FILES["102.jpg"]["name"])). " has been uploaded.";
} else 

{
    echo "Sorry, there was an error uploading your file.";
  }
}
?>