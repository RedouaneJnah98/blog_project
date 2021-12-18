<div class="fract">
    <aside class="d-flex justify-content-between col-8">
        <div class="sidebar-btn">
            <i class="ri-menu-3-fill"></i>
            <!-- <span>Dashboard</span> -->
        </div>
        <div class="search-box">
            <input type="text" placeholder="Search Article">
            <i class="ri-search-2-line"></i>
        </div>
        <div class="notification">
            <i class="ri-notification-2-fill"></i>
            <span class="message">21</span>
        </div>
    </aside>

    <div class="user">
        <?php
        $hour = date("H");
        $term = ($hour > 17) ? "Evening" : (($hour > 12) ? "Afternoon" : "Morning");

        $uname = $_SESSION["username"];
        $sql = "SELECT * FROM user WHERE username = '$uname'";
        $getData = mysqli_query($connect, $sql);

        $row = mysqli_fetch_assoc($getData);

        $subUname = substr($uname, 0, 10);

        echo "<h4 class='me-3'>Good {$term}, <span>{$subUname}</span></h4>";
        ?>
        <img src="../imgs/<?php echo $row["image"]; ?>" class="user-img" alt="user image">
    </div>
</div>