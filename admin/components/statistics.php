<div class="box-container">
    <article class="col-8">

        <div class="box-content">
            <div class="icon-cont">
                <img src="../images/assets/users.png" alt="">
            </div>
            <div class="content">
                <h4>14.200</h4>
                <p>Users</p>
            </div>
        </div>
        <div class="box-content">
            <div class="icon-cont">
                <img src="../images/assets/post.png" alt="">
            </div>
            <div class="content">
                <h4>150</h4>
                <p>Post</p>
            </div>
        </div>
        <div class="box-content">
            <div class="icon-cont">
                <img src="../images/assets/likes.png" alt="">
            </div>
            <div class="content">
                <h4>140k</h4>
                <p>Likes</p>
            </div>
        </div>
        <div class="box-content">
            <div class="icon-cont">
                <img src="../images/assets/comments.png" alt="">
            </div>
            <div class="content">
                <h4>100k</h4>
                <p>Comments</p>
            </div>
        </div>

        <!-- Blogger Team -->
        <div class="blogger-team">
            <?php
            $sql = "SELECT * FROM user WHERE userRole = 'admin'";
            $fetchData = mysqli_query($connect, $sql);
            $result_rows = mysqli_num_rows($fetchData);
            ?>
            <h2 class="title">Blogger Admins <br><span><?php echo $result_rows; ?> Admins</span></h2>
            <div class="images">

                <?php

                while ($row = mysqli_fetch_assoc($fetchData)) {
                    extract($row);
                ?>
                <img src="../imgs/<?php echo $image ?>" alt="admin image">
                <?php } ?>
            </div>
        </div>

    </article>

    <div class="weather-box">
        <div class="d-flex align-items-center">
            <i class="ri-newspaper-line"></i>
            <div class="ms-3 weather-info">

                <?php
                date_default_timezone_set("Africa/Casablanca");
                $date = date("l");
                echo "<h5>$date Capsule</5>";
                ?>

                <h6>Get updated pon the fly</h6>
                <a href="#" class="d-flex align-items-center">Brief me <i class="ri-arrow-right-line ms-2"></i></a>
            </div>
        </div>
        <div class="infos mt-5"></div>
    </div>
</div>