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

      if($_SERVER["REQUEST_METHOD"] === "POST"){
        $posttitle = $_POST["posttitle"];

        $postcontent = $_POST["postcontent"];

        if(isset($postcontent)){
          $statement = $pdo->prepare("INSERT INTO users (title, , username, email, password) VALUES (?, ?, ?, ?, ?)");
        }



        $statement = $pdo->prepare("INSERT INTO POST (, title, username, email, password) VALUES (?, ?, ?, ?, ?)");
        $statement->execute([$firstname, $lastname, $username, $email, $password]);
      }
      ?>
      <img src="Images/Group 16.png" alt="Italian Trulli">
      <h1>Create Post</h1>
      <form action="createpost.php" method="get" target="_blank">
        <input type = "text" id = "posttitle" name = "posttitle" placeholder="Title...">
        <input type = "text" id = "postcontent" name = "postcontent" placeholder="Content...">
      </form>
      <form action="upload.php" method="post" enctype="multipart/form-data">
  Post Image:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>
  </body>
