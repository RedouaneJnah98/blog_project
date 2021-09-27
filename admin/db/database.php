<?php

$connect = mysqli_connect("localhost", "root", "", "blogger");

if ($connect->connect_error) {
    die('Connection Failed: ' . mysqli_error($connect));
}