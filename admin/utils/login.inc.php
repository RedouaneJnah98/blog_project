<?php

include_once "../db/database.php";
include_once "functions.php";

if (isset($_POST["login"])) {
    $username =  $_POST["username"];
    $password =  $_POST["password"];
    $remember = $_POST["remember"];

    if (emptyInputLogin($username, $password)) {
        header('Location: ../login.php?error=loginInputEmpty');
        exit();
    }

    if (!empty($remember)) {
        setcookie("uname", $username, time() + 365 * 24 * 3600, '/');
        setcookie("password", $password, time() + 365 * 24 * 3600, '/');
    }

    loginUser($connect, $username, $password);
} else {
    header('Location: ../login.php?error=failedLogin');
    exit();
}