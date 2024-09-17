<?php
include ("session.php");
$time=time();
$res=mysqli_query($con,"select * from user");
$time=time()+7;
$res=mysqli_query($con,"update user set last_login=$time where id=$my_id");
?>