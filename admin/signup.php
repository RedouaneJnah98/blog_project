<?php

include "./components/adminHeader.php";
include "utils/functions.php";

?>

<section class="d-flex flex-wrap">
    <div>
        <img src="../images/signup-img.jpg" class="signup-img" alt="signup image">
    </div>

    <article class="ms-5 form-infos">
        <div class="d-flex justify-content-between align-items-center">
            <a href="../index.php">
                <img src="../images/blue-logo.svg" class="black-logo" alt="">
            </a>
            <button type="button" class="close-btn"><i class="ri-close-line"></i></button>
        </div>

        <form action="utils/signup.inc.php" method="post">
            <h1 class="mb-4">Create an account</h1>

            <div class="d-flex justify-content-between">
                <div class="d-grid mb-3">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" class="input input-name" placeholder="Firstname">
                    <?php

                    if (isset($_GET["error"])) {
                        if ($_GET["error"] === "emptyInput") {
                            echo "<p class='d-flex align-items-center error-msg msg'>Password is not the same!<i class='ri-error-warning-fill ms-2'></i></p>";
                        }
                    }

                    ?>
                </div>
                <div class="d-grid mb-3">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" class="input input-name" placeholder="lastname">
                    <?php

                    if (isset($_GET["error"])) {
                        if ($_GET["error"] === "emptyInput") {
                            echo "<p class='d-flex align-items-center error-msg msg'>Password is not the same!<i class='ri-error-warning-fill ms-2'></i></p>";
                        }
                    }

                    ?>
                </div>
            </div>
            <div class="d-grid mb-3">
                <label for="email">Email address</label>
                <input type="email" name="email" class="input" placeholder="Enter your email">
                <?php

                if (isset($_GET["error"])) {
                    if ($_GET["error"] === "invalidEmail") {
                        echo "<p class='d-flex align-items-center error-msg msg'>Password is not the same!<i class='ri-error-warning-fill ms-2'></i></p>";
                    }
                }

                ?>
            </div>
            <div class="d-grid mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="input" placeholder="Enter your password">
                <?php

                if (isset($_GET["error"])) {
                    if ($_GET["error"] === "passwordsNotMatch") {
                        echo "<p class='d-flex align-items-center error-msg msg'>Password is not the same!<i class='ri-error-warning-fill ms-2'></i></p>";
                    }
                }

                ?>
            </div>
            <div class="d-grid mb-3">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="cPassword" class="input" placeholder="Confirm your password">
                <?php

                if (isset($_GET["error"])) {
                    if ($_GET["error"] === "passwordsNotMatch") {
                        echo "<p class='d-flex align-items-center error-msg msg'>Password is not the same!<i class='ri-error-warning-fill ms-2'></i></p>";
                    }
                }

                ?>

            </div>
            <div class="d-grid mb-3">
                <label for="country">Country or Region of Residence</label>
                <select name="country" id="countries" class="select">
                    <option value="select-country">Select Country</option>
                </select>
            </div>

            <button type="submit" name="register" id="submit" class="signup-btn">Sign up </button>
            <p class="mt-3 account-link">Already have an account? <a href="login.php" class="login-link">Login</a></p>
        </form>
    </article>
</section>

<?php include "./components/adminFooter.php"; ?>