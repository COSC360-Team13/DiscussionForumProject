<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/searchResults.css">
    <link rel="stylesheet" href="../css/joinButton.js">
    <title>Search Results</title>
</head>
<?php include 'navBar.php'; ?>
<body style="margin-top:5em">
<div class="main">
<div id="breadcrumbs"></div>
<div class="columns">
    <div class="grid-container">
        <div class="grid-header">
            <div><p>SORT BY</p></div>
            <div><p>POSTS FROM</p></div>
        </div>
            <?php include 'config.php';
                echo "<div class=\"grid-entry\">";
                 if($_SERVER["REQUEST_METHOD"] === "GET"){
                    $subtopic = $_GET["searchTerm"];
                    $statement = $pdo->prepare("SELECT title, about, image FROM subtopic WHERE title LIKE ?");
                    $statement->execute(["%$subtopic%"]);
                    while($row = $statement->fetch())
                    {
                        // TODO: update link to redirect to correct page


                        echo "<div class=\"grid-item\">";
                        echo "<a href=\"subtopics.php?title=".$row["title"]."\">";
                        echo "<div class=\"separator\">";
                        echo "<div class=\"image\"><img src=\"".$row["image"]."\" alt=\"Place Holder\">";
                        echo "</div>";
                        echo "<div class=\"title\">".$row["title"];
                        echo "<div class=\"about\">".$row["about"];
                        echo "</div>";
                        echo "</div>";
                        echo "</div>";
                        echo "</a>";
                        echo "<div class=\"join\"><button onclick=\"join()\">Join</button></div>";
                        echo "</div>";
                    }
                    $pdo = null;
                    $results = null;
                 }
                 echo "</div>";
                    ?>
    </div>
    <div class="grid-container">
        <div class="grid-entry right">
            <img src="" alt="CreateNewTopic">
            <p>Have an idea for a new community?</p>
            <button class="newTopic">Create subtopic +</button>
        </div>
    </div>
</div>
</div>

</body>
<?php include 'footer.php'; ?>
</html>