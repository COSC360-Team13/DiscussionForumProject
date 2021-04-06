<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/mainPage.css">
    <link rel="stylesheet" href="../css/navBar.css">
    <title>Home Page</title>
</head>
<header>
    <nav class="navbar">
        <div class="logo"><a href="mainPage.php"><img src="" alt="HomepageLogo"></a></div>
        <div class="searchbar">
            <input type="text" placeholder="Search for Bears..." \></div>
        <div class="account"><button><img src="" alt="Account"></button></div>
    </nav>
</header>
<body>
<div id="breadcrumbs"></div>
<div class="columns">
    <div class="grid-container">
        <div class="grid-header"><h2>Categories</h2></div>
        <div class="grid-entry">
            <a href="#"><div class="grid-item">1</div></a>
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
                echo "<a href=\"#\">";
                echo "<div class=\"grid-item\">";
                echo "</div>";
                echo "</a>";
            ?>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-header right"><h2>Ads</h2></div>
        <div class="grid-entry">
            <a href="#"><div class="grid-item">3</div></a>
        </div>
    </div>
</div>

</body>
<footer>

</footer>
</html>