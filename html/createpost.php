<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/mainPage.css">
    <title>Home Page</title>
  </head>
  <?php include 'navBar.php'; ?>
  <body>
      <img src="Images/Group 16.png" alt="Italian Trulli">
      <h1>Create Post</h1>
      <form>
        <input type = "text" id = "posttitle" name = "posttitle" placeholder="Title...">
        <input type = "text" id = "posttitle" name = "posttitle" placeholder="Content...">
      </form>
      <form action="upload.php" method="post" enctype="multipart/form-data">
  Post Image:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

  </body>
