<?php
    include '../config.php';
    if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["username"])){
            session_start();
            $old_username = $_SESSION['user'];
            $new_username = $_POST["username"];
        }

        if (isset($_SERVER['HTTP_REFERER'])){
            $return_link = $_SERVER['HTTP_REFERER'];
        }

        $sql = "SELECT * FROM users where username = '$new_username';";

        $results = $pdo->query($sql);

        if($row = $results->fetch()){
            echo "<p style=\"color:red\">Username is taken! Try again.</p>";
            echo '<a href="'.$return_link.'">Return to My Account Page</a>';
        }
        else{
            //query update for username
            $sql_update = "UPDATE users SET username='$new_username' WHERE username='$old_username';";
            $count = $pdo->exec($sql_update);
            echo "<p style=\"color:green\">Updated successfully!</p>";
            echo '<a href="'.$return_link.'">Return to My Account Page</a>';
            $_SESSION['user'] = $new_username;
        }
    }
    else{
        echo "<p>Bad Request</p>";
    }
    $pdo = null;
?>