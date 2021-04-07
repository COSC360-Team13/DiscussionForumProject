<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/registration.css">
    <script type="text/javascript" src="../scripts/validate.js"></script>
<!-- Borrowed this password checker from lab9 -->
    <script>
        function checkPasswordMatch(e)
        {
            var password = document.getElementById('password');
            var passwordCheck = document.getElementById('password-check');

            // console.log(password.value !== passwordCheck.value)
            if (password.value !== passwordCheck.value)
            {
                // console.log("passwords don't match!");
                alert("Passwords do not match!");
                makeRed(password);
                makeRed(passwordCheck);
                e.preventDefault();
            }

        }
    </script>
</head>
<body>

    <div class="grid-container">
        <div class="grid-entry">
            <a href="mainPage.php">Return to Homepage</a>
            <h2>Join the Bear Cave</h2>
            <form method="post" action="" id="mainForm">
                <table>
                    <tr><td class="table-head" colspan="2"><label>First Name:</label></td></tr>
                    <tr><td colspan="2"><input type="text" name="firstname" placeholder="John" class="required"></td></tr>
                    <tr><td class="table-head" colspan="2"><label>Last Name:</label></td></tr>
                    <tr><td colspan="2"><input type="text" name="lastname" placeholder="Doe" class="required"></td></tr>
                    <tr><td class="table-head" colspan="2"><label>Username:</label></td></tr>
                    <tr><td colspan="2"><input type="text" name="username" id="username" placeholder="johnDoe123" class="required"></td></tr>
                    <tr><td class="table-head" colspan="2"><label>Email:</label></td></tr>
                    <tr><td colspan="2"><input type="email" name="email" placeholder="john@doe.com" class="required"></td></tr>
                    <tr><td class="table-head" colspan="2"><label>Password:</label></td></tr>
                    <tr><td colspan="2"><input type="password" name="password" id="password" class="required"></td></tr>
                    <tr><td class="table-head" colspan="2"><label>Confirm Password:</label></td></tr>
                    <tr><td colspan="2"><input type="password" name="password-check" id="password-check" class="required"></td></tr>
                    <tr><td class="submitForm"><input type="submit" value="Sign Up"></td><td class="submitForm"><input type="reset" value="Reset"></td></tr>
                </table>
            </form>
        </div>
        <div class="grid-entry right">
            <h2>Stuff</h2>
        </div>
    </div>

</body>
</html>