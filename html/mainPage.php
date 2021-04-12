<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/mainPage.css">
    <title>Home Page</title>
</head>
<header>
    <nav class="navbar">
        <div class="logo"><a href="mainPageOld.html"><img src="" alt="HomepageLogo"></a></div>
        <div class="searchbar">
            <input type="text" placeholder="Search for Bears..." \></div>
        <div class="account">
            <?php include 'session.php'; ?>
        </div>
    </nav>
</header>
<body>
<div id="breadcrumbs"></div>
<div class="columns">
    <div class="grid-container">
        <div class="grid-header"><h2>Categories</h2></div>
        <div class="grid-entry">
            <div class="grid-item">1</div>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-header center">
                <span></span>
                <h2>Subtopics</h2>
                <button class="newTopic">Create subtopic</button>
        </div>
        <div class="grid-entry">
            <a href="#"><div class="grid-item">2</div></a>
        </div>
    </div>
    <div class="grid-container">
        <div class="grid-header right"><h2>Ads</h2></div>
        <div class="grid-entry">
            <div class="grid-item">3</div>
        </div>
    </div>
</div>

</body>
<footer>

</footer>
</html>