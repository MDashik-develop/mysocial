<?php 

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>mySOCIAL - Log In</title>

	<link rel="stylesheet" type="text/css" href="style/sign-style.css">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="style/bootstrap2.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<style>
h1 {
	font-weight: bold;
	margin: 0;
	font-size: 28px;
}

h2 {
	text-align: center;
}
button {
    padding: 10px 34px;
    background: #33BE8F;
    }
form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 7px 11px;
	height: 100%;
	text-align: center;
}
</style>


</head>
<body>


<!-- register -->
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#" method="POST">
			<h1>Create Account</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your email for registration</span>
			<input type="text" name="reg_name" placeholder="Name" required />
			<input type="text" name="reg_username" placeholder="Username" required />
			<input type="email" name="reg_email" placeholder="Email" required />
			<input type="password" name="reg_password" placeholder="Password" required />
			<button type="submit" name="register">Sign Up</button>
		</form>
	</div>


<?php 
include("part/config/db.php");

$reg_name =$_POST['reg_name'];
$reg_username =$_POST['reg_username'];
$reg_email =$_POST['reg_email'];
$reg_password =$_POST['reg_password'];

if (isset($_POST['register'])) {

	$user_sql = "INSERT INTO `user` ( `name`, `username`, `email`, `password`, `nickname`) VALUES ('$reg_name', '$reg_username', '$reg_email', '$reg_password', 'nickname')";

	if (!(mysqli_query($con,$user_sql))) {

		echo "<script>alert('not insert')</script>";

	}else{

			      $unm = $reg_username;
  
            $_SESSION['username'] = $unm;
            header("location:reg-welcome.php");

	}


include("part/config/db_user.php");

	$table =	mysqli_query($con_user,"CREATE TABLE `$reg_username` (
			-- `postid` int(11) NOT NULL AUTO_INCREMENT,

		  	`username` varchar(50) NOT NULL,
		  	`password` varchar(255) NOT NULL,
		  	`name` varchar(255) NOT NULL,
		  	`dp_id` varchar(255) NOT NULL,
		  	`cover_id` varchar(255) NOT NULL,
		  	`post_id` varchar(255) NOT NULL

		    -- PRIMARY KEY (`postid`)
		)");

if (!$table) {
	  echo "<script>alert('not create')</script>";
}else{
	  // echo "<script>alert('yes create')</script>";



}

}
else{

}


?>

<!-- log -->



	<div class="form-container sign-in-container">
		<form action="#" method="POST">
			<h1>Sign in</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			<span>or use your account</span>
			<input type="text" name="login_email" placeholder="Email" />
			<input type="password" name="login_password" placeholder="Password" />
			<a href="#">Forgot your password?</a>
			<button type="submit" name="login">Log In</button>
		</form>


<?php 

if (isset($_POST['login_email'])) {
    
  $nm = $_POST['login_email'];
  $pwd   = $_POST['login_password'];

  $query = "SELECT * FROM user WHERE email='$nm' OR username='$nm' && password='$pwd' ";

  $data = mysqli_query($con,$query);
  $total = mysqli_num_rows($data);

if ($total == 0){
}
  if ($total == 1) {

            $row = mysqli_fetch_array($data);

              $unm = $row['username'];
  
            $_SESSION['username'] = $unm;
            header("location:login-welcome.php");

    ?>

    <!-- <meta http-equiv = "refresh" content= "0; url = https://saashik.com/projectwork/" /> -->

    <?php

  }else{

  echo "<script>alert('name or password does not match')</script>";
  }
}

  ?>


	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>mySOCIAL</h1>
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>mySOCIAL</h1>
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>

<footer>
	<p>
		Created with <i class="fa fa-heart"></i> by
		<a target="_blank" href="https://florin-pop.com">Florin Pop</a>
		- Read how I created this and how you can join the challenge
		<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
	</p>
</footer>




<script type="text/javascript">
	const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>







   <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="style/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <script src="style/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="style/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>