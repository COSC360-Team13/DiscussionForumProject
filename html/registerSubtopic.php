<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="../css/registerSubtopic.css">
    </head>
    <?php include 'navBar.php'; ?>
    <body style="margin-top: 5em">
        <?php
            include 'config.php';
            
            if($_SERVER["REQUEST_METHOD"] === "POST"){
                $category = $_POST["category"];
                $title = $_POST["title"];
                $color = $_POST["color"];
                $textColor = $_POST["text-color"];
                $about = ($_POST["about"]);
                $date = date("Y-m-d");
                
                $sql = "INSERT INTO subtopic (title, date, color, textColor, about, category) VALUES (?, ?, ?, ?, ?, ?)";
                $statement = $pdo->prepare($sql);
                $statement->execute([$title, $date, $color, $textColor, $about, $category]);
                echo "<div class=\"welcome\"><h2>Thank you for contributing to the Bear Cave</h2></div>";
                echo "<div class=\"returnButton\"><a href=\"subtopics.php?title=$title\">Go to your Subtopic</a></div>";
                
            }
            else
            {
                echo "Bad request";
            }
        ?>
</body>
    <?php include 'footer.php'; ?>
</html>