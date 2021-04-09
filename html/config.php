<?php
// Create connection
try{
   $connString = "mysql:host=localhost;dbname=DiscussionForumDB";
   $username = "webuser";
   $password = "P@ssw0rd";
   $pdo = new PDO($connString,$username,$password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
   die('Unable to connect with the database');
}
?>