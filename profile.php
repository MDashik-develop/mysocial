<?php 
include ("part/session.php");
include ("part/start.php");

$user_unm = $_GET['username'];

?>
<title> <?php echo $my_nm; ?> - profile - mySOCIAL</title>
<style type="text/css">
	.container{
		padding-right: 7px;
		padding-left: 7px;
	}
	html, body{
  overflow: hidden;
  padding: 0px;
  margin: 0px;
  overflow-y: auto;
/*  background-color: darkblue;
  background-image: url('upload/image/bg.jpg');
  background-position: center;*/
}

.ttop{
  background-image: linear-gradient(to right, #2FD69A, #33BE8F);
  
  border-top-right-radius: 25px;
  border-top-left-radius: 25px;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
		min-height: 261px;

}


	.top{
/*		background-image: url();
		backdrop-filter: blur(17px);*/
/*		border-radius: 20px;*/
		margin-top: 3px;
		padding-top: 2px;
/*		border: 1px solid silver;*/
	}
	.top .top-icon{
		margin-top: 6px;
	}
	.top .top-icon .BackIcocn{
		float: left;
		margin-left: 10px;
	}
	.top .top-icon .EditIcon{
		float: right;
		margin-right: 10px;
	}
	

.name{
	max-height: 40px;
}
	
.name h2{
	max-height: 26px;
}
.name p{
	margin-left: 1px;
}


.option button{
	padding: 4px 10px;
  font-size: 18px;
  font-weight: 400;
  border-radius: 16px;
  border: none;
  background-color: silver;
  margin-right: 10px;

}
.option button:hover{
  background-image: linear-gradient(to right, #2FD69A, #33BE8F);

}
</style>
</head>
</body id="canvas">
<?php include ("part/headar.php");?>

<?php


if ($user_unm == $my_unm) {
?>

<div class="container ttop" style="margin-top: 0px;  background-image: url('<?php echo $my_cvr; ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">

						<div class="top">
						<div class="top-icon">
						<a class="BackIcocn" href="main.php"><img src="upload/icons/back.svg"></a>
						<a class="EditIcon" href="profile-setup.php"><img src="upload/icons/edit.svg"></a>
						</div>
					</div>
</div>

  <div class="full-page container" style="margin-top: 0px; ">


  	<div class="top-2" style="float: left;">
  		<center>
  		<div class="top-img" style="width: 180px; height: 180px; background-color: ; backdrop-filter: blur(17px); border-radius: 50%; margin-top: -100px; overflow: hidden; border: 1px solid silver;
">
  			<img src="<?php echo $my_dp ?>" style=" width: cover; height: 100%;">
  		</div>
		</center>
  	</div>
  	<div class="name">
  		<h2><?php echo $my_nm; ?></h2><p><?php echo $my_nknm; ?></p>
  		
  		<br>
  	</div>


<?php include ("part/create-post.php");?>

		<div style=" min-width: 30px; min-height: 30px; background-color: var(--green);position: fixed; top: 85%; right: 20%; z-index: -1; border-radius: 50%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
		
  </div>

  <div class="feed container">
  	
<div class="option" style="margin-top: 70px;">
	<hr>
	<center>
	<button>Photos</button>
	<button>Videos</button>
	<button>About</button>
	<button>friends</button>
	</center>
	<hr>

</div>

<div class="p-feed">

<?php
}else{

	$profile_sql  = "SELECT * FROM user WHERE username='$user_unm'";
	$profile_data = mysqli_query($con,$profile_sql);
	$profile_row = mysqli_fetch_array($profile_data);

?>

<div class="container ttop" style="margin-top: 0px;  background-image: url('<?php echo  $profile_row['cover']; ?>');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;">

						<div class="top">
						<div class="top-icon">
						<a class="BackIcocn" href="main.php"><img src="upload/icons/back.svg"></a>
						<a class="EditIcon" href="#"><img src="upload/icons/edit.svg"></a>
						</div>
					</div>
</div>

  <div class="full-page container" style="margin-top: 0px; ">


  	<div class="top-2" style="float: left;">
  		<center>
  		<div class="top-img" style="width: 180px; height: 180px; background-color: ; backdrop-filter: blur(17px); border-radius: 50%; margin-top: -100px; overflow: hidden; border: 1px solid silver;
">
  			<img src="<?php echo $profile_row['dp']; ?>" style=" width: cover; height: 100%;">
  		</div>
		</center>
  	</div>
  	<div class="name">
  		<h2><?php echo $profile_row['name']; ?></h2><p><?php echo $profile_row['nickname']; ?></p>
 	<br>

  		<a class="" style=" min-width: 93px; min-height: 30px; background-color: var(--green); position: absolute; top: 53.4%; right: 23%; z-index: 1; border-radius: 20px; font-size: 17px!important; text-align-last: center; color: white; font-size: 15px; font-weight: 700; padding-top: 1px;"  href="massage-proccess.php?receiver_id=<?php echo $profile_row['id']; ?>">
			Massage
		</a>


	
  	
						


<?php include ("part/create-post.php");?>

		<div style=" min-width: 30px; min-height: 30px; background-color: var(--green); 		position: fixed;
		top: 85%;
		right: 20%; z-index: -1; border-radius: 50%; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);"><div class=""></div></div>
  </div>

  <div class="feed container">
  	
<div class="option" style="margin-top: 70px;">
	<hr>
	<center>
	<button>Photos</button>
	<button>Videos</button>
	<button>About</button>
	<button>friends</button>
	</center>
	<hr>

</div>

<div class="p-feed">


<?php
}
?>


	



<?php include ("part/profile-feed.php");?>




</div>

  </div>

<?php include ("part/end.php");?>
