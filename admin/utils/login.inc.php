<?php

include_once "../db/database.php";
include_once "functions.php";

if (isset($_POST["login"])) {
    $username =  $_POST["username"];
    $password =  $_POST["password"];

    if (emptyInputLogin($username, $password)) {
        header('Location: ../login.php?error=loginInputEmpty');
        exit();
    }

    loginUser($connect, $username, $password);
} else {
    header('Location: ../login.php?error=failedLogin');
    exit();
}