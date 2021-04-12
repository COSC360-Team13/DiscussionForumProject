<?php
session_start();
if ( isset($_SESSION['user']) && $_SESSION['user'] !== "" ) {
    echo "<button><a href=\"profile.html\"><img src=\"\" alt=\"Account\"></a></button>";
    echo "<button><a href=\"logout.php\">Logout</a></button>";
}
else {
    echo "<button><a href=\"LoginPage.php\">Login</a></button>";
}
?>