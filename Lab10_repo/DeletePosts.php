<?php
    $query = sprintf("DELETE FROM Posts WHERE ");
    $x = 1;
    $length = count($_POST);
    $message = "<script>alert(\Post(s): ";

    foreach($_POST as $id => $status) {
        if($x === $length) {
            $query .= sprintf("post_id=%d", $id);
            $message .= sprintf("%s deleted\";</script>", $id);
        }
        else {
            $query .= sprintf("post_id=%d or", $id);
            $message .= sprintf("%s ", $id);
        }
        unset($_POST[$id]);
        $x++;
    }

    $mysqli = new mysqli("mysql.eecs.ku.edu", "s887n908", "Eeb3ea4E", "s887n908");
    if($mysqli->connect_errno) {
        $message = sprintf("Connect failed: %s\n", $mysqli->connect_error);
        $message = "<script> alert($message);</script>";
        echo $message;
    }
    else {
        $mysqli->query($query);
        $mysqli->close();
    }

    include "./DeletePosts.html";
    echo $message;
?>
