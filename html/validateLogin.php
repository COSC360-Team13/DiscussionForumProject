<?php
    // check if user is in database and if password matches
    include 'config.php';
    if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["username"])){
            $username = $_POST["username"];
        }
        if (isset($_POST["password"])){
            $password = $_POST["password"];
            $password = md5($password);
        }

        if (isset($_SERVER['HTTP_REFERER'])){
            $return_link = $_SERVER['HTTP_REFERER'];
        }

        $sql = "SELECT * FROM users where username = '$username' AND password = '$password';";

        $results = $pdo->query($sql);

        if($row = $results->fetch()){
            if($row['disabled'] == 0){
                echo "<p>User has valid account</p>";
                session_start();
                $_SESSION['user'] = $username;
                header("Location: mainPage.php");
            }
            else{
                echo "<p>You are currently banned from this website. Please contact an admin for details.</p>";
                echo "<a href=\"$return_link\">Return to Login Page</a>";
            }
        }
        else{
            //display error
            session_start();
            $_SESSION['error'] = "Wrong username/password. Try again.";
            header("Location: LoginPage.php");
        }
    }
    else{
        echo "<p>Bad Request</p>";
    }
    $pdo = null;
?>