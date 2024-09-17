<?php
session_start();

 $unm = $_SESSION['username'];
 if (!$unm) {
  header("location:login.php");
}
else{
}

include("config/db.php");
  $session_sql  = "SELECT * FROM user WHERE username='$unm'";
  $session_data = mysqli_query($con,$session_sql);
  $session_row = mysqli_fetch_array($session_data);

  $my_unm = $session_row['username'];
  $my_nm  = $session_row['name'];
  $my_eml = $session_row['email'];
  $my_pswd= $session_row['password'];
  $my_id  = $session_row['id'];
  $my_dp  = $session_row['dp'];
  $my_cvr = $session_row['cover'];
  $my_nknm= $session_row['nickname'];
  $my_stdy= $session_row['study'];
  $my_frm = $session_row['from'];
  $my_lvs = $session_row['lives'];
  $my_wrk = $session_row['work'];

?>