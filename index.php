<?php include_once "frontend/head.php"; ?>

<!-- navbar -->
<header>
    <div class="container-xl">

        <?php include "frontend/navbar.php"; ?>
        <!-- end of navbar -->

        <!-- Home -->

        <section class="home">
            <div>
                <img src="./images/bcg.jpg" class="img" alt="">
            </div>
            <div class="hero-infos">
                <h4 class="hero-subtitle">read the latest articles</h4>
                <h1 class="hero-title"><span class="logo">blog.ger</span> express your <br>opinion with us</h1>
                <div class="mt-5">
                    <a href="#" class="scroll-btn">scroll down</a>
                </div>
            </div>
        </section>
    </div>
</header>

<!-- End of Home -->

<!-- Articles Section -->

<section class="latest-articles-section">
    <div class="container-xl title-container">
        <h1 class="title">the latest <br>articles</h1>
        <h5 class="subtitle">/ see the latest articles</h5>

        <?php include_once "./frontend/features.php"; ?>

        <?php include_once "./frontend/cards.php"; ?>
    </div>
    </div>
</section>

<!-- End of Articles Section -->