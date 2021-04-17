<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href = "../css/reset.css">
    <link rel = "stylesheet" href = "../css/posts.css">
    <title></title>
<?php include 'navBar.php'; ?>
  </head>
  <body style="margin-top:10em">
  <div id="breadcrumbs"></div>
  <div class="columns">
      <div class="grid-container">

    <?php
    include 'config.php';

    if($_SERVER["REQUEST_METHOD"] === "GET"){
            $pid = $_GET["pid"];
    }
    if(isset($pid))
    {
        $sql = "SELECT * FROM post WHERE pid = ?";
        $statement = $pdo->prepare($sql);
        $statement->execute(["$pid"]);
        if($statement->rowCount()>0)
        {
            while($row = $statement->fetch())
            {
                // TODO: update link to redirect to correct page
                echo "<div class=\"grid-header\">";
                echo "<h2 class=\"post-title\">".$row["ptitle"]."</h2>";
                echo "<div class=\"grid-entry\">";
                echo "<p class=\"post-content\">".$row["content"]."</p>";
                echo "<div class=\"grid-item\">";
                if (isset($_SESSION['user']) && $_SESSION['user'] !== "" ){
                    $user = $_SESSION['user'];
                    echo "<form method=\"POST\"id=\"mainForm\" action=\"commentInsert.php\">";
                    echo "<textarea name=\"comment\" placeholder=\"Begin typing your comment....\"></textarea><br>";
                    echo "<input type=\"hidden\" name=\"pid\" value=\"".$pid."\">";
                    echo "<input type=\"submit\" name=\"submit\" value=\"Submit\"></textarea>";
                    echo "</form>";
                }
                else{
                    echo "<button><a href=\"LoginPage.php\">Login</a></button>";
                }
                $sql = "SELECT post.username, comment FROM post JOIN comments ON pid = postid WHERE pid = ?";
                $statement2 = $pdo->prepare($sql);
                $statement2->execute(["$pid"]);
                echo "<h2 class=\"comment-title\">Comments</h2>";
                if($statement2->rowCount()>0)
                {
                    while($row2 = $statement2->fetch())
                    {
                        $username = $row2["username"];

                        $sql = "SELECT image FROM users WHERE username = ?";
                        $statement3 = $pdo->prepare($sql);
                        $statement3->execute(["$username"]);
                        $row3 = $statement3->fetch();
                        $image = $row3["image"];
                        echo "<div class=\"username\">";
                        echo "<img class=\"PP\" src=\"../images/user/".$image."\" alt=\"ProfilePic\" width=\"30px\" height=\"30px\" style=\"border-radius:15px\"><p>".$username."</p>";
                        echo "</div>";
                        echo "<div class=\"comment\">";
                        echo "<span></span>";
                        echo "<p>".$row2["comment"]."</p>";
                        echo "</div>";

                    }
                }
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        }
        else{
            echo "<h2 class=\"no-results\">No post found!</h2>";
        }
    }
    else{
        echo "<h2 class=\"no-results\">Bad Request</h2>";
    }
    $pdo = null;
    $results = null;

    ?>
            </div>
        </div>
    </div>
  </body>
  <?php include 'footer.php'; ?>
</html>