<?php

    if(isset($_POST["username"]) && isset($_POST["postBody"])) {
        //Set local variables
        $user = $_POST["username"];
        $postBody = $_POST["postBody"];
        unset($_POST["username"]);
        unset($_POST["postBody"]);
        //Create MySQL connection
        $mysqli = new mysqli("mysql.eecs.ku.edu", "s887n908", "Eeb3ea4E", "s887n908");

        if($mysqli->connect_errno) {
            $message = sprintf("Connection failed: %s\n", $mysqli->connect_error);
            $message = "<script> alert($message)</script>";
        }
        else {
            //Check the user against the database
            $query = sprintf("SELECT user_id FROM Users WHERE user_id='%s'", $user);
            $result = $mysqli->query($query);
            $row = $result->fetch_assoc();
            //If the user does not exist
            if($row["user_id"] == "") {
                $message = "<script> alert(\"Cannot post. User: $user does not exit.\")";
                $result->free();
            }
            //If the user exists, create a post
            else {
                $query = sprintf("INSERT INTO Posts (content, author_id) VALUE ('%s', '%s')", $postBody, $user);
                $mysqli->query($query);
                $message = "<script> alert(\"Post created!\")</script>";
            }
            //Close MySQL connection
            $mysqli->close();
        }
    }
    //Render the create post page and show message 
    include "./creat_post.html";
    echo $message;
?>