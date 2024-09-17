<?php
 include ("part/session.php");
 include ("part/start.php");

 // Start output buffering
ob_start();


 $sender_id = $my_id; // Example User 1
 $receiver_id = $_GET['receiver_id']; // Example User 4
?>
	<title>Waiting for massaging</title>

</head>
</body style="background-color: whitesmoke;">
<?php include ("part/headar.php");?>

<h1 style="font-size: 30px; font-weight: bold; margin: 10px">
    Friend
</h1>
<div class="friend">

 <?php
 //  include ("part/config/db.php");

 //  $friend_sql = "SELECT * FROM `user`";
 //  $friend_query = mysqli_query($con,$friend_sql);
 //  while ($friend_show = mysqli_fetch_array($friend_query)) {



   // <?php echo $friend_show['dp']; ?>
// <?php //}
   ?> 




   <?php
   include ("part/config/db.php");

//    $sender_id = $my_id; // Example User 1
//    $receiver_id = receiver_id; // Example User 4
   
   // Check if conversation already exists
   $query = "SELECT * FROM conversations WHERE (user1_id = $sender_id AND user2_id = $receiver_id) OR (user1_id = $receiver_id AND user2_id = $sender_id)";
   $result = mysqli_query($con, $query);
   
   if(mysqli_num_rows($result) == 0) {
       // If no conversation exists, create one
       $insert_convo = "INSERT INTO conversations (user1_id, user2_id) VALUES ($sender_id, $receiver_id)";
       mysqli_query($con, $insert_convo);
       $conversation_id = mysqli_insert_id($con);
   } else {
       // If conversation exists, get the conversation_id
       $conversation = mysqli_fetch_assoc($result);
       $conversation_id = $conversation['conversation_id'];
   }
   
   // Redirect or provide link to the conversation
   header("Location: massage2.php?conversation_id=" . $conversation_id);
   // End output buffering and flush
ob_end_flush();
exit;
   ?>





   

<?php include ("part/create-post.php");?>

<?php include ("part/end.php");?>

