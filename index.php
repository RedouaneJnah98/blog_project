<?php include_once "frontend/head.php"; ?>

<!-- navbar -->
<header>
    <nav class="d-flex justify-content-between container mt-4">
        <div>
            <img src="./frontend/images/logo.svg" class="logo-icon" alt="logo icon">
        </div>
        <div class="links-container">
            <ul class="d-flex ">
                <li class="me-5">
                    <a href="#">Contact</a>
                </li>
                <div class="d-flex align-items-center">
                    <div class="user-icon d-flex justify-content-center align-items-center">
                        <img src="./frontend/images/icon-user.svg" class="user" alt="">
                    </div>
                    <li class="ms-5 login">
                        <a href="#">Login</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>
</header>
<!-- end of navbar -->

<!-- Home -->

<section class="home">
    <div class="img-container">
        <img src="./frontend/images/bcg-img.jpg" class="img" alt="">
    </div>
    <div class="test"></div>
    <div class="hero-infos container">
        <h4 class="subtitle">read the latest articles</h4>
        <h1 class="title"><span class="logo">blog.ger</span> express your <br>opinion with us</h1>
        <div class="mt-5">
            <a href="#" class="scroll-btn">scroll down</a>
        </div>
    </div>
</section>

<!-- End of Home -->

<?php include "frontend/footer.php"; ?>