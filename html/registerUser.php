<!DOCTYPE html>
<html>
<?php

$host = "localhost";
$database = "DiscussionForumDB";
$user = "webuser";
$password = "P@ssw0rd";

$connection = mysqli_connect($host, $user, $password, $database);
$error = mysqli_connect_error();
if($error != null)
{
  $output = "<p>Unable to connect to database!</p>";
  exit($output);
}
else
{
    $userExists = False;
    $sql = "SELECT username, email FROM users";

    $results = mysqli_query($connection, $sql);
    // Check if server request is using the correct Post method

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        // retrieve all post request variables
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if(!empty($firstname) && !empty($lastname) && !empty($username) && !empty($email) && !empty($password))
            while($row = mysqli_fetch_assoc($results))
            {
                //echo "username: ".$row["username"]." email: ".$row["email"];
                if($row["username"] === $username || $row["email"] === $email)
                {
                    $userExists = true;
                    break;
                }

            }
            mysqli_free_result($results);
            if($userExists)
                {
                    header("Location: registrationPage.php");
//                     echo "<a href=\"registrationPage.php?firstname=".$firstname."&lastname=".$lastname."&email=".$email."&userExists\">Return to user registration</a>";
                }
                else
                {
                    echo "We did it";
//                     mysqli_autocommit($connection, FALSE);
//                     mysqli_begin_transaction($connection);
//                     try {
//                         $stmt = mysqli_prepare($connection, 'INSERT INTO users (firstname, lastname, username, email, password) VALUES (?,?,?,?,?)');
//                         mysqli_stmt_bind_param($stmt, 'sssss', $firstname, $lastname, $username, $email, md5($password));
//                         mysqli_stmt_execute($stmt);
//                         mysqli_commit($connection);
//                         echo "An account for the user ".$firstname." has been created";
//                     } catch (mysqli_sql_exception $exception) {
//                         mysqli_rollback($mysqli);
//                         throw $exception;
//                     }
                }
    }
    else
    {
        echo "Bad request";
    }

    mysqli_close($connection);
}
?>
</html>