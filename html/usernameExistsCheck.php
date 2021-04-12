<!DOCTYPE html>
<html>
<?php
include 'config.php';

if(isset($_POST['username'])){
    $username = $_POST['username'];
    $statment = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username=:username");
    $statment->bindValue(':username', $username, PDO::PARAM_STR);
    $statment->execute();
    $column = $statment->fetchColumn();

    $response = "<p style='color: green;'>Available</p>";
    if($column > 0)
        $response = "<p style='color: red;'>Unavailable</p>";
    echo $response;
    exit();
}

?>
</html>