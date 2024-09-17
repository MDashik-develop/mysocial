<style>	
	*{
		margin: 0;
		padding: 0;
	}
header{
	
  background-image: linear-gradient(to right, #2FD69A, #33BE8F);

/*		backdrop-filter: blur(37px);*/

  width: 100%;
  height: 60px;
  max-height: 60px;
  justify-content: center;
  align-items: center;
      /* margin-top: -40px; */
      border-radius: 13px;
	  z-index: 999;
}

header .brand{
  float: left;	
  max-width: 30%;
  min-width: 30%;
  min-height: 100%;
  background-color: transparent;
  margin-top: 10px;

}
header .brand a{
	text-decoration: none;
}
header .brand a h2{
	padding-top: 2px;
	font-weight: bold;
	font-size: 26px;
	font-family: sans-serif;
	color: black;
	text-decoration: none;
}
header .search{
	align-items: center;
	float: left;
    background-color: transparent;
    min-width: 40%;
    max-width: 40%;

}
header .search input{
	min-width: 80%;
	max-width: 80%;
	float: left;background-color: white;
	border: none;
	outline: 0;
	min-height: 50px;
	margin-top: 5px;
    border-bottom-left-radius: 13px;
    border-top-left-radius: 13px;
    padding-left: 5px;

}
header .search a{

	max-width: 20%;
	min-width: 20%;
	background-color: white;
	float: right;
	min-height: 50px;
	margin-top: 5px;
    border-bottom-right-radius: 13px;
    border-top-right-radius: 13px;
}
header .search a img{
   margin-top: 14px;
}
.img-div{
	border: 2.2px solid lime;
	min-width: 50px;
	max-width: 50px;
	min-height: 50px;
	max-height: 50px;
	-moz-border-radius: 25%;
    -webkit-border-radius: 25%;
    border-radius: 25%;
	float: right;
	overflow: hidden;
	margin-top: 5px;
	
}
header .menu .img-div img{
	float: right;
}
.HeaderHovarMenu{
	  backdrop-filter: blur(37px);
	  position: absolute;
	  min-width: 180px;
	  height: auto;
	  top: 111%;
	  right: 1%;
	  border-radius: 10px;
}
.HeaderHovarMenu ul{
		list-style: none;
		font-size: 18px;
		font-weight: 600;
	  margin:10px 8px;
	  width: 170px;
	  display: none;
}
header .menu img:hover + .HeaderHovarMenu{
	display: none;
}


</style>

<header style="position: -webkit-sticky; position: sticky; top: 0;">
	<div class="container">
		<div class="brand"><a href="main.php">
			<h2>mySOCIAL</h2>
		</a>
		</div>
		<center>
		<div class="search">
			<form action="search.php">
				<input type="text" name="search_value" placeholder="Search mySOCIAL.." required><a type="submit" href="search.php"><img src="upload/icons/search.svg"></a>
				
			</form>
		</div>
		</center>
		<div class="menu" onclick="HeaderHovarMenu()">
			<div class="img-div">
				<img src="<?php echo $my_dp; ?>" style="cursor: pointer; background-color: <?php echo $style_on_status; ?>; width: 100%; height: 100%;">
					
						<!--<a href="logout.php"><img src="upload/icons/logout.svg"></a>
						<a href="notification.php"><img src="upload/icons/bell.svg"></a>
						<a href="active-users.php"><img src="upload/icons/message.svg"></a> -->
			</div>
		</div>

			<div class="HeaderHovarMenu">
				<ul id="ull">

					<li style=" background-image: linear-gradient(to right, #2FD69A, #33BE8F); padding: 2px 20px; margin-top: 8px; border-radius: 7px;">
						<a href="profile.php?username=<?php echo $my_unm; ?>"><img src="upload/icons/user.png"><?php echo $my_nm; ?></a>
					</li>

					<li style=" background-image: linear-gradient(to right, #2FD69A, #33BE8F); padding: 2px 20px; margin-top: 8px; border-radius: 7px;">
						<a href="massage.php"><img src="upload/icons/message.svg">Massages</a>
					</li>

					<li style=" background-image: linear-gradient(to right, #2FD69A, #33BE8F); padding: 2px 20px; margin-top: 8px; border-radius: 7px;">
						<a href="friend.php"><img src="icon/bxs-user-check.svg">Friends</a>
					</li>

					<li style=" background-image: linear-gradient(to right, #2FD69A, #33BE8F); padding: 2px 20px; margin-top: 8px; border-radius: 7px;">
						<a href="notification.php"><img src="upload/icons/bell.svg">Notifications</a>
					</li>

					<li style=" background-image: linear-gradient(to right, #2FD69A, #33BE8F); padding: 2px 20px; margin-top: 8px; border-radius: 7px;">
						<a href="logout.php"><img src="upload/icons/logout.svg">Log Out</a>
					</li>

				</ul>
			</div>
	</div>
</header>  
<script>
/*	function HeaderHovarMenu() {
		document.getElementById("ull").style.display = "block";
	}*/

function HeaderHovarMenu() 
 {
 if(document.getElementById("ull").style.display == 'block')
  {
document.getElementById("ull").style.display = 'none';
  }else{
document.getElementById("ull").style.display = 'block';
}
 }

</script>