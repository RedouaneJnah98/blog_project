<?php
include "./components/adminHeader.php";
session_start();

if (isset($_SESSION["username"])) {
    $userName = $_SESSION["username"];
    echo "<h3>Welcom $userName</h3>";
?>
<a href="utils/logout.inc.php">Logout</a>

<?php } else {
    header("Location: login.php");
} ?>


<?php include "./components/adminFooter.php"; ?>