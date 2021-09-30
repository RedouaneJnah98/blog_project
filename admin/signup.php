<?php include "./components/adminHeader.php"; ?>

<?php
if (isset($_POST["register"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $emailAddress = $_POST["emailAddress"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $country = $_POST["country"];

    $password = password_hash($password, PASSWORD_BCRYPT, ["cost" => 12]);

    $sql = "INSERT INTO users(firstname, lastname, emailAddress, password, confirmPassword, country) VALUES('{$firstname}', '{$lastname}', '{$emailAddress}', '{$password}', '{$confirmPassword}', '{$country}')";
    $sendQuery = mysqli_query($connect, $sql);

    if (!$sendQuery) {
        die("FAILED QUERY" . mysqli_error($connect));
    }
}
?>

<section class="d-flex flex-wrap">
    <div>
        <img src="../images/signup-img.jpg" class="login-img" alt="signup image">
    </div>

    <article class="ms-5 form-infos">
        <div class="d-flex justify-content-between align-items-center">
            <a href="../index.php">
                <img src="../images/black-logo.svg" class="black-logo" alt="">
            </a>
            <button type="button" class="close-btn"><i class="ri-close-line"></i></button>
        </div>

        <form action="" method="post">
            <h1 class="mb-4">Create an account</h1>

            <div class="d-flex justify-content-between">
                <div class="d-grid">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" class="input input-name" placeholder="Firstname">
                </div>
                <div class="d-grid">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" class="input input-name" placeholder="lastname">
                </div>
            </div>
            <div class="d-grid">
                <label for="email">Email address</label>
                <input type="email" name="emailAddress" class="input" placeholder="Enter your email">
            </div>
            <div class="d-grid">
                <label for="password">Password</label>
                <input type="password" name="password" class="input" placeholder="Enter your password">
            </div>
            <div class="d-grid">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="confirmPassword" class="input" placeholder="Confirm your password">
            </div>
            <div class="d-grid">
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