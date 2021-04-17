<?php
$filter = "";
if ($_SERVER["REQUEST_METHOD"] === "GET"){
    $filter = $_GET['filter']?? "Top";
    $subtopic = $_GET['subtopic']?? $subtopic;
    $color = $_GET['color']?? $color;
    $textColor = $_GET['textColor']?? $textColor;
}else {
    $filter = "Top";
}

include 'config.php';

$sql = "SELECT pid, ptitle, post.username, post.date, post.upvotes, post.downvotes, count(cid) AS comments 
    FROM post LEFT OUTER JOIN comments ON pid = postid
    WHERE title=:subtopic";

if(in_array($filter, array('Newest','Oldest','Top'))){
    $sql = $sql." GROUP BY pid, ptitle, username, date, upvotes, downvotes";
    if($filter == "Newest")
        $sql = $sql." ORDER BY date DESC";
    else if ($filter == "Oldest")
        $sql = $sql." ORDER BY date ASC";
    else if ($filter == "Top")
        $sql = $sql." ORDER BY upvotes DESC";
}else {
    $sql = $sql." AND ptitle LIKE '%$filter%'";
    $sql = $sql." GROUP BY pid, ptitle, username, date, upvotes, downvotes";
}

$statement = $pdo->prepare($sql);
$statement->bindValue(':subtopic', $subtopic, PDO::PARAM_STR);
$statement->execute();

while($row = $statement->fetch())
{
    $pid = $row['pid'];
    $ptitle = $row['ptitle'];
    $pdate = explode(' ', $row['date']);
    $pdate = explode('-', $pdate[0]);
    $pdate = date("jS \of F Y", mktime(0,0,0,$pdate[1], $pdate[2], $pdate[0]));
    $username = $row['username'];
    $comments = $row['comments'];
    $votes = $row['upvotes'] - $row['downvotes'];


    ?>
    <div class='grid-item post'>
        <div class="grid-votes" style="background-color:<?php echo $color; ?>;color:<?php echo $textColor; ?>">
            <?php
                if (isset($_SESSION['user']) && $_SESSION['user'] !== "" ) {
                    echo "<button class='votes' onclick='vote(this.nextElementSibling, $pid, \"up\")'><img src='../images/upvote.png' alt='up'></button>";
                    echo "<div>$votes</div>";
                    echo "<button class='votes' onclick='vote(this.previousElementSibling, $pid, \"down\")'><img src='../images/downvote.png' alt='down'></button>";
                }else {
                    echo "<button class='votes' onclick='alert(\"You need an account to vote\")'><img src='../images/upvote.png' alt='up'></button>";
                    echo "<div>$votes</div>";
                    echo "<button class='votes' onclick='alert(\"You need an account to vote\")'><img src='../images/downvote.png' alt='down'></button>";
                }
            ?>        
        </div>
        <div class="grid-post">
            
                <div class="post-title">
                    <?php echo "<a href='posts.php?pid=".$pid."'>".$ptitle."</a>"; ?>
                </div>
                <div class="post-data">
                    <?php echo "<div>Posted on ".$pdate."</div>"; ?>
                    <?php echo "<div>By ".$username."</div>"; ?>
                </div>
                <div class="post-btn">
                    <?php echo "<a href='posts.php?pid=".$pid."'><button>".$comments." comments</button></a>"; ?>
                </div>
            
        </div>
    </div>
    <?php
}
$pdo = null;
$statement = null;
?>
</html>