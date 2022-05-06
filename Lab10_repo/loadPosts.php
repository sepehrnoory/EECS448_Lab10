<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "s887n908", "Eeb3ea4E", "s887n908");
if($mysqli->connect_errno) {
    $message = sprintf("Connect failed: %s\n", $mysqli->connect_error); 
    $message = "<script> alert($message);</script>";
    echo $message;
}
else {
    echo "<form id=\deletePosts\" aciton=\"DeletePosts.php\" method=\"post\">";
    echo "<table id=\"postTable\"><tr><th>Content</th><th>Author</th><th>Delete</th></tr>";

    $query = sprintf("SELECT * FROM Posts");
    $result = $mysqli->query($query);

    while($row = $result->fetch_assoc()) {
        $content = $row["content"];
        $author = $row["author_id"];
        $id = $row["post_id"];

        echo "<tr><td>$content</td><td>$author</td>";

        echo "<td><input type=\"checkbock\" name=\"$id\"></td></tr>";
    }

    echo "</table><br><br>";
    echo "<input type=\"submit\" value=\"Delete Posts\" onclick=\"return alertDeletePosts()\">";
    echo "</form>";

    $result->free();
    $mysqli->close();
}

?>