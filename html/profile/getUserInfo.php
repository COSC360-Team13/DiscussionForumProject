
<?php
include 'config.php';

if(isset($_SESSION['user']) && $_SESSION['user'] !== "" ){
    $username = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE username='$username';";
    $result = $pdo->query($sql);

    while ($row = $result->fetch()) {
        //first row is username, user since, profile pic, option to delete account
        echo "<table><thead><tr><td>";
        echo "<img src=\"../images/user/".$row['image']."\" alt=\"ProfilePic\" width=\"70px\" height=\"70px\" style=\"border-radius:35px\> - ".$row['username'];
        echo "</td></tr>";
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
        echo "<tr><th colspan=\"3\" class=\"edit\">";
        echo "<button class=\"edit\" onclick=\"addChangeButtons()\">Edit Info</button>";
        echo "</th></tr>"; 

        echo "<tr id=\"username\"><td class=\"label\">Username</td>";
        echo "<td id=\"useredit\">".$row['username']."</td></tr>";

        echo "<tr id=\"password\"><td class=\"label\">Password</td>";
        echo "<td id=\"passedit\">********</td></tr>";

        echo "<tr id=\"email\"><td class=\"label\">Email</td>";
        echo "<td id=\"emailedit\">".$row['email']."</td></tr>";

        echo "</tbody>";
        echo "</table>";
    }     
}
?>
