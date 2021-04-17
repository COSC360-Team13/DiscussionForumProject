<?php
    include 'config.php';
    if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["email"])){
            session_start();
            $username = $_SESSION['user'];
            $email = $_POST["email"];
        }

        if (isset($_SERVER['HTTP_REFERER'])){
            $return_link = $_SERVER['HTTP_REFERER'];
        }

        $sql = "SELECT * FROM users where email = '$$email';";

        $results = $pdo->query($sql);

        if($row = $results->fetch()){
            //email exists, try again!
            echo "<p style=\"color:red\">Email is taken! Try again.</p>";
            echo '<a href="'.$return_link.'">Return to My Account Page</a>';
        }
        else{
            //query update for email
            $sql_update = "UPDATE users SET email='$email' WHERE username='$username';";
            $count = $pdo->exec($sql_update);
            echo "<p style=\"color:green\">Updated successfully!</p>";
            echo '<a href="'.$return_link.'">Return to My Account Page</a>';
        }
    }
    else{
        echo "<p>Bad Request</p>";
    }
    $pdo = null;
?>