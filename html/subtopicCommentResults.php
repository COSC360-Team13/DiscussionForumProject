<?php
$filter = "";
if ($_SERVER["REQUEST_METHOD"] === "GET"){
    $filter = $_GET['filter']?? "Top";
    $subtopic = $_GET['subtopic']?? $subtopic;
}else {
    $filter = "Top";
}

include 'config.php';

$sql = "SELECT pid, comment, MAX(comments.upvotes)
    FROM post LEFT OUTER JOIN comments ON pid = postid
    WHERE title=:subtopic";

if(in_array($filter, array('Newest','Oldest','Top'))){
    $sql = $sql." GROUP BY pid, comment";
    if($filter == "Newest")
        $sql = $sql." ORDER BY post.date DESC";
    else if ($filter == "Oldest")
        $sql = $sql." ORDER BY post.date ASC";
    else if ($filter == "Top")
        $sql = $sql." ORDER BY post.upvotes DESC";
}else {
    $sql = $sql." AND ptitle LIKE '%$filter%'";
    $sql = $sql." GROUP BY pid, comment";
}

$statement = $pdo->prepare($sql);
$statement->bindValue(':subtopic', $subtopic, PDO::PARAM_STR);
$statement->execute();

while($row = $statement->fetch())
{
    $comment = $row['comment']?? "<i>No comments</i>";
    
    echo "<div class='grid-item'>";
        echo "<div class='top-comment'>";
            echo $comment;
        echo "</div>";
    echo "</div>";
}
$pdo = null;
$statement = null;
?>