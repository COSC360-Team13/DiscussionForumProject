<?php
    if ($_SERVER["REQUEST_METHOD"] === "GET"){
        $subtopic = isset($_GET["title"]) ? $_GET["title"] : "";
        $subtopic = strtolower($subtopic);

        if (empty($subtopic)){
            // Redirect
            header("Location: noSubtopic.php?title=$subtopic");
            die();
        }else {
            include 'config.php';

            $subtopicExists = False;
            $sql = "SELECT title FROM subtopic";
            $results = $pdo->query($sql);
            
            while ($row = $results->fetch()) {
                $title = strtolower($row['title']);
                if (!strcmp($subtopic, $title)) {
                    $subtopicExists = True;
                    $subtopic = $row['title'];
                    break;
                }
            }
            $pdo = null;
            $results = null;

            if ($subtopicExists == False) {
                // Redirect
                header("Location: noSubtopic.php?title=$subtopic");
                die();
            }
        }
    }
    
?>