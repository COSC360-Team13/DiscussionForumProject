<!DOCTYPE html>
<html>
<?php
include 'config.php'
if(isset($_POST['username'])){
    $username = $_POST['username'];
    $statment = $pdo->prepare("SELECT COUNT(*) AS countUser FROM user WHERE username=:username");
    $statment->bindValue(':username', $username, PDO::PARAM_STR);
    $statment->execute();
    $row = $statment->fetchColumn();

    $response = "<p style='color: green;'>Available</p>";
    if($row > 0)
        $response = "<p style='color: red;'>Unavailable</p>";
    echo $response;
    exit();
}

?>
</html>