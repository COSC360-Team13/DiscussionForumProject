<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login.css">
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
</head>
<body>
    <div class="grid-container">
        <div class="grid-entry">
            <div class="loginlogo"><img src="../images/bearcave.png" alt="BearCaveLogo"></div>
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
            <p>
                Forgot your <a href="">username</a> or <a href="">password</a>?
            </p>
            <br>
            <p>
                New to The Bear Cave? <a id="signup" href="newUser.php">BEAR UP</a>
            </p>
        </div>
        <div class="grid-entry right">
            <img src="../images/inspire.png" alt="Inspire" class="inspire">
        </div>

    </div>
</body>
</html>