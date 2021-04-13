<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/mainPage.css">
    <title>Home Page</title>
  </head>
  <?php include 'navBar.php'; ?>
  <body>
      <?php
       include 'config.php';

       $msg = "";

      if($_SERVER["REQUEST_METHOD"] == "POST"){
        $posttitle = $_POST["posttitle"];
        $postcontent = $_POST["postcontent"];
        $username = $_SESSION["username"];
        $image = $_POST["upload"];

        if(isset($postcontent)){
          $statement = $pdo->prepare("INSERT INTO users (ptitle,username,content,date) VALUES (?, ?, ?, ?, ?)");
          $statement = execute([$posttitle, $postcontent, $username, now()]);
        }

        if(isset($image)){
          $filename = $_FILES["image"]["name"];
          $tempname = $_FILES["image"]["tmp_name"];
          $folder = "image/".$filename;

          $sql = "INSERT INTO image (filename) VALUES ('$filename')";

          mysqli_query($pdo, $sql);

          if(move_uploaded_file($tempname, $folder)) {
            $msg = "Image uploaded successfully";
          }
          else{
            $msg = "Failed to upload image";
          }
          $result = mysqli_query($pdo, "SELECT * FROM image");

        }
      }
      ?>

      <img src="Images/Group 16.png" alt="Italian Trulli">
      <h1>Create Post</h1>
      <form action="createpost.php" method="post" target="_blank">
        <input type = "text" id = "posttitle" name = "posttitle" placeholder="Title...">
        <input type = "text" id = "postcontent" name = "postcontent" placeholder="Content...">
      </form>
      <form action="upload.php" method="post" enctype="multipart/form-data">
  Post Image:
  <input type="file" name="image" id="image">
  <input type="submit" value="Upload Image" name="upload">
</form>
  </body>
