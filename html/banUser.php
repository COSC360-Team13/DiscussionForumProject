<?php
    include 'config.php';
    if(isset($_GET['user'])){
        $user = $_GET['user'];
    } 
    
    $sql = "UPDATE users SET disabled=true WHERE username='$user';";
    $result = $pdo->query($sql);
    $count = $pdo->exec($sql);

    if (isset($_SERVER['HTTP_REFERER'])){
        $return_link = $_SERVER['HTTP_REFERER'];
    }

    header("Location: $return_link");

?>