<head>
<link rel="stylesheet" href="../css/navBar.css">
<script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
<!-- In the event that jquery doesnt load through the web. -->
<script type="text/javascript" src="../scripts/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="../scripts/searchBar.js"></script>
<script type="text/javascript" src="../scripts/createNewTopicButton.js"></script>
</head>
<header>
    <div class="navbar">
        <div class="logo"><a href="mainPage.php"><img src="../images/logo.png" alt="HomepageLogo"></a></div>
        <div class="searchbar">
            <input type="text" id="searchTerm" placeholder="Search for Bears..." \><button class="searchButton" onclick="search()">Search</button></div>
        <div class="account"><?php include 'session.php'; ?><button onclick="createNewTopic()">Create subtopic +</button></div>
    </div>
</header>