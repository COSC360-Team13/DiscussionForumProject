<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['user'] !== "" ) {
    echo "<button><a href=\"profile.php\"><img class=\"PP\" src=\"../images/".$_SESSION['user']."PP.png\" alt=\"".$_SESSION['user']."\"></a></button>";
    echo "<button><a href=\"logout.php\">Logout</a></button>";
}
else {
    echo "<button><a href=\"LoginPage.php\">Login</a></button>";
}
?>