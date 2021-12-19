<?php
include "./components/adminHeader.php";
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
} else {
?>

<?php include "components/sidebar.php"; ?>

<section class="container-fluid">

    <article class="home-section px-3">

        <?php

        include "components/homeHeader.php";
    }
        ?>

        <?php require_once "./components/statistics.php"; ?>

        <div class="admin-bottom">
            <div class="chart col-8">
                <canvas id="myChart"></canvas>
            </div>
            <!-- chart js -->
            <div class="comments-container">
                <h2>Recent Comments</h2>

                <?php
                $comment_query = "SELECT c.content, u.username, u.image FROM comment c JOIN user u ON c.userId = u.id ORDER BY createdAt DESC LIMIT 4";
                $comment_query_result = mysqli_query($connect, $comment_query);

                while ($row = mysqli_fetch_assoc($comment_query_result)) {
                    extract($row);
                ?>
                <div class="comments-info">
                    <img src="../imgs/<?php echo $image ?>" class="comments-img" alt="user">
                    <div>
                        <h4 class="user-comment"><?php echo $username; ?>... <span class="commented">has
                                commented</span></h4>
                        <p><?php echo substr($content, 0, 50); ?>...</p>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </article>

</section>
<?php include "./components/adminFooter.php"; ?>