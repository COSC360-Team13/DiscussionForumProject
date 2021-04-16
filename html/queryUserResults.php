<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/queryUserResults.css">
    <title>User Results</title>
</head>
<?php
include 'navBar.php';
?>
<body style="margin-top:7em">

<div class="main">
<div id="breadcrumbs"></div>
<div id="keyword">

</div>
<div class="columns">
    <div class="grid-container">
            <?php include 'config.php';
                echo "<div class=\"grid-entry\">";
                if($_SERVER["REQUEST_METHOD"] === "GET"){
                    if (isset($_GET["name"]) && $_GET["name"] != ""){
                        $name = $_GET["name"];
                        echo "<h2>".$name."</h2>";
                        $name = "%".$name."%";

                        $sql = "SELECT username, firstname, lastname FROM users WHERE firstname LIKE :first  OR lastname LIKE :last";
                        $statement = $pdo->prepare($sql);
                        $statement->execute(array(':first' => $name, ':last' => $name));
                        echo "<table><tr><th>Username</th><th>Name</th></tr>";
                        while($row = $statement->fetch()){
                            echo "<tr><td>".$row['username']."</td>";
                            echo "<td>".$row['firstname']." ".$row['lastname']."</td></tr>";
                        }
                        echo "</table>";
                        $pdo = null;
                        $results = null;
                    }
                    else if (isset($_GET["email"]) && $_GET["email"] != ""){
                        $email = $_GET["email"];
                        echo "<h2>".$email."</h2>";

                        $sql = "SELECT username, email FROM users WHERE email LIKE ?";
                        $statement = $pdo->prepare($sql);
                        $statement->execute(["$email%"]);
                        echo "<table><tr><th>Username</th><th>Email</th></tr>";
                        while($row = $statement->fetch()){
                            echo "<tr><td>".$row['username']."</td>";
                            echo "<td>".$row['email']."</td></tr>";
                        }
                        echo "</table>";
                        $pdo = null;
                        $results = null;
                    }
                    else if (isset($_GET["post"]) && $_GET["post"] != ""){
                        $post = $_GET["post"];
                        echo "<h2>".$post."</h2>";

                        $sql = "SELECT username, ptitle FROM post WHERE ptitle LIKE ?";
                        $statement = $pdo->prepare($sql);
                        $statement->execute(["%$post%"]);
                        echo "<table><tr><th>Username/Post Owner</th><th>Post</th></tr>";
                        while($row = $statement->fetch()){
                            echo "<tr><td>".$row['username']."</td>";
                            echo "<td>".$row['ptitle']."</td></tr>";
                        }
                        echo "</table>";
                        $pdo = null;
                        $results = null;
                    }
                }
            ?>
    </div>
</div>
</div>
</body>
<?php include 'footer.php'; ?>
</html>