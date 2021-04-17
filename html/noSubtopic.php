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
            <h1>This subtopic doesn't exist.</h1>
            <?php
            if (isset($_SESSION['user']) && $_SESSION['user'] !== ""){ 
                echo "<h1>Would you like to create it?</h1>";
                echo "<button class='newTopic'><a href='newSubtopic.php'>Create Subtopic</a></button>"; 
            }else {
                echo "<button class='newTopic'><a href='mainPage.php'>Return Home</a></button>";
            }
            
            ?>
        </div>
    </body>
        <?php include 'footer.php'; ?>
</html>