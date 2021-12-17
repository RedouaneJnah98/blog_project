<?php session_start(); ?>

<nav class="d-flex justify-content-between mt-4">
    <a href="index.php">
        <img src="./images/logo.svg" class="logo-icon" alt="logo icon">
    </a>
    <div class="links-container">
        <ul class="d-flex">
            <?php
            if (isset($_SESSION["username"])) {
                echo "<li>
                             <a href='./admin'>Admin</a>
                          </li>";
            }
            ?>

            <li class="mx-5">
                <a href="#">Contact</a>
            </li>
            <div class="d-flex align-items-center">
                <div class="user-icon d-flex justify-content-center align-items-center">
                    <?php

                    $userStmt = (isset($_SESSION["username"])) ? $_SESSION["username"] : "noo";

                    $sql = "SELECT image FROM user WHERE username = '{$userStmt}'";
                    $send_query = mysqli_query($connect, $sql);
                    $img = mysqli_fetch_assoc($send_query);

                    $imgCondition = (isset($_SESSION["username"])) ? $img["image"] : "icon-user.svg";
                    ?>
                    <img src="./images/<?php echo $imgCondition ?>" class="user" alt="user image">
                </div>
                <li class="ms-5 login">
                    <a href="./admin/login.php">
                        <?php
                        $username = (isset($_SESSION["username"])) ? $_SESSION["username"] : "Login";
                        echo $username;
                        ?>
                    </a>
                </li>
            </div>
        </ul>
    </div>
</nav>