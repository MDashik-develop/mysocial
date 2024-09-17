<?php
include("session.php");
include("config/db.php");

// Get conversation_id from URL parameter
$conversation_id = intval($_GET['conversation_id']);

// Query to get messages along with sender_id
$sql = "SELECT * FROM messages WHERE conversation_id = $conversation_id ORDER BY timestamp ASC";
$result = mysqli_query($con, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $timestamp = date('h:i A', strtotime($row['timestamp']));
    $message_class = ($row['sender_id'] == $my_id) ? 'sender' : 'receiver';

    // Fetch conversation details to determine sender and receiver
    $sql1 = "SELECT * FROM conversations WHERE conversation_id = $conversation_id";
    $result1 = mysqli_query($con, $sql1);
    $row1 = mysqli_fetch_assoc($result1);

    $sender = ($my_id == $row1['user1_id']) ? $row1['user1_id'] : $row1['user2_id'];
    $receiver = ($my_id == $row1['user1_id']) ? $row1['user2_id'] : $row1['user1_id'];

    // Determine profile image and name based on sender or receiver
    if ($message_class == 'sender') {
        $sql2 = "SELECT * FROM user WHERE id = $sender";
        $result2 = mysqli_query($con, $sql2);  
        $row2 = mysqli_fetch_assoc($result2);
        $profile_image = $row2['dp'];
        $name = $row2['name'];
    } else {
        $sql3 = "SELECT * FROM user WHERE id = $receiver";
        $result3 = mysqli_query($con, $sql3);  
        $row3 = mysqli_fetch_assoc($result3);
        $profile_image = $row3['dp'];
        $name = $row3['name'];
    }

    $profile_image_path = !empty($profile_image) ? $profile_image : 'default-profile.png';

    // Display message with profile image and name
    echo "<div class='chat-message $message_class'>
            <div class='message'>
                <div class='img'>
                    <img src='{$profile_image_path}' alt='Profile Image' class='profile-img'>
                </div>
                <div class='message-content'>
                    <div class='name'>{$name}</div>
                    <div class='message-text'>
                        {$row['message']}
                        <span class='timestamp'>{$timestamp}</span>
                    </div>
                </div>
            </div>
          </div>";
}

mysqli_close($con);
?>
<style>



.chat-container {
    overflow-y: auto; /* Enable vertical scrolling */
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE and Edge */
}

.chat-container::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}


.chat-message {
    display: flex;
    margin: 10px 0;
    align-items: flex-start;
}

.sender {
    justify-content: flex-end; /* Align sender messages to the right */
    text-align: right;
}

.receiver {
    justify-content: flex-start; /* Align receiver messages to the left */
    text-align: left;
}

.message {
    display: flex;
    align-items: center;
    max-width: 80%; /* Limit the width of message bubbles */
    gap: 10px; /* Space between image and message content */
}

.message-content {
    max-width: 100%;
}

.name {
    font-weight: bold;
    margin-bottom: 5px;
    font-size: 13px;
}

.message-text {
    padding: 10px;
    font-weight: 450;
    border-radius: 10px;
    background-color: #f1f1f1; /* Default background color for messages */
}

.sender .message-text {
    background-color: #dcf8c6; /* Light green background for sender's messages */
}

.receiver .message-text {
    background-color: #c1e1c1; /* Green background for receiver's messages */
}

.timestamp {
    display: block;
    font-size: 0.8em;
    color: #888;
    margin-top: 5px;
}

.img {
    width: 50px;
    height: 50px;
    overflow: hidden;
    border-radius: 50%; /* Keeps the image circular */
    display: inline-block;
    object-fit: cover; /* Ensures the image scales correctly without distortion */
}

.profile-img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the entire container */
}

.sender .img {
    order: 2; /* Moves the profile image to the right side for sender */
}

.receiver .img {
    order: 0; /* Moves the profile image to the left side for receiver */
}

</style>