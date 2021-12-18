<?php
include "components/adminHeader.php";
include "utils/functions.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = $_REQUEST["first_name"];
    $lastname = $_REQUEST["last_name"];
    $userRole = $_REQUEST["role"];
    $userEmail = $_REQUEST["user_email"];
    $userPwd = $_REQUEST["user_password"];
    $CUserPwd = $_REQUEST["confirm_user_password"];
    $userImg = $_FILES["user_img"]["name"];
    $userTmpName = $_FILES["user_img"]["tmp_name"];

    $user_img_dir = "../imgs/$userImg";
    $datetime = date("Y-m-d H:i:s");
    $hashPwd = password_hash($userPwd, PASSWORD_DEFAULT);
    $hashCPwd = password_hash($CUserPwd, PASSWORD_DEFAULT);

    move_uploaded_file($userTmpName, $user_img_dir);

    $sql = "INSERT INTO user (firstname, lastname, username, userRole, email, password, cPassword, image, registeredAt) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($connect);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there is an error";
    }

    $generateUsername = randomUsername($firstname, $lastname);

    mysqli_stmt_bind_param($stmt, "sssssssss", $firstname, $lastname, $generateUsername,  $userRole, $userEmail, $hashPwd, $hashCPwd, $userImg, $datetime);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
} else {
?>

<?php include "./components/sidebar.php"; ?>

<section class="container-fluid">
    <div class="home-section px-3">
        <?php include "./components/homeHeader.php"; ?>

        <article class="table-container">
            <h1>Add User</h1>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="img-user-container">
                    <img src="../images/user.svg" id="preview-img" alt="user image">
                    <label for="uploadfile"><i class="ri-pencil-line"></i></label>
                    <input type="file" id="uploadfile" name="user_img" required>
                </div>
                <div class="fields-container">
                    <div>
                        <label for="">First Name</label>
                        <input type="text" name="first_name" placeholder="John" required>
                    </div>
                    <div>
                        <label for="">Last Name</label>
                        <input type="text" name="last_name" placeholder="Doe" required>
                    </div>
                </div>
                <div class="fields-container">
                    <div>
                        <label for="role">User Role</label>
                        <select name="role" required>
                            <option value="choose">Choose Role</option>
                            <option value="admin">Admin</option>
                            <option value="author">Author</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Email</label>
                        <input type="email" name="user_email" placeholder="johndoe@..." required>
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
                <button type="submit" name="add_user" class="add-user-btn">Add User</button>
            </form>
        </article>
    </div>
</section>


<?php } ?>

<?php include "components/adminFooter.php"; ?>

<script>
$(document).ready(function() {
    $("#uploadfile").change(function(event) {
        var x = URL.createObjectURL(event.target.files[0]);

        $('#preview-img').attr("src", x);
    })

})
</script>