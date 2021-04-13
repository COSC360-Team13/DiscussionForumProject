<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/newUser.css">
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- In the event that jquery doesnt load through the web. -->
    <script type="text/javascript" src="../scripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../scripts/formValidation.js"></script>
    <script type="text/javascript" src="../scripts/usernameAvailabilityDisplay.js"></script>
    <script type="text/javascript" src="../scripts/emailAvailabilityDisplay.js"></script>
    <!-- Borrowed this password checker from lab9 -->
</head>
<body>
    <div class="grid-container">
        <div class="grid-entry">
            <a href="mainPage.php">Return to Homepage</a>
            <form method="POST" action="registerUser.php" id="mainForm">
                <table>
                <legend><h2>Join the Bear Cave</h2></legend>
                    <tr><td class="table-head" colspan="2"><label>First Name:</label></td></tr>
                    <tr><td colspan="2"><input type="text" name="firstname" placeholder="John" class="required"></td></tr>
                    <tr><td class="table-head" colspan="2"><label>Last Name:</label></td></tr>
                    <tr><td colspan="2"><input type="text" name="lastname" placeholder="Doe" class="required"></td></tr>
                    <tr><td class="table-head" colspan="2"><label>Username:</label></td></tr>
                    <tr><td colspan="2"><input type="text" name="username" id="username" placeholder="johnDoe123" class="required"></td></tr>
                    <tr><td colspan="2" ><p id="userValid"></p></td></tr>
                    <tr><td class="table-head" colspan="2"><label>Email:</label></td></tr>
                    <tr><td colspan="2"><input type="email" name="email" id="email" placeholder="john@doe.com" class="required"></td></tr>
                    <tr><td colspan="2" ><p id="emailValid"></p></td></tr>
                    <tr><td class="table-head" colspan="2"><label>Password:</label></td></tr>
                    <tr><td colspan="2"><input type="password" name="password" id="password" class="required"></td></tr>
                    <tr><td class="table-head" colspan="2"><label>Confirm Password:</label></td></tr>
                    <tr><td colspan="2"><input type="password" name="password-check" id="password-check" class="required"></td></tr>
                    <tr><td colspan="2" ><p id="no-match" hidden>Passwords do not match</p></td></tr>
                    <tr><td class="submitForm"><input type="submit" value="Sign Up"></td><td class="submitForm"><input type="reset" value="Reset" onclick="Reset()"></td></tr>
                </table>
            </form>
        </div>
        <div class="grid-entry right">
            <h2>Stuff</h2>
        </div>
    </div>
</body>
</html>