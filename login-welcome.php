<?php
include("part/session.php");

function getUserIP() {
    // Check for shared internet/ISP IP
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    // Check for IPs passing through proxies
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    // Check for standard remote IP
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

// Display the IP address
$user_ip = getUserIP();
// echo "Your IP Address is: " . $user_ip;



$sqll = "UPDATE user SET last_adrs = '$user_ip' WHERE username = '$my_unm'";
$q = mysqli_query($con, $sqll);

if(!$q){

 echo "Your IP Address is: !";

}else{
 echo "Your IP Address is: " . $user_ip;

}

?>

<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>check</title>
    <style type="text/css">
body{
  background-color: whitesmoke;
}
svg {
  display: block;
  height: 100px;
  width: 100px;
  color: #33BE8F; /* SVG path use currentColor to inherit this */
  margin-top: 100px;
  padding-top: 50px;
}

.circle {
  stroke-dasharray: 76;
  stroke-dashoffset: 76;
  animation: draw 1s forwards;
}

.tick {
  stroke-dasharray: 18;
  stroke-dashoffset: 18;
  animation: draw 1s forwards 1s;
}

@keyframes draw { 
  to { stroke-dashoffset: 0 } 
}

.suc-alert{
   width: 333px;
   height: 356px;
   background-color: white;
   box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
      0 10px 10px rgba(0,0,0,0.22);
      border-radius: 20px;
}
h2{
  font-size: 29px;
}
p{
  font-weight: 400px;
  font-size: 24px;
  margin-top: -15px;
}
a{
  text-decoration: none;
  background-image: linear-gradient(to right, #2FD69A, #33BE8F);
  color: white;
  padding: 6px 13px;
  border-radius: 10px;
}

    </style>
  </head>
  <body>
  

<center>
<div class="suc-alert">
<svg viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
  <g stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="round" stroke-linejoin="round">
    <path class="circle" d="M13 1C6.372583 1 1 6.372583 1 13s5.372583 12 12 12 12-5.372583 12-12S19.627417 1 13 1z"/>
    <path class="tick" d="M6.5 13.5L10 17 l8.808621-8.308621"/>
  </g>
</svg>
<h2><?php echo $my_nm; ?></h2>
<p>You sucsessfully log in</p>
<a href="main.php">Go Home</a>
</div>
</center>

</body>
</html>