<?php
session_start();
if (isset($_SESSION['user']) && $_SESSION['user'] === "admin"){
    echo "<button><a href=\"profile.php\"><img class=\"PP\" src=\"../images/".$_SESSION['user']."PP.png\" alt=\"".$_SESSION['user']."\"></a></button>";
    echo "<button><a href=\"logout.php\">Logout</a></button>";
    echo "<span class=\"admin\">ADMIN</span>";
    echo "<button><a href=\"findUser.php\">Find User</a></button>";
}
else if (isset($_SESSION['user']) && $_SESSION['user'] !== "" ) {
    echo "<button><a href=\"profile.php\"><img class=\"PP\" src=\"../images/".$_SESSION['user']."PP.png\" alt=\"".$_SESSION['user']."\"></a></button>";
    echo "<button><a href=\"logout.php\">Logout</a></button>";
}
else {
    echo "<button><a href=\"LoginPage.php\">Login</a></button>";
}
?>