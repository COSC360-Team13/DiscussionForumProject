<?php include 'subtopicExistsCheck.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/subtopics.css">
    <title>Subtopic</title>
</head>
<?php include 'navBar.php'; ?>
<body style="margin-top: 5em">
<?php
    include 'config.php';
    
    $statement = $pdo->prepare("SELECT * FROM subtopic WHERE title=:subtopic");
    $statement->bindValue(':subtopic', $subtopic, PDO::PARAM_STR);
    $statement->execute();
    
    while($row = $statement->fetch())
    {
        $about = $row['about'];
        $date = explode(' ', $row['date']);
        $date = explode('-', $date[0]);
        $date = date("jS \of F Y", mktime(0,0,0,$date[1], $date[2], $date[0]));
        // $image = $row['image'];
    }
    $pdo = null;
    $statement = null;
?>
<div id="breadcrumbs"></div>
<div class="columns">
    <!-- About Subtopic -->
    <div class="grid-container">
        <div class="grid-header">
            <h2>About</h2>
        </div>
        <div class="grid-entry">
            <div class="about">
                <?php echo $about ?>
                <hr/>
                <?php echo "Created ". $date ?>
                <br/>
                <button><a href="#">Join</a></button>
            </div>
        </div>
    </div>
    <!-- Posts of subtopic -->
    <div class="grid-container">
        <div class="grid-header center">
            <button>Top</button>
            <button>Newest</button>
            <button>Create Post</button>
            <form>
                <table><tr>
                    <td><button id="search">Search</button></td>
                    <td><input id="mysearch" type="text"></td>
                </tr></table>
            </form>
        </div>
        <div class="grid-entry">
            <?php
                include 'config.php';

                /*$statement = $pdo->prepare("SELECT pid, ptitle, username, date, count(comment) AS comments 
                    FROM post LEFT OUTER JOIN comments 
                    WHERE title=:subtopic
                    GROUP BY pid, ptitle, username, date");*/
                $statement = $pdo->prepare("SELECT * FROM post WHERE title=:subtopic");
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
                    //$comments = $row['comments'];
                    $comments = 15;
                    ?>
                    <div class='grid-item post'>
                        <div class="grid-votes">
                            <table>
                                <tr><td><button class="votes"><img src="" alt="up"></button><td><tr>
                                <tr><td><?php echo $row['upvotes'] ?></td><tr>
                                <tr><td><button class="votes"><img src="" alt="up"></button><td><tr>
                            </table>
                        </div>
                        <div class="grid-post">
                            <table>
                                <tr>
                                    <td colspan="2"><?php echo "<a href='posts.php?pid=".$pid."'>My top grizzlies in the world which is pretty cool</a>"; ?></td>
                                </tr>
                                <tr class="post-data">
                                    <td><?php echo "Posted on ".$pdate; ?></td>
                                    <td><?php echo "By ".$username; ?></td>
                                </tr>
                                <tr class="post-btn">
                                    <td><?php echo "<a href='posts.php?pid=".$pid."'><button>".$comments." comments</button></a>"; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <?php
                }
                $pdo = null;
                $statement = null;
            ?>
        </div>
    </div>
    <!-- Top comment section of posts -->
    <div class="grid-container">
        <div class="grid-header">
            <h2>Top Comments</h2>
        </div>
        <div class="grid-entry">
            <div class="grid-item">
                <div class="top-comment">
                    3
                </div>
            </div>
        </div>
    </div>
</div>

</body>
<footer>

</footer>
</html>