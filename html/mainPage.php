<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/mainPage.css">
    <link rel="stylesheet" href="../css/reset.css">
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- In the event that jquery doesnt load through the web. -->
    <script type="text/javascript" src="../scripts/jquery-3.1.1.min.js"></script>
    <?php include 'navBar.php';?>
    <title>Home Page</title>
</head>
<body style="margin-top:5em">
<div id="breadcrumbs"></div>
<div id="subtopic-title"><i><b>Welcome to: The Bear Cave</b></i></div>
<div class="columns">
    <div class="grid-container">
        <div class="grid-header left">
            <h2>Categories</h2>
        </div>
        <div class="grid-entry">
            <?php
                include 'config.php';
                $sql = "SELECT DISTINCT category FROM subtopic LIMIT 10";
                $results = $pdo->query($sql);
                while($row = $results->fetch())
                {
                    // TODO: update link to redirect to correct page
                    echo "<a href=\"searchResultsPage.php?category=".$row["category"]."\">";
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
                <button class="newTopic" onclick="createNewTopic()">Create subtopic +</button>
        </div>
        <div class="grid-entry">
            <?php
                include 'config.php';
                $sql = "SELECT title FROM subtopic LIMIT 10";
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
</div>
</body>
<?php include 'footer.php'; ?>

</html>