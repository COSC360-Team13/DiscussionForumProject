<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/findUser.css">
    <link href='https://fonts.googleapis.com/css?family=Ranga' rel='stylesheet'>
    <title>Find User</title>
    <script type="text/javascript" src="../scripts/findUser.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>
    <div class="grid-container">
        <div class="grid-entry">
            <button class="closeButton" onclick="goBack()"><img src="../images/close.png" alt="X" height="50" class="x"></button>
            <label>Find User By:</label>
            <select name="case" id="case-type" onChange="adaptForm(this)">
                <option value="username">Name</option>
                <option value="email">Email</option>
                <option value="post">Post</option>
            </select>

            <div class="userinput">
                <form method="get" action="queryUserResults.php" id="mainForm">
                    <p>
                        <label>Enter Name:</label>
                        <br>
                        <input type="text" name="name" placeholder="Name" id="Name" />
                    </p>
                    <p>
                        <label>Enter Email:</label>
                        <br>
                        <input type="email" name="email" placeholder="Email" disabled id="Email"/>
                    </p>
                    <p>
                        <label>Enter Post:</label>
                        <br>
                        <input type="text" name="post" placeholder="Post" disabled id="Post"/>
                    </p>
                    <input type="Submit" value="Submit" class="submitForm">
                </form>
            </div>
        </div>

    </div>
</body>
</html>