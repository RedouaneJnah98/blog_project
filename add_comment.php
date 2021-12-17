<?php
include "admin/db/database.php";
session_start();

if (isset($_POST["add_comment"])) {


    $postId = $_SESSION["postId"];
    $user_id = $_SESSION["userId"];
    $comment =  $_POST["msg"];
    $timestamp = date("Y-m-d H:i:s");

    $sql = "INSERT INTO comment(postId, userId, content, createdAt) VALUES ($postId, $user_id, '$comment', '$timestamp')";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        echo 'data inserted successfully';
    } else {
        echo "Error" . mysqli_error($connect);
    }
}

    // echo $_POST["comment"] . "<br>";
    // echo $postId . "<br>";
    // echo $user_id . "<br>";
    // echo $timestamp;