<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/mainPage.css">
    <title>Home Page</title>
</head>
<?php include 'navBar.php'; ?>
<body>
<div id="breadcrumbs"></div>
<div class="columns">
    <div class="grid-container">
        <div class="grid-header">
            <h2>Categories</h2>
        </div>
        <div class="grid-entry">
            <?php
                include 'config.php';
                $sql = "SELECT DISTINCT category FROM subtopic";
                $results = $pdo->query($sql);
                while($row = $results->fetch())
                {
                    // TODO: update link to redirect to correct page
                    echo "<a href=\"#catgeory=".$row["category"]."\">";
                    echo "<div class=\"grid-item\">".$row["category"];
                    echo "</div>";
                    echo "</a>";
                }
                $pdo = null;
                $results = null;
            ?>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-header center">
                <span></span>
                <h2>Subtopics</h2>
                <button class="newTopic">Create subtopic</button>
        </div>
        <div class="grid-entry">
            <?php
                include 'config.php';
                $sql = "SELECT title FROM subtopic";
                $results = $pdo->query($sql);
                while($row = $results->fetch())
                {
                    // TODO: update link to redirect to correct page
                    echo "<a href=\"subtopics.php?title=".$row["title"]."\">";
                    echo "<div class=\"grid-item\">".$row["title"];
                    echo "</div>";
                    echo "</a>";
                }
                $pdo = null;
                $results = null;
            ?>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-header">
            <h2>Ads</h2>
        </div>
        <div class="grid-entry">
            <a href="#"><div class="grid-item">3</div></a>
        </div>
    </div>
</div>

</body>
<footer>

</footer>
</html>