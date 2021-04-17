<!DOCTYPE html>
<html>
<?php
include 'config.php';

if(isset($_SESSION['user']) && $_SESSION['user'] !== "" ){
    $username = $_SESSION['user'];
    //now we do posts
    $sql = "SELECT ptitle, post.upvotes, post.downvotes, COUNT(cid)
            FROM post JOIN comments ON comments.postid = post.pid
            WHERE post.username='$username'
            GROUP BY ptitle
            ORDER BY post.date DESC;
            LIMIT 3;";
    $result_post = $pdo->query($sql);
    echo "<tr><th>Posts</th></tr>";
    while ($row = $result_post->fetch()) {
        $numComments = $row[3];
        $postTitle = $row['ptitle'];
        $votes = $row[1] - $row[2];
        $sign = "";
        $color = "black";
        if ($votes > 0){
            $sign = "+ ";
            $color = "green";
        }
        else{
            $sign = "- ";
            $color ="red";
        }

        echo "<tr><td class=\"commentOn\">Post:</td>";
        echo "<td>".$postTitle."</td></tr>";
        echo "<tr><td class=\"votes\">Votes:</td>";
        echo "<td style=\"color:".$color."\">".$sign.$votes."</td>";
        echo "<td>".$numComments." Comment(s)</td></tr>";

    }
        
    
}

?>
</html>