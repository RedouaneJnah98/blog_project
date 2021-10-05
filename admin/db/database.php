<?php

$server = "localhost";
$username = "root";
$password = "";
$db_name = "blogger";

$connect = mysqli_connect($server, $username, $password, $db_name);

if ($connect->connect_error) {
    die('Connection Failed: ' . mysqli_error($connect));
}