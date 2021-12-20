<?php
include "admin/db/database.php";
session_start();
$postId = $_SESSION["postId"];

$data = "SELECT c.content, c.createdAt, u.firstname, u.lastname, u.image FROM comment c JOIN user u ON c.userId = u.id WHERE c.postId = $postId";
$result = mysqli_query($connect, $data);

if (isset($_POST["comment_load_data"])) {
    while ($row = mysqli_fetch_assoc($result)) {
        extract($row);
?>
<div class="comments">
    <img src="imgs/<?php echo $image ?>" class="img" alt="user image">
    <h4><?php echo "$firstname $lastname"; ?></h4>
    <p><?php echo $content; ?></p>
</div>
<div class="comment-info">
    <button type="submit">Reply</button>
    <?php
            $now_date = strtotime(date('Y-m-d H:i:s')); // the current date 
            $key_date = strtotime(date($createdAt));
            // $key_date = $createdAt;
            $diff = $now_date - $key_date;
            $days = floor($diff / (60 * 60 * 24));
            $hours = floor(($diff - ($days * 60 * 60 * 24)) / (60 * 60));
            // print $days . " " . $hours . " difference";

            ?>
    <p><?php echo $hours; ?>h</p>
</div>

<?php } ?>

<?php
}

while ($row = mysqli_fetch_assoc($result)) {
    extract($row);
?>

<div class="comments">
    <img src="imgs/<?php echo $image ?>" class="img" alt="user image">
    <h4><?php echo "$firstname $lastname"; ?></h4>
    <p><?php echo $content; ?></p>
</div>
<div class="comment-info">
    <button type="submit">Reply</button>
    <p><?php echo $createdAt; ?></p>
</div>

<?php } ?>