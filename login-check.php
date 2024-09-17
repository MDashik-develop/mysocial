<?php
include("part/session.php");

$user_ip = $_GET['ipp'];

// // Function to get the user's IP address
// function getUserIP() {
//     // Check for shared internet/ISP IP
//     if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
//         $ip = $_SERVER['HTTP_CLIENT_IP'];
//     }
//     // Check for IPs passing through proxies
//     elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
//         $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
//     }
//     // Check for standard remote IP
//     else {
//         $ip = $_SERVER['REMOTE_ADDR'];
//     }
//     return $ip;
// }

// // Get the user's IP address
// $user_ip = getUserIP();

// IP Geolocation API request (using ip-api.com)
$locationData = file_get_contents("http://ip-api.com/json/{$user_ip}");
// Convert the JSON response to an associative array
$location = json_decode($locationData, true);

// Display results on the same page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IP and Location Lookup</title>
</head>
<body>
    <h2>Your IP Address and Location Information</h2>

    <p><strong>IP Address:</strong> <?php echo $user_ip; ?></p>

    <?php if ($location && $location['status'] === 'success'): ?>
        <p><strong>Country:</strong> <?php echo $location['country']; ?></p>
        <p><strong>Region:</strong> <?php echo $location['regionName']; ?></p>
        <p><strong>City:</strong> <?php echo $location['city']; ?></p>
        <p><strong>ZIP Code:</strong> <?php echo $location['zip']; ?></p>
        <p><strong>Latitude:</strong> <?php echo $location['lat']; ?></p>
        <p><strong>Longitude:</strong> <?php echo $location['lon']; ?></p>
        <p><strong>ISP:</strong> <?php echo $location['isp']; ?></p>
    <?php else: ?>
        <p>Location information could not be retrieved for IP: <?php echo $user_ip; ?></p>
    <?php endif; ?>
</body>
</html>
