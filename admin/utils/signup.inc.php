<?php

// Always require files on the top 
require_once "../db/database.php";
require_once "functions.php";

if (isset($_POST["register"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $emailAddress = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["cPassword"];
    $country = $_POST["country"];

    if (emptyInputSignup($firstname, $lastname, $emailAddress, $password, $confirmPassword, $country) !== false) {
        header("Location: ../signup.php?error=emptyInput");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("Location: ../signup.php?error=invalidUsername");
        exit();
    }

    if (invalidEmail($emailAddress) !== false) {
        header("Location: ../signup.php?error=invalidEmail");
        exit();
    }

    if (pwdMatch($password, $confirmPassword) !== false) {
        header("Location: ../signup.php?error=passwordsNotMatch");
        exit();
    }

    if (userExists($connect, $username, $email) !== false) {
        header("Location: ../signup.php?error=userExists");
        exit();
    }

    createUser($connect, $firstname, $lastname, $emailAddress, $password, $confirmPassword, $country);
} else {
    header("Location: ../signup.php");
}