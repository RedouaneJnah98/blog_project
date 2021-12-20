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

<script>
const ctx = document.getElementById("myChart").getContext("2d");

let delayed;

// Gradient Fill
let gradient = ctx.createLinearGradient(0, 0, 0, 400);
gradient.addColorStop(0, "rgba(58,123,213,1)");
gradient.addColorStop(1, "rgba(0,210,255,0.3)");

const labels = ["Users", "Posts", "Likes", "Comments"];

const data = {
    labels,
    datasets: [{
        data: [<?php echo $users_count; ?>, <?php echo $posts_count ?>, <?php echo $likes_count; ?>,
            <?php echo $comment_count ?>
        ],
        label: "Blogger Activity",
        borderWidth: 2,
        borderRadius: 5,
        borderSkipped: false,
        backgroundColor: "#1da1f2",
    }, ],
};

const config = {
    type: "bar",
    data: data,
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: "top",
            },
            title: {
                display: true,
                text: "Blogger Activity Bar Chart",
            },
        },
    },
};

const myChart = new Chart(ctx, config);
</script>