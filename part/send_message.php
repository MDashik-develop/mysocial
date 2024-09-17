<?php
 include ("session.php");

 include ("config/db.php");

date_default_timezone_set('Asia/Dhaka');


$conversation_id = intval($_POST['conversation_id']);
$message = mysqli_real_escape_string($con, $_POST['message']);
$sender_id = $my_id; 

$sql = "INSERT INTO messages (conversation_id, sender_id, message) VALUES ($conversation_id, $sender_id, '$message')";
mysqli_query($con, $sql);

$sql2 = "UPDATE conversations SET msg_time = NOW() WHERE conversation_id = $conversation_id";
mysqli_query($con, $sql2);

mysqli_close($con);
?>
