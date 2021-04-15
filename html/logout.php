<?php
    session_start();
    $_SESSION['user'] = "";
    $_SESSION['error'] = "";
    header("Location: mainPage.php");
?>