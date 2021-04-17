<?php include 'subtopicExistsCheck.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/subtopics.css">
    <title>Subtopic</title>
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- In the event that jquery doesnt load through the web. -->
    <script type="text/javascript" src="../scripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../scripts/joinButton.js"></script>
    <script type="text/javascript" src="../scripts/subtopics.js"></script>
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
        $color = $row['color'];
        $textColor = $row['textColor'];
        $date = explode(' ', $row['date']);
        $date = explode('-', $date[0]);
        $date = date("jS \of F Y", mktime(0,0,0,$date[1], $date[2], $date[0]));
        // $image = $row['image'];
    }
    $pdo = null;
    $statement = null;
?>
<script>
    $(document).ready(function(){
        $("header").css("background-color", "<?php echo $color; ?>");
        $(".grid-header").css("background-color", "<?php echo $color; ?>");
        $(".grid-header").css("color", "<?php echo $textColor; ?>");
        $(".grid-votes").css("background-color", "<?php echo $color; ?>");
        $(".grid-votes").css("color", "<?php echo $textColor; ?>");
        $("footer").css("background-color", "<?php echo $color; ?>");
        $("footer").css("color", "<?php echo $textColor; ?>");
    });
</script>
<div id="breadcrumbs"></div>
<div id="subtopic-title"><i><b>Welcome to: <?php echo $subtopic; ?></b></i></div>
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
            </div>
        </div>
    </div>
    <!-- Posts of subtopic -->
    <div class="grid-container">
        <div class="grid-header center">
            <button onclick="showPosts('Top', '<?php echo $subtopic ?>', '<?php echo $color; ?>', '<?php echo $textColor; ?>'); showComments('Top', '<?php echo $subtopic ?>', '<?php echo $color; ?>', '<?php echo $textColor; ?>');" >Top</button>
            <button onclick="showPosts('Newest', '<?php echo $subtopic ?>', '<?php echo $color; ?>', '<?php echo $textColor; ?>'); showComments('Newest', '<?php echo $subtopic ?>', '<?php echo $color; ?>', '<?php echo $textColor; ?>');">Newest</button>
            <button onclick="showPosts('Oldest', '<?php echo $subtopic ?>', '<?php echo $color; ?>', '<?php echo $textColor; ?>'); showComments('Oldest', '<?php echo $subtopic ?>', '<?php echo $color; ?>', '<?php echo $textColor; ?>');">Oldest</button>
            <?php
                if (isset($_SESSION['user']) && $_SESSION['user'] !== "" ) {
                    echo "<button><a href='createpost.php'>Create Post</a></button>";
                }else {
                    echo "<div></div>";
                }
            ?>
            <div></div>
            <button id="search" onclick="showPosts('Top', '<?php echo $subtopic ?>', '<?php echo $color; ?>', '<?php echo $textColor; ?>'); showComments('Top', '<?php echo $subtopic ?>', '<?php echo $color; ?>', '<?php echo $textColor; ?>');">Reset</button>
            <input id="mysearch" type="text" placeholder="Search for posts..." onkeyup="showPosts($('#mysearch').val(), '<?php echo $subtopic ?>', '<?php echo $color; ?>', '<?php echo $textColor; ?>'); showComments($('#mysearch').val(), '<?php echo $subtopic ?>', '<?php echo $color; ?>', '<?php echo $textColor; ?>')">
        </div>
        <div class="grid-entry" id="center-posts">
            <?php
                include "subtopicResults.php";
            ?>
        </div>
    </div>
    <!-- Top comment section of posts -->
    <div class="grid-container">
        <div class="grid-header">
            <h2>Top Comments</h2>
        </div>
        <div class="grid-entry" id="right-comments">
            <?php
                include "subtopicCommentResults.php";
            ?>
        </div>
    </div>
</div>
</body>
    <?php include 'footer.php'; ?>
</html>