<?php
include './components/adminHeader.php';
session_start();

// delete post
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_REQUEST["delete_post"])) {
        $pId = $_REQUEST["delete_post"];
        $post_sql = "DELETE FROM posts WHERE post_id = $pId";
        $send_query = mysqli_query($connect, $post_sql);
    }
}

// comment count
// $comment_query = "SELECT c.comment_id FROM comment c JOIN posts p ON c.postId = p.post_id";
// $comment_result = mysqli

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

            <!-- Modal -->
            <div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this post?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <a href='' class="btn btn-danger modal-delete-post">Delete</a>
                        </div>
                    </div>
                </div>
            </div>

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
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <?php while ($row = mysqli_fetch_assoc($result)) {
                        extract($row);
                    ?>
                        <tbody>
                            <tr>
                                <th scope="row"><input type="checkbox" name="checkboxArray[]" class="checkBoxes" value="<?php echo $post_id ?>"></th>
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
                                <td><?php echo $post_views; ?> views</td>
                                <td><a href="javascript:void(0)" class="delete-post-btn" rel="<?php echo $post_id ?>">Delete</a>
                                </td>
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

<script>
    $(document).ready(function() {
        // $("#selectAllBoxes").on("click", function() {
        //     if (this.checked) {
        //         $(".checkboxes").each(function() {
        //             this.checked = true;
        //         })
        //     } else {
        //         $(".checkboxes").each(function() {
        //             this.checked = false;
        //         })
        //     }
        // })

        // show modal
        $(".delete-post-btn").on("click", function() {
            var id = $(this).attr("rel");
            var url = "posts.php?delete_post=" + id + " ";
            console.log(url);

            $(".modal-delete-post").attr('href', url);
            $("#postModal").modal("show");
        })
    })
</script>