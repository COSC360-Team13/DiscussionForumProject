<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_SESSION['user']) && $_SESSION['user'] === "admin"){
        $pid = $_GET["pid"];

        include 'config.php';
        
        $sql = "DELETE FROM post WHERE pid = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$pid]);

        $sql = "DELETE FROM comments WHERE postid = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$pid]);

        $pdo = null;

        echo "True";
    }else {
        echo "False";
    }
?>