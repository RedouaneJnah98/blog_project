<?php include "./components/adminHeader.php"; ?>

<section class="d-flex flex-wrap section-container">
    <div>
        <img src="../images/login-img.jpg" class="login-img" alt="login image">
    </div>

    <article class="ms-5 form-infos">
        <div class="d-flex justify-content-between align-items-center">
            <a href="../index.php">
                <img src="../images/black-logo.svg" class="black-logo" alt="">
            </a>
            <button type="button" class="close-btn"><i class="ri-close-line"></i></button>
        </div>

        <form action="" method="post" class="form">
            <h1 class="login-title">Login</h1>
            <h4 class="login-subtitle">Login to your account</h4>
            <p>Thank you for get back to us, share with the <br>world your taughts.</p>

            <div class="d-grid">
                <label for="username">Username</label>
                <input type="text" name="firstname" class="input" placeholder="Enter your Firstname">
            </div>
            <div class="d-grid">
                <label for="password">Password</label>
                <input type="password" name="password" class="input" placeholder="Enter your Password">
            </div>

            <div class="d-flex justify-content-between">
                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="label-remember">Remember me?</label>
                </div>
                <a href="#" class="reset-link">Reset Password?</a>
            </div>

            <button type="submit" name="login" class="login-btn">Sign In</button>
            <p class="account-link mt-3">Don't have an account yet? <a href="signup.php" class="signin-link">Join us</a>
            </p>
        </form>
    </article>
</section>

<?php include "./components/adminFooter.php"; ?>