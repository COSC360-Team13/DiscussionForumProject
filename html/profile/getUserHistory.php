<!DOCTYPE html>
<html>
<?php
include 'config.php';

if(isset($_SESSION['user']) && $_SESSION['user'] !== "" ){
    $username = $_SESSION['user'];

    //start with comments
    $sql = "SELECT ptitle, comments.upvotes, comments.downvotes, comment
            FROM comments JOIN post ON comments.postid = post.pid
            WHERE comments.username='$username'
            ORDER BY comments.date DESC
            LIMIT 3;";
    $result = $pdo->query($sql);
    echo "<tr><th>Comments</th></tr>";
    while ($row = $result->fetch()) {
        $comment = $row['comment'];
        $postTitle = $row['ptitle'];
        $votes = $row[1] - $row[2];
        $sign = "";
        $color = "black";
        if ($votes > 0){
            $sign = "+";
            $color = "green";
        }
        else{
            $color ="red";
        }

        echo "<tr><td class=\"commentOn\">Comment On:</td>";
        echo "<td>".$postTitle."</td></tr>";
        echo "<tr><td class=\"votes\">Votes:</td>";
        echo "<td style=\"color:".$color."\">".$sign.$votes."</td>";
        echo "<td>".$comment."</td></tr>";
    }
    
}

?>
</html>