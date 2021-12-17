<?php
include './components/adminHeader.php';
session_start();

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
$query = "SELECT * FROM posts p JOIN user ON p.user_id = user.id LIMIT " . $page_first_result . ',' . $results_per_page;
$result = mysqli_query($connect, $query);

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
} else {
?>

<?php include "./components/sidebar.php"; ?>

<section class="container-fluid">
    <div class="home-section px-3">

        <?php include "components/homeHeader.php"; ?>


        <article class="table-container">
            <h2>All Articles</h2>

            <table class="table table-sm table-hover">
                <thead>
                    <tr>
                        <th scope="col"><input type="checkbox" id="selectAllBoxes"></th>
                        <th scope="col">ID</th>
                        <th scope="col">Article Title</th>
                        <th scope="col">Author</th>
                        <th scope="col">Post Date</th>
                        <th scope="col">Category</th>
                        <th scope="col">Like</th>
                        <th scope="col">Comment</th>
                        <th scope="col">View</th>
                    </tr>
                </thead>

                <?php while ($row = mysqli_fetch_assoc($result)) {
                        extract($row);
                    ?>
                <tbody>
                    <tr>
                        <th scope="row"><input type="checkbox" name="checkboxArray[]" class="checkBoxes"
                                value="<?php echo $post_id ?>"></th>
                        <td><?php echo $post_id; ?></td>
                        <?php
                                if (strlen($post_title) > 25) {
                                    $trim_title = substr($post_title, 0, 30) . " ...";
                                } else {
                                    $trim_title = $post_title;
                                }
                                ?>
                        <td class="p-title"><?php echo strip_tags($trim_title) ?></td>
                        <?php
                                $full_name = "$firstname $lastname";
                                ?>
                        <td><?php echo $full_name; ?></td>
                        <td><?php echo substr($post_date, 0, 10); ?></td>
                        <td><?php echo $post_tags; ?></td>
                        <td>58 Likes</td>
                        <td>20 comment</td>
                        <td>120 views</td>
                    </tr>
                </tbody>

                <?php } ?>

            </table>


            <div class="pagination">
                <button type="button"><i class="ri-arrow-left-s-line"></i></button>

                <?php
                    for ($page = 1; $page <= $number_of_page; $page++) {
                    ?>
                <a href="posts.php?page=<?php echo $page ?>" class="page-num"><?php echo $page; ?></a>
                <?php } ?>

                <button type="button"><i class="ri-arrow-right-s-line"></i></button>
            </div>

        </article>



    </div>
</section>

<?php
    include './components/adminFooter.php';
}

?>