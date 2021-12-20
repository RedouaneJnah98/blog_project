<?php
include "./utils/functions.php";

$comment_count = checkStatus("comment", $connect);
$users_count = checkStatus("user", $connect);
$posts_count = checkStatus("posts", $connect);
$likes_count = checkStatus("likes", $connect);

?>

<div class="box-container">
    <article class="col-8">

        <div class="box-content">
            <div class="icon-cont">
                <img src="../imgs/assets/users.png" alt="">
            </div>
            <div class="content">
                <h4><?php echo $users_count; ?></h4>
                <p>Users</p>
            </div>
        </div>
        <div class="box-content">
            <div class="icon-cont">
                <img src="../imgs/assets/post.png" alt="">
            </div>
            <div class="content">
                <h4><?php echo $posts_count; ?></h4>
                <p>Post</p>
            </div>
        </div>
        <div class="box-content">
            <div class="icon-cont">
                <img src="../imgs/assets/likes.png" alt="">
            </div>
            <div class="content">
                <h4><?php echo $likes_count; ?></h4>
                <p>Likes</p>
            </div>
        </div>
        <div class="box-content">
            <div class="icon-cont">
                <img src="../imgs/assets/comments.png" alt="">
            </div>
            <div class="content">
                <h4><?php echo $comment_count; ?></h4>
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
            <!-- <div class="images"> -->


            <div class="avatars">
                <?php
                while ($row = mysqli_fetch_assoc($fetchData)) {
                    extract($row);
                ?>

                <!-- Avatar item -->
                <div class="avatars__item">
                    <div class="avatars__image">
                        <img src="../imgs/<?php echo $image ?>" alt="admin image">
                    </div>
                </div>
                <?php } ?>
            </div>

            <!-- </div> -->
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