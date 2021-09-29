<?php include "./components/adminHeader.php"; ?>

<?php
if (isset($_POST["submit"])) {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $emailAddress = $_POST["emailAddress"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    $sql = "INSERT INTO users(firstname, lastname, emailAddress, password, confirmPassword) VALUES('{$firstname}', '{$lastname}', '{$emailAddress}', '{$password}', '{$confirmPassword}')";
    $sendQuery = mysqli_query($connect, $sql);

    if (!$sendQuery) {
        die("FAILED QUERY" . mysqli_error($connect));
    }
}
?>

<section class="d-flex flex-wrap align-items-center w-100">
    <div>
        <img src="../images/login-img.jpg" class="login-img" alt="">
    </div>

    <article class="ms-5 form-infos">
        <div class="d-flex justify-content-between align-items-center">
            <img src="../images/black-logo.svg" class="black-logo" alt="">
            <button type="button" class="close-btn"><i class="ri-close-line"></i></button>
        </div>

        <form action="" method="post">
            <h1 class="mb-4">Create an account</h1>

            <div class="d-flex justify-content-between">
                <div class="d-grid">
                    <label for="firstname">Firstname</label>
                    <input type="text" name="firstname" class="input-name" placeholder="Firstname">
                </div>
                <div class="d-grid">
                    <label for="lastname">Lastname</label>
                    <input type="text" name="lastname" class="input-name" placeholder="lastname">
                </div>
            </div>
            <div class="d-grid">
                <label for="email">Email address</label>
                <input type="email" name="emailAddress" placeholder="Enter your email">
            </div>
            <div class="d-grid">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Enter your password">
            </div>
            <div class="d-grid">
                <label for="confirmPassword">Confirm Password</label>
                <input type="password" name="confirmPassword" placeholder="Confirm your password">
            </div>
            <div class="d-grid">
                <label for="country">Country or Region of Residence</label>
                <select name="country" id="country">
                    <option value="select-country">Select Country</option>
                </select>
            </div>

            <button type="submit" name="submit" class="signup-btn">Sign up </button>
            <p class="mt-2">Already have an account? <a href="#">Login</a></p>
        </form>
    </article>
</section>

<?php include "./components/adminFooter.php"; ?>