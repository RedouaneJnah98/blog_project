<?php
// define total number of results you want per page
$results_per_page = 9;

$sql = "SELECT * FROM posts";
$result = mysqli_query($connect, $sql);
$number_of_result = mysqli_num_rows($result);

// // determine the total number of pages available
$number_of_page = ceil($number_of_result / $results_per_page);

// determine which page number visitor is currently on
if (!isset($_GET["page"])) {
    $page = 1;
} else {
    $page = $_GET["page"];
}

// determine the sql LIMIT starting number for the results on the displaying page
$page_first_result = ($page - 1) * $results_per_page;

// retrieve teh selected results from database
$query = "SELECT * FROM posts LIMIT " . $page_first_result . ',' . $results_per_page;
$result = mysqli_query($connect, $query);

?>


<div class="cards-container">

    <?php
    while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
    ?>
    <a href="post.php?post_id=<?php echo $post_id; ?>">

        <div class="card">
            <img src="./imgs/<?php echo $post_image ?>" class="card-img-top" style="height: 200px; object-fit:cover"
                alt="card img">
            <div class="card-body box">
                <?php
                    if (strlen($post_title) > 60) {
                        $trim_title = substr($post_title, 0, 60) . " ...";
                    } else {
                        $trim_title = $post_title;
                    }
                    ?>
                <h4><?php echo $trim_title; ?></h4>

                <?php
                    if (strlen($post_content) > 100) {
                        $trim_string = substr($post_content, 0, 100) . " ...";
                    } else {
                        $trim_string = $string;
                    }
                    ?>
                <p><?php echo $trim_string ?></p>

                <p class="c-footer"><?php echo $post_tags; ?></p>
            </div>
        </div>
    </a>

    <?php }; ?>

</div>

<div class="pagination">
    <button type="button"><i class="ri-arrow-left-s-line"></i></button>

    <?php
    for ($page = 1; $page <= $number_of_page; $page++) {
    ?>
    <a href="index.php?page=<?php echo $page ?>" class="page-num"><?php echo $page; ?></a>
    <?php } ?>

    <button type="button"><i class="ri-arrow-right-s-line"></i></button>
</div>