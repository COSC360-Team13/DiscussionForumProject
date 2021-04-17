<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login.css">
    <link href='https://fonts.googleapis.com/css?family=Ranga' rel='stylesheet'>
    <title>Login</title>
    <script type="text/javascript" src="../scripts/validate.js"></script>
    <?php
        session_start();
        if ( isset($_SESSION['error']) && $_SESSION['error'] !== "") {
            echo "<script type='text/javascript'>alert('".$_SESSION['error']."');\n";
            echo "window.onload = function(){\n";
            echo "var pass = document.getElementById(\"password\");\n";
            echo "var user = document.getElementById(\"username\");\n";
            echo "makeRed(pass);\n";
            echo "makeRed(user);\n}";
            echo "</script>";
        }
    ?>
    <script>
        function goBack() {
            window.location.href = "mainPage.php";
        }
    </script>
</head>
<body>
    <div class="grid-container">
        <div class="grid-entry">
            <button class="closeButton" onclick="goBack()"><img src="../images/close.png" alt="X" height="50" class="x"></button>
            <div class="loginlogo"><img class="logo" src="../images/bearcave.png" alt="BearCaveLogo"></div>
            <div class="userinput">
                <form method="post" action="validateLogin.php" id="mainForm">
                    <p>
                        <label>BearName:</label>
                        <br>
                        <input type="text" name="username" placeholder="Username" class="required" id="username"/>
                    </p>
                    <br>
                    <p>
                        <label>BearWord:</label>
                        <br>
                        <input type="password" name="password" placeholder="Password" class="required" id="password"/>
                    </p>
                    <br>
                    <input type="Submit" value="BearIn" class="submitForm">
                </form>
            </div>
            <br>
            <p>
                New to The Bear Cave? <a id="signup" href="newUserPage.php">BearUp</a>
            </p>
        </div>
        <div class="grid-entry right">
            <img src="../images/inspire.png" alt="Inspire" class="inspire">
        </div>

    </div>
</body>
</html>