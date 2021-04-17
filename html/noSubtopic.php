<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/noSubtopic.css">
        <title>Subtopic</title>
    </head>
    <?php include 'navBar.php'; ?>
    <body style="margin-top: 7em">
        <div class="content">    
            <h1>This subtopic doesn't exist. Would you like to create it?</h1>
            <button class='newTopic'>
                <a href='newSubtopic.php'>Create Subtopic</a>
            </button>
            <?php
            /*
                if ($_SERVER["REQUEST_METHOD"] === "GET"){
                    $subtopic = isset($_GET["title"]) ? $_GET["title"] : "";
                    $subtopic = "";
                    if (empty($subtopic)) {
                        // Redirect
                        echo "<button class='newTopic'><a href='createSubtopic.php'>Create Subtopic</a></button>";
                    }
                    else {
                        echo "<button><a href='createSubtopic.php?title=$subtopic'>Create $subtopic</a></button>";
                    }
                }
            */
            ?>
        </div>
    </body>
        <?php include 'footer.php'; ?>
</html>