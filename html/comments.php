<?php>
  date_default_timezone_set('America/Vancouver');
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" type = "text/css" href= "comment.css">

  </head>
  <body>
    <?php

    echo "<form>
      <input type = 'hidden' name= 'uid' value = 'Anonymous'>
      <input type = 'hidden' name= 'date' value = '".date('Y-m-d H:i:s')."'>
      <textarea> name = 'message'</textarea><br>
      <button tyle = 'submit' name = 'submit'>Comment</button>
    </form>";
  </body>
</html>
