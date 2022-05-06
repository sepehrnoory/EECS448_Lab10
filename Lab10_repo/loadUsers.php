<?php

$mysqli = new mysqli("mysql.eecs.ku.edu", "s887n908", "Eeb3ea4E", "s887n908");
if($mysqli->connect_errno) {
    $message = sprintf("Connect failed: %s\n", $mysqli->connect_error); 
    $message = "<script> alert($message);</script>";
    echo $message;
}
else {
    echo"<form action=\"./ViewPosts.php\" method=\"post\">";

    echo "<label for\"userDropdown\">Select User: </label>";
    echo "<select name=\"userDropdown\" id=\"userDropdown\">";

    $query = sprintf("SELECT * FROM Users");
    $result = $mysqli->query($query);

    while($row = $result->fetch_assoc()) {
        $user = $row["user_id"];
        echo "<option value=\"$user\">$user</option>";
    }

    echo "</select><br><br>";
    echo "<input type\"submit\" value=\"View Posts\"></form>";

    $result->free();
    $mysqli->close();
}


?>