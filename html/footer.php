<link rel="stylesheet" href="../css/footer.css">
<footer>
<div class="footer-related">
      <h2>Newest Posts</h2>
      <?php include 'config.php';
            $sql = "SELECT pid, ptitle FROM post ORDER BY date DESC LIMIT 4";
            $results = $pdo->query($sql);
            echo "<div class=\"footer-entry\">";
            while($row = $results->fetch())
            {
                // TODO: update link to redirect to correct page
                echo "<a href=\"posts.php?pid=".$row["pid"]."\">";
                echo "<div class=\"footer-item\">".$row["ptitle"];
                echo "</div>";
                echo "</a>";
            }
            echo "</div>";
            $pdo = null;
            $results = null;?>
   </div>
   <div class="footer-section">
        <h2>About Us</h2>
        <div class="footer-section-item">
        <p>This site is the final project for COSC 360 - Web Development </p>
        <br>
        <p>&copy; Copyright 2021 Team 13 Project
        </div>
   </div>
</footer>
</footer>