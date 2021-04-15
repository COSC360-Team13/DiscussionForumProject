<?php
    include '../config.php';
    if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["oldpassword"])){
            $old_password = $_POST["oldpassword"];
        }
        if (isset($_POST["newpassword"])){
            $new_password = $_POST["newpassword"];
        }
        if (isset($_POST["confirmpassword"])){
            $confirm_password = $_POST["confirmpassword"];
        }
        session_start();
        $username = $_SESSION['user'];
        
        if (isset($_SERVER['HTTP_REFERER'])){
            $return_link = $_SERVER['HTTP_REFERER'];
        }

        $sql = "SELECT * FROM users where username = '$username' AND password=md5('$old_password');";

        $results = $pdo->query($sql);

        if($row = $results->fetch()){
            //password verfied, continue to update new password
            $sql_update = "UPDATE users SET password = md5('$new_password') WHERE username='$username';";
            $count = $pdo->exec($sql_update);
            echo "<p style=\"color:green\">Updated successfully!</p>";
            echo '<a href="'.$return_link.'">Return to My Account Page</a>';
        }
        else{
            //otherwise, wrong password!
            echo "<p style=\"color:red\">Wrong Password! Try again.</p>";
            echo '<a href="'.$return_link.'">Return to My Account Page</a>';
        }
    }
    else{
        echo "<p>Bad Request</p>";
    }
    $pdo = null;
?>