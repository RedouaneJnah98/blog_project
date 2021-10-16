<?php
include "./components/adminHeader.php";
session_start();
?>

<nav>
    <div class="logo-container">
        <i class='bx bxl-blogger'></i>
        <img src="../images/blue-logo.svg" alt="">
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
    </ul>
    </aside>

    <?php include "./components/adminFooter.php"; ?>