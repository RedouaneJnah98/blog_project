<?php
include "components/adminHeader.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_REQUEST["delete"])) {
        $comment_id = $_REQUEST["delete"];

        $sql_query = "DELETE FROM comment WHERE comment_id = $comment_id";
        $sned_query = mysqli_query($connect, $sql_query);

        header("Location: comments.php");
        exit;
    }
}

if (!isset($_SESSION["username"])) {
    header("Location: login.php");
} else {
?>

<?php include "./components/sidebar.php"; ?>
<section class="container-fluid">
    <div class="home-section px-3">

        <?php include "components/homeHeader.php"; ?>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Comment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this comment?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <a href='' class="btn btn-danger modal-delete-link">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <article class="table-container">
            <h2>All Comments</h2>

            <table class="table table-hover">

                <form action="POST">

                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Comment</th>
                            <th scope="col">date</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "SELECT c.comment_id, c.content, c.createdAt, u.username, u.image FROM comment c JOIN user u ON c.userId = u.id ORDER BY createdAt DESC";
                            $comments_result = mysqli_query($connect, $sql);

                            while ($row = mysqli_fetch_assoc($comments_result)) {
                                extract($row);
                            ?>
                        <tr>
                            <th scope="row"><?php echo $comment_id; ?></th>
                            <td><?php echo $username; ?></td>
                            <td><?php echo substr($content, 0, 50); ?>...</td>
                            <td><?php echo $createdAt; ?></td>
                            <td>
                                <a href="javascript:void(0)" rel='<?php echo $comment_id ?>' class="delete-btn">Delete
                                    Comment</a>
                            </td>
                        </tr>
                        <?php } ?>

                    </tbody>
            </table>
            </form>

        </article>
    </div>

</section>

<?php
    include "components/adminFooter.php";
}
?>

<script>
$(document).ready(function() {
    $(".delete-btn").on("click", function() {
        var id = $(this).attr("rel");
        var url = "comments.php?delete=" + id + " ";

        $(".modal-delete-link").attr("href", url);
        $("#myModal").modal("show");
    })
})
</script>