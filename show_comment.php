<?php
include "admin/db/database.php";
session_start();
$postId = $_SESSION["postId"];

$data = "SELECT c.content, u.firstname, u.lastname, u.image FROM comment c JOIN user u ON c.userId = u.id WHERE c.postId = $postId";
$result = mysqli_query($connect, $data);

if (isset($_POST["comment_load_data"])) {
    while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
?>
<div class="comments">
    <img src="images/<?php echo $image ?>" class="img" alt="user image">
    <h4><?php echo "$firstname $lastname"; ?></h4>
    <p><?php echo $content; ?></p>
</div>
<div class="comment-info">
    <button type="submit">Reply</button>
    <p>3h</p>
</div>
<?php }
    ?>

<?php
}

while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
?>

<div class="comments">
    <img src="images/<?php echo $image ?>" class="img" alt="user image">
    <h4><?php echo "$firstname $lastname"; ?></h4>
    <p><?php echo $content; ?></p>
</div>
<div class="comment-info">
    <button type="submit">Reply</button>
    <p>3h</p>
</div>

<?php } ?>