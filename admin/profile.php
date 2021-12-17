<?php
include "components/adminHeader.php";
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
} else {
?>

<?php include "./components/sidebar.php"; ?>
<section class="container-fluid">
    <div class="home-section px-3">

        <?php include "components/homeHeader.php"; ?>

        <article class="table-container">
            <h2>Personal Information</h2>


        </article>
    </div>
</section>

<?php
    include "components/adminFooter.php";
}
?>