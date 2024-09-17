
<?php
// Include the session and connection files
include("session.php");

// Initialize an empty array to store conversations
$conversations = array();

// Fetch all conversations where the current user is involved
$sql = "SELECT * FROM conversations WHERE user1_id = $my_id OR user2_id = $my_id";
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

            <li>
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