<div class="box-container">
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

        <div class="infos mt-5">
            <h5>Tangier, Morocco</h5>
            <div class="d-flex mt-3">
                <img src="../images/assets/weather-icon.png" class="weather-icon" alt="icon">
                <div class="ms-2">
                    <h5 class="degree">18<span>°c</span></h5>
                    <h6>Cloudy day, chances of rain</h6>
                </div>
            </div>
        </div>
    </div>
</div>