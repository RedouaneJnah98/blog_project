<?php include_once "frontend/head.php"; ?>

<!-- navbar -->
<header>
    <nav class="d-flex justify-content-between container mt-4">
        <div>
            <img src="./images/logo.svg" class="logo-icon" alt="logo icon">
        </div>
        <div class="links-container">
            <ul class="d-flex ">
                <li class="me-5">
                    <a href="#">Contact</a>
                </li>
                <div class="d-flex align-items-center">
                    <div class="user-icon d-flex justify-content-center align-items-center">
                        <img src="./images/icon-user.svg" class="user" alt="">
                    </div>
                    <li class="ms-5 login">
                        <a href="#">Login</a>
                    </li>
                </div>
            </ul>
        </div>
    </nav>
    <!-- end of navbar -->

    <!-- Home -->

    <section class="home">
        <div class="img-container">
            <img src="./images/bcg-img.jpg" class="img" alt="">
        </div>
        <div class="hero-infos container">
            <h4 class="hero-subtitle">read the latest articles</h4>
            <h1 class="hero-title"><span class="logo">blog.ger</span> express your <br>opinion with us</h1>
            <div class="mt-5">
                <a href="#" class="scroll-btn">scroll down</a>
            </div>
        </div>
    </section>
</header>

<!-- End of Home -->

<!-- Articles Section -->

<section class="latest-articles-section">
    <div class="container title-container">
        <h1 class="title">the latest <br>articles</h1>
        <h5 class="subtitle">/ see the latest articles</h5>

        <?php include_once "./frontend/cards.php"; ?>
    </div>
</section>

<!-- End of Articles Section -->

<?php include "frontend/footer.php"; ?>