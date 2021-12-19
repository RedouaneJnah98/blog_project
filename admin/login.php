<?php include "./components/adminHeader.php"; ?>
<?php session_start(); ?>

<section class="d-flex flex-wrap section-container">
    <div>
        <img src="../imgs/login-img.jpg" class="login-img" alt="login image">
    </div>

    <article class="ms-5 form-infos">
        <div class="d-flex justify-content-between align-items-center">
            <a href="../index.php">
                <img src="../imgs/blue-logo.svg" class="black-logo" alt="">
            </a>
            <button type="button" class="close-btn"><i class="ri-close-line"></i></button>
        </div>

        <form action="utils/login.inc.php" method="post" class="form">
            <h1 class="login-title">Login</h1>
            <h4 class="login-subtitle">Login to your account</h4>
            <p class="p">Thank you for get back to us, share with the <br>world your taughts.</p>

            <?php if (isset($_COOKIE["userName"])) {
                echo $_COOKIE["userName"];
            }  ?>

            <div class="d-grid">
                <label for="username">Username</label>
                <input type="text" name="username" class="input" placeholder="Username"
                    value="<?php if (isset($_COOKIE["uname"])) echo $_COOKIE["uname"]; ?>">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] === "loginInputEmpty") {
                        echo "<p class='d-flex align-items-center error-msg msg'>Please this field cannot be empty <i class='ri-error-warning-fill ms-2'></i></p>";
                    }
                }
                ?>
            </div>
            <div class="d-grid">
                <label for="password">Password</label>
                <input type="password" name="password" class="input" placeholder="Enter your Password"
                    value="<?php if (isset($_COOKIE["password"])) echo $_COOKIE["password"]; ?>">
                <?php
                if (isset($_GET["error"])) {
                    if ($_GET["error"] === "loginInputEmpty") {
                        echo "<p class='d-flex align-items-center error-msg msg'>Please this field cannot be empty<i class='ri-error-warning-fill ms-2'></i></p>";
                    }
                }
                ?>
            </div>

            <div class="d-flex justify-content-between mt-3">
                <div>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember" class="label-remember">Remember me?</label>
                </div>
                <a href="#" class="reset-link">Reset Password?</a>
            </div>

            <button type="submit" name="login" class="login-btn">Sign In</button>
            <p class="account-link mt-3">Don't have an account yet? <a href="signup.php?error=default"
                    class="signin-link">Join us</a>
            </p>
        </form>
    </article>
</section>

<?php include "./components/adminFooter.php"; ?>