<!DOCTYPE html>
<html>

  <p>Here are some results:</p>

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
        // good connection, so do you thing
        $sqlusers = "SELECT * FROM users;";
        $sqlsubtopic = "SELECT * FROM subtopic;";
        $sqlpost = "SELECT * FROM post;";
        $sqllikedposts = "SELECT * FROM likedPosts;";

        $results = mysqli_query($connection, $sqlusers);
        // fetch user table
        echo "User Table<br/>";
        while ($row = mysqli_fetch_assoc($results))
        {
          echo $row['username']." ".$row['firstName']." ".$row['lastName']." ".$row['email']." ".$row['password']."<br/>";
        }

        $results = mysqli_query($connection, $sqlsubtopic);
        // fetch subtopic table
        echo "<br/>Subtopic Table<br/>";
        while ($row = mysqli_fetch_assoc($results))
        {
          echo $row['title']." ".$row['date']." ".$row['color']." ".$row['textColor']." ".$row['about']." ".$row['category']."<br/>";
        }

        $results = mysqli_query($connection, $sqlpost);
        // fetch post table
        echo "<br/>Post Table<br/>";
        while ($row = mysqli_fetch_assoc($results))
        {
          echo $row['pid']." ".$row['ptitle']." ".$row['username']." ".$row['date']." ".$row['upvotes']." ".$row['downvotes']." ".$row['title']."<br/>";
        }

        $results = mysqli_query($connection, $sqllikedposts);
        // fetch post table
        echo "<br/>LikedPosts Table<br/>";
        while ($row = mysqli_fetch_assoc($results))
        {
          echo $row['id']." ".$row['username']." ".$row['pid']."<br/>";
        }
          
        mysqli_free_result($results);
        mysqli_close($connection);
    }
  ?>
</html>
