<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../css/reset.css">
<link rel="stylesheet" href="../css/registerUser.css">
</head>
<body style="margin-top:5em">
<?php
    include 'navBar.php';
    include 'config.php';
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        // retrieve all post request variables
        $firstname = $_POST["firstname"];
//         echo "Name ".$firstname;
        $lastname = $_POST["lastname"];
//         echo " ".$lastname."<br>";
        $username = $_POST["username"];
//         echo "Username: ".$username."<br>";
        $email = $_POST["email"];
//         echo "Email: ".$email."<br>";
        $password = md5($_POST["password"]);
//         echo "Password: ".$password."<br>";
        $image = $_POST["profile"];

        $statement = $pdo->prepare("INSERT INTO users (firstName, lastName, username, image, email, password) VALUES (?, ?, ?, ?, ?, ?)");
        $statement->execute([$firstname, $lastname, $username, $image, $email, $password]);
        echo "<div class=\"welcome\"><h2>Welcome to the Bear Cave: ".$username."</h2></div>";
        echo "<div class=\"returnButton\"><a href=\"mainPage.php\">Return to Homepage</a></div>";
//         echo "Query complete";
    $statement = null;
    $pdo = null;
    }
    else
    {
        echo "Bad request";
    }
?>
</body>
</html>