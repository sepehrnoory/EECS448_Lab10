<?php

    if(isset($_POST["newUser"])) {
        $new_user = $_POST["newUser"];
        unset($_POST["newUser"]);

        $mysqli = new mysqli("mysql.eecs.ku.edu", "s887n908", "Eeb3ea4E", "s887n908");

        if($mysqli->connect_errno) {
            $message = sprintf("Connection failed: %s\n", $mysqli->connect_error);
            $message = "<script> alert($message)</script>";
        }
        else {
            $query = sprintf("INSERT INTO Users VALUES ('%s')", $new_user);
            $result = $mysqli->query($query);
            if($result) {
                $message = "<script>alert(\"User: $new_user created\")</script>";
            }
            else {
                $message = "<script>alert(\"User: $new_user already exists\")</script>";
            }
        }

        $mysqli->close();
    }

    include "./CreateUser.html";
    echo $message;
?>
