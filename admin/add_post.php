<?php
include "./components/adminHeader.php";
session_start();

$userName = $_SESSION["username"];

// $user_query = "SELECT id FROM user WHERE username = '{$userName}'";
// $getQuery = mysqli_query($connect, $user_query);

// $userId = mysqli_fetch_assoc($getQuery);

// echo $_SESSION["userId"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $post_title = $_REQUEST["post_title"];
    $post_subtitle = $_REQUEST["post_subtitle"];
    $post_status = $_REQUEST["post_status"];
    $post_tag = $_REQUEST["post_tag"];
    $post_hero = $_FILES["post_hero"]["name"];
    $post_hero_tmp = $_FILES["post_hero"]["tmp_name"];
    $post_image = $_FILES["post_img"]["name"];
    $post_img_tmp = $_FILES["post_img"]["tmp_name"];
    $post_content = mysqli_real_escape_string($connect, $_REQUEST["post_content"]);

    $hero_dir = "../images/$post_hero";
    $img_dir = "../images/$post_image";

    move_uploaded_file($post_hero_tmp, $hero_dir);
    move_uploaded_file($post_img_tmp, $img_dir);



    $sql = "INSERT INTO posts (post_title, post_subtitle, post_tags, post_hero, post_image, post_status, post_content, post_date, user_id) VALUES (?,?,?,?,?,?,?,?,?)";
    $stmt = mysqli_stmt_init($connect);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "there is an error";
    }

    $datetime = date("Y-m-d H:i:s");

    mysqli_stmt_bind_param($stmt, "sssssssss", $post_title, $post_subtitle, $post_tag, $post_hero, $post_image, $post_status, $post_content, $datetime, $_SESSION["userId"]);
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

        <div class="table-container">
            <h1>Add Post</h1>
            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="POST" enctype="multipart/form-data"
                class="add-post-container">
                <div>
                    <label for="post_title">Post Title</label>
                    <input type="text" name="post_title">
                </div>
                <div>
                    <label for="post_subtitle">Post Subtitle</label>
                    <input type="text" name="post_subtitle">
                </div>
                <div class="post-status">
                    <label for="post_status">Post Status</label>
                    <!-- <input type="text" name="post_status"> -->
                    <select name="post_status">
                        <option value="published">Choose a status</option>
                        <option value="published">published</option>
                        <option value="draft">draft</option>
                    </select>
                </div>
                <div class="post-tag">
                    <label for="post_tag">Post Tags</label>
                    <select name="post_tag">
                        <option value="tech">Choose a Tag</option>
                        <option value="tech">Tech</option>
                        <option value="world">World</option>
                        <option value="life">Life</option>
                    </select>
                </div>
                <div>
                    <label for="post_hero">Post Hero Image</label>
                    <input type="file" name="post_hero">
                </div>
                <div>
                    <label for="post_img">Post Image</label>
                    <input type="file" name="post_img">
                </div>
                <div>
                    <label for="post_content">Post Content</label>
                    <!-- <textarea name="post_content" cols="30" rows="10"></textarea> -->
                    <textarea id="htmeditor" name="post_content" cols="30" rows="10"></textarea>
                </div>


                <button type="submit" name="create_post" class="create-post-btn">create post</button>
            </form>
        </div>
    </div>
</section>

<?php  };
?>

<?php include "./components/adminFooter.php"; ?>