<?php
 include ("part/session.php");
include("part/start.php");
?>
	<title>Main</title>

</head>
</body>
<?php include ("part/headar.php");?>

<!-- <iframe style=" float:left; width: 15%; height: 100%;" src="left-side.php"></iframe>-->

<?php include ("part/feed.php");?>



<!-- <iframe style=" float: right; width: 15%; height: 100%;" src="right-side.php"></iframe> 

<div style="float: left;" class="left-side">
	<?php //include ("part/left.php");?>
</div>

<div style="" class="middle-side">
	<?php //include ("part/middle.php");?>
</div>

<div style="float: right;" class="right-side">
	<?php //include ("part/right.php");?>
</div> -->

<div class="down-menu">
	<ul>
		<a href="#"><li><img src="upload/icons/user.png"><span>Home</span></li></a>
		<a href="#"><li><img src="upload/icons/user.png"><span>search</span></li></a>
		<a href="#"><li><img src="upload/icons/user.png"><span>Create</span></li></a>
		<a href="friend.php"><li><img src="upload/icons/user.png"><span>Friend</span></li></a>
		<a href="#"><li><img src="upload/icons/user.png"><span>Account</span></li></a>
	</ul>
</div>



<?php include ("part/create-post.php");?>

<?php include ("part/end.php");?>