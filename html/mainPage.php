<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/mainPage.css">
    <link rel="stylesheet" href="../css/navBar.css">
    <title>Home Page</title>
</head>
<?php include 'navBar.php' ?>
<body>
<div id="breadcrumbs"></div>
<div class="columns">
    <div class="grid-container">
        <div class="grid-header">
            <h2>Categories</h2>
        </div>
        <div class="grid-entry">
            <?php
                $host = "localhost";
                $database = "DiscussionForumDB";
                $user = "webuser";
                $password = "P@ssw0rd";

                $connection = mysqli_connect($host, $user, $password, $database);
                $error = mysqli_connect_error();

                if($error != null)
                {
                    $output = "<p>Unable to connect to database!</p>";
                    exit($output);
                }
                else
                {
                    $sql = "SELECT DISTINCT category FROM subtopic";
                    $results = mysqli_query($connection, $sql);
                    while($row = mysqli_fetch_assoc($results))
                    {
                        // TODO: update link to redirect to correct page
                        echo "<a href=\"#catgeory=".$row["category"]."\">";
                        echo "<div class=\"grid-item\">".$row["category"];
                        echo "</div>";
                        echo "</a>";
                    }
                    mysqli_free_result($results);
                    mysqli_close($connection);
                }
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
                // TODO: sql query to retrieve subtopics
                $host = "localhost";
                $database = "DiscussionForumDB";
                $user = "webuser";
                $password = "P@ssw0rd";

                $connection = mysqli_connect($host, $user, $password, $database);
                $error = mysqli_connect_error();

                if($error != null)
                {
                  $output = "<p>Unable to connect to database!</p>";
                  exit($output);
                }
                else
                {
                    $userExists = False;
                    $sql = "SELECT title FROM subtopic";
                    $results = mysqli_query($connection, $sql);

                    while($row = mysqli_fetch_assoc($results))
                    {
                        // TODO: update link to redirect to correct page
                        echo "<a href=\"subtopics.php?title=".$row["title"]."\">";
                        echo "<div class=\"grid-item\">".$row["title"];
                        echo "</div>";
                        echo "</a>";

                    }
                    mysqli_free_result($results);
                mysqli_close($connection);
                }
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