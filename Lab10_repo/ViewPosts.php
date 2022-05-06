<?php
    if(isset($_POST["userDropdown"])) {

        $load_user = $_POST["userDropdown"];
        unset($_POST["userDropdown"]);

        include "./ViewPosts.html";

        $mysqli = new mysqli("mysql.eecs.ku.edu", "s887n908", "Eeb3ea4E", "s887n908");
        if($mysqli->connect_errno) {
            $message = sprintf("Connect failed: %s\n", $mysqli->connect_error);
            $message = "<script> alert($message)</script>";
            echo $message;
        }
        else {
            $query = sprintf("SELECT post_id, content FROM Posts WHERE author_id='%s'", $load_user);
            $result = $mysqli->query($query);

            echo "<h2>User: $load_user</h2>";
            echo "<div id=\"landingPage\">";
            echo "<table id=\"usersPosts\"><tr><th>Post ID</th><th>Content</th></tr>";

            while($row = $result->fetch_assoc()) {
                $post_id = $row["post_id"];
                $content = $row["content"];
                echo "<tr><td>$post_id</td><td>$content</td></tr>";
            }

            echo "</table></div>";
            $result->free();
            $mysqli->close();
        }
    }
?>
