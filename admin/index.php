<?php
include "./components/adminHeader.php";
session_start();

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
} else {
?>

<nav class="sidebar">
    <div class="logo-container">
        <i class='bx bxl-slack-old'></i>
        <a href="../index.php">
            <img src="../images/logo.svg" class="logo-sidebar" alt="">
        </a>
    </div>
    <ul class="nav-links">
        <li>
            <a href="#">
                <i class="ri-dashboard-fill"></i>
                <span class="links-name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="ri-pages-fill"></i>
                <span class="links-name">Posts</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="ri-add-box-fill"></i>
                <span class="links-name">Add Post</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="ri-message-2-fill"></i>
                <span class="links-name">Comments</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="ri-team-fill"></i>
                <span class="links-name">Users</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="ri-user-add-fill"></i>
                <span class="links-name">Add User</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="ri-profile-fill"></i>
                <span class="links-name">Profile</span>
            </a>
        </li>
        <li class="logout-link">
            <a href="./utils/logout.inc.php">
                <i class="ri-user-received-2-fill"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</nav>

<section class="home-section px-4">
    <nav>
        <div class="sidebar-btn">
            <i class="ri-menu-3-fill"></i>
            <span>Dashboard</span>
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search Article">
            <i class="ri-search-2-line"></i>
        </div>
        <div class="notification">
            <i class="ri-notification-2-fill"></i>
            <span class="message">21</span>
        </div>
        <div class="user d-flex align-items-center">
            <h4 class="me-3">Hello, <?php echo $_SESSION["username"]; ?></h4>
            <img src="../images/user-1.jpg" class="user-img" alt="user image">
        </div>
    </nav>

    <?php } ?>

    <?php require_once "./components/statistics.php"; ?>
</section>


<?php include "./components/adminFooter.php"; ?>