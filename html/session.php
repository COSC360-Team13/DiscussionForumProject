<?php
include 'config.php';
session_start();
if (isset($_SESSION['user']) && $_SESSION['user'] === "admin"){
    $statement = $pdo->prepare("SELECT image FROM users WHERE username = ?");
    $statement->execute([$_SESSION['user']]);
    $image= $statement->fetchColumn();
    echo "<div class=\"dropdown\"><button><img class=\"PP\" src=\"../images/user/".$image."\" alt=\"".$_SESSION['user']."\" width=\"30px\" height=\"30px\" style=\"border-radius:15px\"></button>";
    echo "<div class=\"dropdown-content\"><a href=\"profile.php\">My Account</a><a href=\"logout.php\">Logout</a></div></div>";
    echo "<span class=\"admin\">ADMIN</span>";
    echo "<button><a href=\"findUser.php\">Find User</a></button>";
}
else if (isset($_SESSION['user']) && $_SESSION['user'] !== "" ) {
    $statement = $pdo->prepare("SELECT image FROM users WHERE username = ?");
    $statement->execute([$_SESSION['user']]);
    $image= $statement->fetchColumn();
    echo "<div class=\"dropdown\"><button><img class=\"PP\" src=\"../images/user/".$image."\" alt=\"".$_SESSION['user']."\" width=\"30px\" height=\"30px\" style=\"border-radius:15px\"></button>";
    echo "<div class=\"dropdown-content\"><a href=\"profile.php\">My Account</a><a href=\"logout.php\">Logout</a></div></div>";
}
else {
    echo "<button><a href=\"LoginPage.php\">Login</a></button>";
}
?>