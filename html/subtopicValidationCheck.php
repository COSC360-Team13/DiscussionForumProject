<!DOCTYPE html>
<html>
<?php
// This file is pointed from subtopicValidation.js
// subtopicValidation.js is pointed from newSubtopic.php

include 'config.php';

if(isset($_POST['title'])){
    $title = $_POST['title'];
    $statment = $pdo->prepare("SELECT COUNT(*) FROM subtopic WHERE title=:title");
    $statment->bindValue(':title', $title, PDO::PARAM_STR);
    $statment->execute();
    $column = $statment->fetchColumn();

    $response = "<p id='subtopicValidInner' style='color: green;'>Available</p>";
    if($column > 0)
        $response = "<p id='subtopicValidInner' style='color: red;'>Unavailable</p>";
    echo $response;
    exit();
}

?>
</html>