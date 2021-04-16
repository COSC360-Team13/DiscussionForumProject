<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] === "GET" && isset($_SESSION['user']) && $_SESSION['user'] !== ""){
        $user = $_SESSION['user'];
        $pid = $_GET["pid"];
        $direction = $_GET["direction"];

        include 'config.php';
        
        $sql = "SELECT COUNT(*) FROM likedPosts WHERE username = ? AND pid = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute([$user, $pid]);
        $column = $statement->fetchColumn();
    
        if($column > 0) {
            echo "False";
        }else {
            
            if ($direction == "up") {
                $sql = "UPDATE post SET upvotes = upvotes + 1 WHERE pid = ?";
            }else {
                $sql = "UPDATE post SET upvotes = upvotes - 1 WHERE pid = ?";
            }
            
            $statement = $pdo->prepare($sql);
            $statement->execute([$pid]);

            $sql = "INSERT INTO likedPosts (username, pid) VALUES (?, ?)";
            $statement = $pdo->prepare($sql);
            $statement->execute([$user, $pid]);
            
            $pdo = null;
            $results = null;
            
            echo "True";
        }
    }else {
        echo "False";
    }
?>