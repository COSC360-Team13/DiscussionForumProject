<!DOCTYPE html>
<html>
<?php
include 'config.php';

if(isset($_POST['email'])){
    $email = $_POST['email'];
    $statment = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email=:email");
    $statment->bindValue(':email', $email, PDO::PARAM_STR);
    $statment->execute();
    $column = $statment->fetchColumn();

    $response = "<p style='color: green;'>Valid email</p>";
    if($column > 0)
        $response = "<p style='color: red;'>Email already in use</p>";
    echo $response;
    exit();
}

?>
</html>