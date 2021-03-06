<?php
include "components/adminHeader.php";
session_start();

// delete user
if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_REQUEST["delete_user"])) {

        $uId = $_REQUEST["delete_user"];

        $users_sql = "DELETE FROM user WHERE id = $uId";
        $send_query = mysqli_query($connect, $users_sql);
    }
}

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
$query = "SELECT * FROM user LIMIT " . $page_first_result . ',' . $results_per_page;
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
        <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this user?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                        <a href='' class="btn btn-danger modal-delete-user">Delete</a>
                    </div>
                </div>
            </div>
        </div>

        <article class="table-container">
            <h2>All Users</h2>

            <form method="POST">

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"><input id="selectAllBoxes" type="checkbox"></th>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <!-- <th scope="col">Last</th> -->
                            <th scope="col">Email</th>
                            <th scope="col">Last seen</th>
                            <th scope="col">Role</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                            extract($row);
                        ?>
                    <tbody>
                        <tr>
                            <th><input type="checkbox" name="checkboxeArray[]" class="checkboxes"
                                    value="<?php echo $id ?>">
                            </th>
                            <td scope="row"><?php echo $id; ?></td>
                            <td class="user-img-container ">
                                <img src="../imgs/<?php echo $image ?>" class="user-img" alt="user image">
                                <p class="p-title"><?php echo "$firstname $lastname"; ?> </p>
                            </td>
                            <td><?php echo $email; ?></td>
                            <td>Otto</td>
                            <td><?php echo $userRole; ?></td>
                            <td>
                                <i class="ri-delete-bin-6-fill"></i>
                                <a href="javascript:void(0)" rel="<?php echo $id ?>" class="delete-user">delete</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php } ?>

                </table>
            </form>

            <div class="pagination">
                <button type="button"><i class="ri-arrow-left-s-line"></i></button>

                <?php
                    for ($page = 1; $page <= $number_of_page; $page++) {
                    ?>
                <a href="users.php?page=<?php echo $page ?>" class="page-num"><?php echo $page; ?></a>
                <?php } ?>

                <button type="button"><i class="ri-arrow-right-s-line"></i></button>
            </div>

        </article>

    </div>
</section>

<?php
    include "components/adminFooter.php";
}
?>

<script>
$(document).ready(function() {
    $("#selectAllBoxes").on("click", function() {
        if (this.checked) {
            $(".checkboxes").each(function() {
                this.checked = true;
            })
        } else {
            $(".checkboxes").each(function() {
                this.checked = false;
            })
        }
    })

    // show modal
    $(".delete-user").on("click", function() {
        var id = $(this).attr("rel");
        var url = "users.php?delete_user=" + id + " ";
        console.log(url);

        $(".modal-delete-user").attr('href', url);
        $("#userModal").modal("show");
    })
})
</script>