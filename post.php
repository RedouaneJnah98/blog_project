<?php include "frontend/head.php"; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $postId = $_REQUEST["post_id"];

    $sql = "SELECT * FROM posts WHERE post_id = $postId";
    $getPosts = mysqli_query($connect, $sql);

    // comment section MySQL
    $comments = "SELECT * FROM comment WHERE postId = $postId";
    $comments_query = mysqli_query($connect, $comments);

    $num_of_comments = mysqli_num_rows($comments_query);
    // end of comment MySQL

    while ($row = mysqli_fetch_assoc($getPosts)) {
        extract($row);
?>

<header class="post-header">
    <div class="container-xl">
        <!-- Navbar -->
        <?php
                include "frontend/navbar.php";
                $_SESSION["postId"] = $postId;

                ?>
        <!-- End of Navbar -->
    </div>

    <section class="post-hero">
        <img src="imgs/<?php echo $post_hero ?>" class="post-img" alt="">
        <div class="post-hero-infos container">
            <h4 class="hero-subtitle"><?php echo $post_tags; ?></h4>
            <h1 class="post-title"><?php echo $post_title; ?></h1>
        </div>
    </section>

</header>

<section class="post-body container">

    <?php
            $users = "SELECT posts.post_id, posts.post_subtitle, posts.post_image, posts.post_content, posts.post_date, user.image, user.firstname, user.lastname FROM posts JOIN user ON posts.user_id = user.id WHERE posts.post_id = $postId";
            $sendQ = mysqli_query($connect, $users);

            $row = mysqli_fetch_assoc($sendQ);
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $name = "$firstname $lastname";

            $day = date("l jS", strtotime($row["post_date"]));
            $month = date("F", strtotime($row["post_date"]));
            $year = date("Y", strtotime($row["post_date"]));
            $timestamp = "$day $month $year";
            ?>

    <div class="flexbox">
        <div class="d-flex align-items-center">
            <div class="author">
                <img src="imgs/<?php echo $row["image"]; ?>" class="author-img" alt="author image">
                <p class="ms-2">by <span><?php echo $name; ?></span></p>
            </div>
            <div class="views">
                <img src="images/eye-fill.svg" alt="icon">
                <p>10K views</p>
            </div>
        </div>
        <div>
            <p class="post-date"><?php echo $timestamp; ?></p>
        </div>
    </div>
    <hr>

    <!-- Article -->
    <article>
        <h2 class="post-title"><?php echo $row["post_subtitle"]; ?></h2>
        <p><?php echo $row["post_content"]; ?></p>
        <img src="imgs/<?php echo $row["post_image"] ?>" class="post-img" alt="post image">

        <!-- Comment Section -->
        <div class="comment-section">
            <?php
                    $user_id = (isset($_SESSION["userId"])) ? $_SESSION["userId"] : null;
                    $query = "SELECT image FROM user WHERE id = $user_id";
                    $getQuery = mysqli_query($connect, $query);

                    $imgStmt = "";
                    if (isset($_SESSION["userId"])) {
                        $userImg = mysqli_fetch_assoc($getQuery);

                        $imgStmt .= $userImg["image"];
                    } else {
                        $imgStmt .= "male.jpg";
                    }
                    ?>
            <img src="imgs/<?php echo $imgStmt; ?>" class="user-comment-img" alt="admin image">

            <form id="comment_form">
                <div>
                    <textarea id="comment_content" cols="30" rows="10"
                        placeholder="Type here to reply to <?php echo $name ?>..."></textarea>
                </div>
                <button type="submit" id="submit">post comment</button>
            </form>
        </div>

        <h3 class="comments"><?php echo $num_of_comments; ?> comments</h3>

        <main class="display-comment">

            <!-- <div class="reply">
                <img src="images/user-1.jpg" alt="user image">
                <h4>Claire Dubois</h4>
                <p>Very accurate.</p>
            </div> -->
        </main>
    </article>

    <!-- End of comment section -->

    <h2 class="recommended">Recommended:</h2>

    <div class="recommended-articles-container">
        <div class="box">
            <img src="imgs/recommend-1.jpg" class="recommend-img" alt="post image">
            <h3>could a reboot make social <br> media a nicer place?</h3>
        </div>
        <div class="box">
            <img src="imgs/recommend-2.jpg" class="recommend-img" alt="post image">
            <h3>fake walmart news release claimed <br> it would accept cryptocurrency</h3>
        </div>
        <div class="box">
            <img src="imgs/recommend-3.jpg" class="recommend-img" alt="post image">
            <h3>wales fly-half biggar on bolt, fregie <br> and solskjaer's doubters</h3>
        </div>
        <div class="box">
            <img src="imgs/recommend-4.jpg" class="recommend-img" alt="post image">
            <h3>tennis' 'most awkward champion & the <br> true power of her voice</h3>
        </div>
    </div>

</section>

<?php     }
} else {
    header("Location: index.php");
} ?>

<?php include "frontend/footer.php"; ?>

<script>
$(document).ready(function() {
    loadData();

    function loadData() {
        $.ajax({
            url: "show_comment.php",
            method: "POST",
            data: {
                comment_load_data: true
            },
            success: function(data) {
                $(".display-comment").html(data);
            }
        })
    }


    function loadComment() {

        $.ajax({
            url: "show_comment.php",
            method: "POST",
            success: function(res) {
                if (res !== "") {
                    $(".display-comment").html(res);
                }
            }
        })
    }

    $("#submit").on("click", function(e) {
        e.preventDefault();

        var comment = $("#comment_content").val();

        var data = {
            msg: comment,
            add_comment: true,
        }

        $.ajax({
            method: "POST",
            url: "add_comment.php",
            data: data,
            success: function(data) {
                if (comment !== "") {
                    $('#comment_form')[0].reset();
                    loadComment();
                } else {
                    alert("Please you cannot sumbit an empty comment!");
                }
            },
        })
    })

})
</script>