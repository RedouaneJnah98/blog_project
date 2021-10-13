<?php

session_start();

function emptyInputSignup($firstname, $lastname, $emailAddress, $password, $confirmPassword, $country)
{
    $result;
    if (empty($firstname) || empty($lastname) || empty($emailAddress) || empty($password) || empty($confirmPassword) || empty($country)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidUsername($username)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email)
{
    $result;
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function pwdMatch($password, $confirmPassword)
{
    $result;
    if ($password !== $confirmPassword) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function userExists($connect, $username, $email)
{
    $sql = "SELECT * FROM user WHERE username = ? OR email = ?";
    $stmt = mysqli_stmt_init($connect);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=stmtFailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($connect, $firstname, $lastname, $email, $password, $confirmPassword, $country)
{
    $sql = "INSERT INTO user (firstname, lastname, username, email, registeredAt, password, cPassword, country) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($connect);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../signup.php?error=createUserFailed");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
    $hashedCPwd = password_hash($confirmPassword, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, 'ssssssss', $firstname, $lastname, randomUsername($firstname, $lastname), $email, date("Y-m-d H:i:s"), $hashedPwd, $hashedCPwd, $country);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("Location: ../index.php?error=none");
    exit();
}

function randomUsername(string $firstname, string $lastname)
{
    $firstN = strtolower($firstname);
    $lastN = substr(strtolower($lastname), 0, 3);
    $randomNumber = rand(0, 100);
    $username = $firstN . $lastN . $randomNumber;

    return $username;
}

function emptyInputLogin($username, $pwd)
{
    $result;
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function loginUser($connect, $username, $pwd)
{
    $userExists = userExists($connect, $username, $pwd);

    if ($userExists === false) {
        header('Location: ../login.php?error=wrongLogin');
        echo "there is an error";
        exit();
    }

    $pwdHashed = $userExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header('Location: ../login.php?error=wrongPassword');
        exit();
    } elseif ($checkPwd === true) {
        $_SESSION["userId"] = $userExists["id"];
        $_SESSION["username"] = $userExists["username"];
        header('Location: ../index.php');
        exit();
    }
}


function errorFormHandling(string $error)

{

    switch ($_GET["error"]) {
        case $error:
            echo "<p class='d-flex align-items-center error-msg'>This field cannot be empty! <i class='ri-error-warning-fill ms-2'></i></p>";
            break;

        case $error:
            echo "<p class='d-flex align-items-center error-msg'>Password is not the same!<i class='ri-error-warning-fill'></i></p>";
            break;

        case $error:
            echo "<p class='d-flex align-items-center error-msg'>Email format is incorrect! <i class='ri-error-warning-fill'></i></p>";
        default:
            break;
    }
}