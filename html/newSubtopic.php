<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/newSubtopic.css">
    <title>Create Subtopic</title>
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <!-- In the event that jquery doesnt load through the web. -->
    <script type="text/javascript" src="../scripts/jquery-3.1.1.min.js"></script>
    <script type="text/javascript" src="../scripts/subtopicValidation.js"></script>
</head>
<?php include 'navBar.php'; ?>
<body style="margin-top: 5em">
    <div id="breadcrumbs"></div>
<form method="POST" action="registerSubtopic.php" id="mainForm">
    <div class="columns">
        <div class="grid-container">
            <div class="grid-header">
                <h2>Select the Category</h2>
            </div>
            <div class="grid-entry">
                <select name="category" id="category-select" required multiple>
                    <?php
                        include 'config.php';
                        $sql = "SELECT category FROM category";
                        $results = $pdo->query($sql);
                        while($row = $results->fetch())
                        {
                            // Category selection
                            $category = $row["category"];
                            
                            //echo "<div class='grid-item'>";
                            echo "<option value='$category'>".$category;
                            echo "</option>";
                            //echo "</div>";
                            
                        }
                        $pdo = null;
                        $results = null;
                    ?>
                </select>
            </div>
        </div>
        <div class="grid-container">
            <div class="grid-header center">
                <span></span>
                <h2>Create your Subtopic</h2>
            </div>
            <div class="grid-entry">
                <input type="text" name="title" id="title" placeholder="Title..." maxlength="25" pattern="[A-z0-9_\s]{1,}" class="required" required/>
                <div id="subtopicValid"></div>
                <div id="title-counter"></div>
                <div>*Letters, numbers, underscore, and whitespace is allowed</div>
                <div id="color-select">
                    <label for="color">Subtopic Style:</label>
                    <input type="color" name="color" id="color" value="#92EAA6"/>
                    </br>
                    <label>Text color:</label>
                    <input type="radio" name="text-color" class="color-text" value="black" checked="checked" />Black
                    <input type="radio" name="text-color" class="color-text" value="white" />White
                </div>
            </div>
            <div class="grid-entry">
                <input type="submit" id="submit"/>
            </div>
        </div>
        <div class="grid-container">
            <div class="grid-header">
                <h2>Write what it's About</h2>
            </div>
            <div class="grid-entry">
                <textarea name="about" id="about" placeholder="About Subtopic..." maxlength="1000" required></textarea>
                <div id="about-counter"></div>
            </div>
        </div>
    </div>
</form>
</body>
    <?php include 'footer.php'; ?>
</html>