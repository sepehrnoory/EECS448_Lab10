<?php
    echo "<table id=\"usersTable\"><tr><td><strong>Username</strong></td></tr>";

    $mysqli = new mysqli("mysql.eecs.ku.edu", "s887n908", "Eeb3ea4E", "s887n908");

    if($mysqli->connect_errno) {
        $message = sprintf("Connection failed: %s\n", $mysqli->connect_error);
        $message = "<script> alert($message)</script>";
        echo $message;
    }
    else {
        $query = sprintf("SELECT * FROM Users");
        $result = $mysqli->query($query);

        while($row = $result->fetch_assoc()) {
            $user = $row["user_id"];
            echo "<tr><td>$user</td></tr>";
        }

        echo "</table>";
        $result->free();
        $mysqli->close();
    }
?>