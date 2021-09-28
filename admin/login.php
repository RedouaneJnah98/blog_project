<?php include "./db/database.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- remixicon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom css -->
    <link rel="stylesheet" href="../css/main.css">
    <title>Admin</title>
</head>

<body>
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

                <button type="submit" class="signup-btn">Sign up </button>
                <p class="mt-2">Already have an account? <a href="#">Login</a></p>
            </form>
        </article>
    </section>

    <!-- Javascript -->
    <script src="../js/app.js"></script>
</body>

</html>