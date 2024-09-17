<?php
include("part/session.php");
include("part/start.php");
$conversation_id = $_GET['conversation_id'];

//Fetch Reciver Name
$sql0 = "SELECT * FROM conversations WHERE conversation_id = $conversation_id ";
$result0 = mysqli_query($con, $sql0);
$row0 = mysqli_fetch_assoc($result0);

$id01 = $row0['user1_id'];
$id02 = $row0['user2_id'];

if ($id01 == $my_id) {
    $rcv_id = $id02;
}else {
    $rcv_id = $id01;
}

$sql1 = "SELECT * FROM user WHERE id = $rcv_id ";
$result1 = mysqli_query($con, $sql1);

$row1 = mysqli_fetch_assoc($result1);
$receiver_name = $row1['name']; // Fetch receiver's name dynamically if available
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with <?php echo $receiver_name; ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .chat-container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 5px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 500px;
        }
        .chat-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        .chat-header h2 {
            margin: 0;
            font-size: 1.2em;
        }
        .chat-body {
            padding: 15px;
            flex: 1;
            overflow-y: auto;
            border-bottom: 1px solid #ddd;
            display: flex;
            flex-direction: column;
        }
        .chat-message {
            margin-bottom: 10px;
            display: flex;
            align-items: flex-start;
        }
        .chat-message img {
            max-width: 100px;
            border-radius: 5px;
            margin-right: 10px;
        }
        .chat-message .message-container {
            max-width: 75%;
        }
        .chat-message .message-container.sender {
            margin-left: auto;
            text-align: right;
        }
        .chat-message .message-container.receiver {
            margin-right: auto;
            text-align: left;
        }
        .chat-message .message {
            /* background-color: #e9ecef; */
            padding: 10px;
            border-radius: 5px;
            display: inline-block;
        }
        .chat-message .timestamp {
            color: #888;
            font-size: 0.8em;
            display: block;
        }
        .chat-footer {
            padding: 10px;
            border-top: 1px solid #ddd;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
        }
        .chat-footer input {
            flex: 1;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-right: 10px;
        }
        .chat-footer button {
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        .chat-footer button:hover {
            background-color: #0056b3;
        }
        @media (max-width: 600px) {
            .chat-footer input {
                font-size: 0.9em;
            }
            .chat-footer button {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
<?php include ("part/headar.php");?>

    <div class="chat-container">
        <div class="chat-header">
            <h2>Chat with <?php echo $receiver_name; ?></h2>
        </div>
        <div class="chat-body" id="chat-body">
            <!-- Messages will be loaded here via AJAX -->
        </div>
        <div class="chat-footer">
            <input type="text" id="message-input" placeholder="Type your message here...">
            <button id="send-button">Send</button>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
    var conversationId = <?php echo $conversation_id; ?>; // Set conversationId from PHP

    function loadMessages() {
        var chatBody = $('#chat-body');
        var scrollHeight = chatBody[0].scrollHeight;
        var scrollTop = chatBody.scrollTop();
        var clientHeight = chatBody.outerHeight();

        var isNearBottom = (scrollTop + clientHeight >= scrollHeight - 50); // Check if the user is near the bottom

        $.ajax({
            url: 'part/fetch_messages.php',
            method: 'GET',
            data: { conversation_id: conversationId },
            success: function(response) {
                var prevScrollHeight = chatBody[0].scrollHeight; // Save previous scroll height
                chatBody.html(response);

                if (isNearBottom) {
                    // If the user was near the bottom, scroll to the bottom
                    chatBody.scrollTop(chatBody[0].scrollHeight);
                } else {
                    // Preserve the scroll position by adjusting it based on the previous height
                    chatBody.scrollTop(scrollTop + (chatBody[0].scrollHeight - prevScrollHeight));
                }
            }
        });
    }

    $('#send-button').click(function() {
        var message = $('#message-input').val();
        if (message.trim() !== '') {
            $.ajax({
                url: 'part/send_message.php',
                method: 'POST',
                data: {
                    conversation_id: conversationId,
                    message: message
                },
                success: function() {
                    $('#message-input').val('');
                    loadMessages(); // Reload messages after sending
                }
            });
        }
    });

    // Auto refresh messages every 3 seconds
    setInterval(loadMessages, 3000);

    loadMessages(); // Initial load
});

    </script>
</body>
</html>
