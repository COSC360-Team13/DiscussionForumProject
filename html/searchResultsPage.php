<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/searchResults.css">
    <title>Search Results</title>
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- In the event that jquery doesnt load through the web. -->
    <script type="text/javascript" src="../scripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../scripts/joinButton.js"></script>
    <script type="text/javascript" src="../scripts/createNewTopicButton.js"></script>
</head>
<?php
include 'navBar.php';
?>
<body style="margin-top:7em">

<div class="main">
<div id="breadcrumbs"></div>
<div id="keyword">
<?php
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        $subtopic = $_GET["searchTerm"]?? "";
        $category = $_GET["category"]?? "";
        $filter = $_GET["filter"]?? "Relevance";
    }
    echo "<img src='../images/search.png'>";
    if($subtopic != ""){
        echo "<h2>".$subtopic."</h2>";
    }
    else if ($category != "")
    {
        echo "<h2>".$category."</h2>";
    }
    else
    {
        echo "<h2>All Results</h2>";
    }

?>
</div>
<div class="columns">
    <div class="grid-container">
        <form method="GET">
            <div class="grid-header">
                <div><label>SORT BY</label>
                    <select name="filter" id="filter">
                        <option value="Relevance">Relevance</option>
                        <option value="Newest">Newest</option>
                        <option value="Oldest">Oldest</option>
                    </select>
                </div>
                <?php echo "<input type=\"hidden\" id=\"searchTerm\" name=\"searchTerm\" value=\"".$subtopic."\">"; ?>
                <input type="submit" id="submit" value="Filter">
            </div>
        </form>
            <?php include 'config.php';
                echo "<div class=\"grid-entry\">";
                 if(isset($subtopic)){
                    $sql = "SELECT title, about FROM subtopic WHERE title LIKE ?";
                    if(isset($filter)){
                        if($filter == "Newest")
                            $sql = $sql." ORDER BY date DESC, category DESC";
                        else if ($filter == "Oldest")
                            $sql = $sql." ORDER BY date ASC, category ASC";
                        $statement = $pdo->prepare($sql);
                        $statement->execute(["%$subtopic%"]);
                    }
                    if($statement->rowCount()>0)
                    {
                        while($row = $statement->fetch())
                        {
                            // TODO: update link to redirect to correct page
                            echo "<a href=\"subtopics.php?title=".$row["title"]."\">";
                                echo "<div class=\"grid-item\">";
                                    echo "<div class=\"title\">".$row["title"];
                                        echo "<div class=\"about\">".$row["about"];
                                        echo "</div>";
                                    echo "</div>";
                                echo "</div>";
                            echo "</a>";
                        }
                    }
                    else{
                       echo "<h2 class=\"no-results\">No results found!</h2>";
                    }
                    $pdo = null;
                    $results = null;
                 }
                 else if (isset($category)){
                    $sql = "SELECT title, about FROM subtopic WHERE category LIKE ?";
                    if(isset($filter)){
                        if($filter == "Newest")
                            $sql = $sql." ORDER BY date DESC, category DESC";
                        else if ($filter == "Oldest")
                            $sql = $sql." ORDER BY date ASC, category ASC";
                        $statement = $pdo->prepare($sql);
                        $statement->execute(["%$category%"]);
                        }
                        if($statement->rowCount()>0)
                        {
                            while($row = $statement->fetch())
                            {
                                // TODO: update link to redirect to correct page
                                echo "<a href=\"subtopics.php?title=".$row["title"]."\">";
                                    echo "<div class=\"grid-item\">";
                                        echo "<div class=\"title\">".$row["title"];
                                            echo "<div class=\"about\">".$row["about"];
                                                echo "</div>";
                                            echo "</div>";
                                    echo "</div>";
                                echo "</a>";
                            }
                        }
                 }
            echo "</div>";
            ?>
    </div>
    <div class="grid-container">
        <div class="grid-entry right">
            <img src="" alt="CreateNewTopic">
            <p>Have an idea for a new community?</p>
            <button class="newTopic" onclick="createNewTopic()">Create subtopic +</button>
        </div>
    </div>
</div>
</div>
</body>
<?php include 'footer.php'; ?>
</html>