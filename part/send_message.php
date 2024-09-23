<?php
 include ("session.php");
 include ("config/db.php");

date_default_timezone_set('Asia/Dhaka');
$msg_time = date('Y-m-d H:i:s'); 


$conversation_id = intval($_POST['conversation_id']);
$rec_id = intval($_POST['rec_id']);
$message = mysqli_real_escape_string($con, $_POST['message']);
$sender_id = $my_id; 

$sql = "INSERT INTO messages (conversation_id, sender_id, message, msg_time) VALUES ($conversation_id, $sender_id, '$message', '$msg_time')";
mysqli_query($con, $sql);

$sql2 = "UPDATE conversations SET msg_time = '$msg_time' WHERE conversation_id = $conversation_id";
mysqli_query($con, $sql2);

mysqli_close($con);
?>
