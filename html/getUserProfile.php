<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/profile.css">
    <?php
        if(isset($_GET['user'])){
            $user = $_GET['user'];
            echo "<title>".$user."</title>";
        }
    ?>
    <script type="text/javascript" src="../scripts/profile.js"></script>
    <?php include 'navBar.php'; ?>
</head>
<body style="margin-top:6em">
</br>
    <div class="grid-container">
        <div class="grid-entry">
            <div class="user_info">
                <?php
                include 'config.php';
                    $username = $user;
                    $sql = "SELECT * FROM users WHERE username='$username';";
                    $result = $pdo->query($sql);
                
                    while ($row = $result->fetch()) {
                        //first row is username, user since, profile pic, option to delete account
                        echo "<table><thead><tr><td>";
                        echo "<img src=\"../images/user/".$row['image']."\" alt=\"ProfilePic\" width=\"70px\" height=\"70px\" style=\"border-radius:35px\"> - ".$row['username']."</td>";
                        if (isset($_SESSION['user']) && $_SESSION['user'] === "admin"){
                            //check if user is already disabled
                            if ($row['disabled'] == 0){
                                echo "<td colspan=\"2\" class=\"banCell\"><a href=\"banUser.php?user=".$user."\" class=\"banButton\"><img src=\"../images/ban.png\" alt=\"Ban User\" height=\"25px\"></button>";
                            }
                            else{
                                echo "<td colspan=\"2\" class=\"banCell\"><a href=\"unbanUser.php?user=".$user."\" class=\"bannedButton\"><img id=\"unban\" onmouseleave=\"banImg()\" onmouseover=\"switchImg()\" src=\"../images/banned.png\" alt=\"User Banned\" height=\"25px\"></button>";
                            }
                        }
                        echo "</tr>";
                        echo "<tr><td>".$row['firstName']." ".$row['lastName']."</td></tr>";
                        echo "</tr></thead>";
                        
                        // # of post, comments, and points.. green background
                        $sql_numposts = "SELECT COUNT(pid) FROM post WHERE username='$username';";
                        $result_numposts = $pdo->query($sql_numposts);
                        if ($row_numposts = $result_numposts->fetch()){
                            $num_posts = $row_numposts[0];
                        }
                        else{
                            $num_posts = 0;
                        }
                        echo "<tfoot><tr>";
                        echo "<td>Posts: ".$num_posts."</td>";
                
                        $sql_numcomments = "SELECT COUNT(cid) FROM comments WHERE username='$username';";
                        $result_numcomments = $pdo->query($sql_numcomments);
                        if ($row_numcomments = $result_numcomments->fetch()){
                            $num_comments = $row_numcomments[0];
                        }
                        else{
                            $num_comments = 0;
                        }           
                        echo "<td>Comments: ".$num_comments."</td>";
                        echo "</tr></tfoot>";
                
                        echo "<tbody>"; 
                
                        echo "<tr id=\"username\"><td class=\"label\">Username</td>";
                        echo "<td id=\"useredit\">".$row['username']."</td></tr>";
                
                        echo "<tr id=\"password\"><td class=\"label\">Password</td>";
                        echo "<td id=\"passedit\">********</td></tr>";
                
                        echo "<tr id=\"email\"><td class=\"label\">Email</td>";
                        echo "<td id=\"emailedit\">".$row['email']."</td></tr>";
                
                        echo "</tbody>";
                        echo "</table>";
                    }     
                // }
                ?>
            </div>
        </div>

        <div class="grid-entry">
            <div class="user_history">
                <table>
                    <thead>
                        <tr>
                            <th class="tab">
                                <button class="tablinks" onclick="openTab(event, 'comments')">Comment History</button>
                            </th>
                            <th class="tab">
                                <button class="tablinks" onclick="openTab(event, 'posts')">Post History</button>
                            </th>
                        </tr>   
                    </thead>
                    <tbody id="comments" class="tabcontent">
                        <?php include 'config.php';
                                $username =$user;

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
                                        $sign = "+ ";
                                        $color = "green";
                                    }
                                    else{
                                        $sign = "- ";
                                        $color ="red";
                                    }

                                    echo "<tr><td class=\"commentOn\">Comment On:</td>";
                                    echo "<td>".$postTitle."</td></tr>";
                                    echo "<tr><td class=\"votes\">Votes:</td>";
                                    echo "<td style=\"color:".$color."\">".$sign.$votes."</td>";
                                    echo "<td>".$comment."</td></tr>";   
                                }
                        ?>
                    </tbody>
                    <tbody id="posts" class="tabcontent">
                        <?php include 'config.php';

                            $username = $user;
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
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
<?php include 'footer.php'; ?>
</html>