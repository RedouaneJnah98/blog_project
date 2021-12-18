<?php
include "components/adminHeader.php";
session_start();

// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     if (isset($_REQUEST["update_user"])) {
//         $user_img = $_REQUEST["user_img"];
//         $firstname = $_REQUEST["firstname"];
//         $lastname = $_REQUEST["lastname"];
//         $role = $_REQUEST["role"];
//         $username = $_REQUEST["username"];
//         $email = $_REQUEST["user_email"];
//         $user_pwd = $_REQUEST["user_password"];
//         $user_c_pwd = $_REQUEST["confirm_user_password"];

//         echo "yess";
//     }
// }

if (isset($_POST["update_user"])) {
    echo $_POST["firstname"];
} else {
    echo "noo";
}

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
} else {
?>

<?php include "./components/sidebar.php"; ?>
<section class="container-fluid">
    <div class="home-section px-3">

        <?php include "components/homeHeader.php"; ?>

        <article class="table-container">
            <h2>Personal Information</h2>

            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data">
                <?php
                    $userId = $_SESSION["userId"];
                    $sql = "SELECT * FROM user WHERE id = $userId";
                    $result = mysqli_query($connect, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        extract($row);
                    ?>
                <div class="img-user-container">
                    <img src="../imgs/<?php echo $image ?>" id="prev_img" alt="user image">
                    <label for="upload_img"><i class="ri-pencil-line"></i></label>
                    <input type="file" id="upload_img" name="user_img" required>
                </div>
                <div class="fields-container">
                    <div>
                        <label for="">First Name</label>
                        <input type="text" name="firstname" value="<?php echo $firstname ?>" required>
                    </div>
                    <div>
                        <label for="">Last Name</label>
                        <input type="text" name="lastname" value="<?php echo $lastname ?>" required>
                    </div>
                </div>
                <div class="fields-container">
                    <div>
                        <label for="role">User Role</label>
                        <select name="role" required>
                            <option value="<?php echo $userRole ?>"><?php echo $userRole; ?></option>
                            <option value="admin">Admin</option>
                            <option value="author">Author</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Username</label>
                        <input type="text" name="username" value="<?php echo $username ?>" required>
                    </div>
                </div>
                <div class="fields-container">
                    <div>
                        <label for="">Country</label>
                        <input type="text" value="<?php echo $country ?>">
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="email" name="user_email" value="<?php echo $email ?>" required>
                    </div>
                </div>
                <div class="fields-container">
                    <div>
                        <label for="">Password</label>
                        <input type="password" name="user_password" placeholder="******" required>
                    </div>
                    <div>
                        <label for="">Confirm Password</label>
                        <input type="password" name="confirm_user_password" placeholder="******" required>
                    </div>
                </div>

                <?php } ?>
                <button type="submit" name="update_user" class="add-user-btn">Update</button>
            </form>
        </article>
    </div>
</section>

<?php
    include "components/adminFooter.php";
}
?>

<script>
$(function() {
    $("#upload_img").change(function(event) {
        var x = URL.createObjectURL(event.target.files[0]);
        $("#prev_img").attr("src", x);
    })
})
</script>