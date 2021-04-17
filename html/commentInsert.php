<!DOCTYPE html>
<link rel="stylesheet" href="../css/reset.css">
<html>
<body style="margin-top:10em">
<?php
include 'navBar.php';
include 'config.php';
if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST['comment']) && isset($_SESSION['user']) && $_SESSION['user'] !== "" && isset($_POST['pid'])){
        $comment = $_POST['comment'];
        $user = $_SESSION['user'];
        echo "user";
        $pid = $_POST['pid'];
        $statement = $pdo->prepare("INSERT INTO comments (username, comment, postid) VALUES (?, ?, ?)");
        $statement->execute([$user, $comment, $pid]);
        $url = "posts.php?pid=".$pid;
        $url = "posts.php?pid=".$pid;
        header('Location: '.$url);
    }
}
else
{
echo "<h2>Bad Request</h2>";
}

?>
</body>
</html>