<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/login.css">
    <title>Login</title>
</head>
<header>
    <nav class="navbar">
        <div class="logo"><a href="mainPage.php"><img src="" alt="HomepageLogo"></a></div>
        <div class="headertitle">Become A Bear Today!</div>
    </nav>
</header>
<body>
    <div class="loginmain">
        <div class="loginlogo"><img src="" alt="BearCaveLogo"></div>
        <div class="userinput">
            <form method="post" action="process.php">
                <fieldset>
                    <legend>Login:</legend>
                    <p>
                        <label>BearName:</label>
                        <br>
                        <input type="text" name="username" placeholder="Username"/>
                    </p>
                    <p>
                        <label>BearWord:</label>
                        <br>
                        <input type="password" name="password" placeholder="Password"/>
                    </p>
                    <br>
                    <input type="Submit" value="BearIn">
                </fieldset>
            </form>
        </div>
        <p>
            Forgot your <a href="">username</a> or <a href="">password</a>?
        </p>
        <br>
        <p>
            New to The Bear Cave? <a id="signup" href="registrationPage.php">BEAR UP</a>
        </p>
    </div>
    <div class="logininfo">
        <p>Other than a few maulings, the bond between man and bear is beautiful.  
            We’ve created a place for that bond to prosper.
        </p>
        <img src="" alt="Bearimage1">
        <img src="" alt="Bearimage2">
    <div>
</body>
</html>