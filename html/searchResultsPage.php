<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/searchResults.css">
    <title>Search Results</title>
</head>
<?php include 'navBar.php'; ?>
<body>
<div class="main">
<div id="breadcrumbs"></div>
<div class="columns">
    <div class="grid-container">
        <div class="grid-header">
            <h2>About</h2>
        </div>
        <div class="grid-entry">
            <div class="grid-item">1</div>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-header center">
            <button class="button top">Top</button>
            <button class="button new">New</button>
            <h2>Subtopics</h2>
            <button class="button create">Create</button>
        </div>
        <div class="grid-entry">
            <div class="grid-item">Thing</div>
            <?php include 'config.php';
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
</div>

</body>
<footer>

</footer>
</html>