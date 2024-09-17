
<?php
include("part/session.php");
include("part/start.php");
?>


	<title>My Conversations</title>

</head>
</body>
<?php include ("part/headar.php");?>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .containerr {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        #conversation-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        #conversation-list li {
            padding: 10px;
            background-color: #f8f9fa;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
        }
        #conversation-list li a {
            text-decoration: none;
            color: inherit;
            display: flex;
            align-items: center;
        }
        #conversation-list li .img {
            margin-right: 10px;
        }
        #conversation-list li img {
            max-width: 50px;
            max-height: 50px;
            border-radius: 50%;
        }
        #conversation-list li h1.name {
            margin: 0;
            font-size: 1em;
            color: #007bff;
        }
        #conversation-list li:hover {
            background-color: #e9ecef;
        }
		.img {
    width: 50px;
    height: 50px;
    overflow: hidden;
    border-radius: 20px; /* Keeps the image circular */
	float: left;
}
a{
	width: 100%;
}
#conversation-list img{
	width: 100%;
	height: auto;
}
.name{
	font-weight: 550;
    /* text-align: center; */
    color: #333;
    font-size: 20px;
    margin-bottom: 0px;
    margin-top: 16px;
    padding: 0px;
    padding-left: 9px;
    float: left;
}
    </style>

    <div class="container">
        <h1>Conversations</h1>
        <ul id="conversation-list">
            <!-- Conversations will be loaded here -->











<?php 
// Initialize an empty array to store conversations
$conversations = array();

// Fetch all conversations where the current user is involved
$sql = "SELECT * FROM conversations WHERE user1_id = $my_id OR user2_id = $my_id  ORDER BY msg_time DESC";
$result = mysqli_query($con, $sql);

if ($result) {

    // Loop through each conversation
    while ($row = mysqli_fetch_assoc($result)) {
        // Determine the receiver ID based on the logged-in user's ID
        $rcv_id = ($row['user1_id'] == $my_id) ? $row['user2_id'] : $row['user1_id'];

        // Fetch the receiver's details using their ID
        $sql_user = "SELECT * FROM user WHERE id = $rcv_id";
        $result_user = mysqli_query($con, $sql_user);

        if ($result_user) {
            $row_user = mysqli_fetch_assoc($result_user);
            $username = $row_user['username']; // Get the receiver's username
            $dp = $row_user['dp']; // Get the receiver's profile picture

            // Determine if the user is currently active
            $time = time();
            $sql_active = "SELECT last_login FROM user WHERE username = '$username'";
            $result_active = mysqli_query($con, $sql_active);
            $active_color = 'red'; // Default to inactive
            if ($result_active) {
                $row_active = mysqli_fetch_assoc($result_active);
                if ($row_active['last_login'] > ($time - 600)) { // Check if last login was within the last 10 minutes
                    $active_color = 'green';
                }
            }
?>

            <li id="conversationlist">
                <a href="massage2.php?conversation_id=<?php echo $row['conversation_id']; ?>">
                    <div class='img'>
                        <img src="<?php echo $dp; ?>" alt="<?php echo $row_user['name']; ?>">
                    </div>
                    <h1 class="name"><?php echo $row_user['name']; ?></h1>
                    <h2 class="active" style="color: <?php echo $active_color; ?>; font-size:15px; font-size: 75px;position: absolute;">.</h2>
                </a>
            </li>

<?php
        }
    }
}

// Close the MySQL connection 
// mysqli_close($con);
?>









        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
// // Function to refresh section with new content
// function refreshSection() {
//     var conversationList = document.getElementById("conversation-list");
    
//     // Simulate refresh by resetting the innerHTML
//     conversationList.innerHTML = conversationList.innerHTML;
// }

// // Initial load
// refreshSection();

// // Refresh every 3 seconds
// setInterval(refreshSection, 3000); // 3000 milliseconds = 3 seconds

    </script>
</body>
</html>
