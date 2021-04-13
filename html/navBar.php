<head>
<link rel="stylesheet" href="../css/navBar.css">
</head>
<body>
<header>
    <nav class="navbar">
        <div class="logo"><a href="mainPage.php"><img src="" alt="HomepageLogo"></a></div>
        <div class="searchbar">
            <input type="text" placeholder="Search for Bears..." \></div>
      <div class = "profile" onclick="menuToggle();">
          <img src = "images/71hi6hlB-TL 1.png">
      </div>
      <div class = "menu">
        <ul>
          <li><a href="">My Account</a></li>
          <li><a href="">Logout</a></li>
        </ul>
      </div>
      <script>
        function menuToggle(){
          const toggleMenu = document.querySelector('menu');
          toggleMenu.classList.toggle('active');
        }
    </nav>
</header>
</body>
