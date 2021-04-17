<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/profile.css">
    <title>My Account</title>
    <script type="text/javascript" src="../scripts/profile.js"></script>
    <script>  
        function checkPasswordMatch(e) {
            var first = document.getElementById("newpassword");
            var second = document.getElementById("confirmpassword");
            if(first.value !== second.value){
            makeRed(first);
            makeRed(second);
            alert("Passwords do not match!");
            e.preventDefault();
            }
        }
    </script>
    <?php include 'navBar.php'; ?>
</head>
<body style="margin-top:6em">
</br>
    <div class="grid-container">

        <div class="grid-entry">
            <div class="user_info">
                <?php include 'profile/getUserInfo.php';?>
            </div>
        </div>

        <div class="grid-entry">
            <div class="user_history">
                <table>
                    <thead>
                        <tr>
                            <th class="tab">
                                <button class="tablinks" onclick="openTab(event, 'comments')">Comment History</button>
                            </th>
                            <th class="tab">
                                <button style="height: 34px;" class="tablinks" onclick="openTab(event, 'posts')">Post History</button>
                            </th>
                        </tr>   
                    </thead>
                    <tbody id="comments" class="tabcontent">
                        <?php include 'profile/getUserHistory.php';?>
                    </tbody>
                    <tbody id="posts" class="tabcontent">
                        <?php include 'profile/getUserPosts.php';?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<?php include 'footer.php'; ?>
</html>