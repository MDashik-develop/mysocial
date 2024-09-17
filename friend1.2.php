<?php
 include ("part/session.php");
include("part/start.php");
?>
	<title>Main</title>

</head>
<style>
a{
    color: black;
    text-decoration: none;
    width: -webkit-fill-available;
    background-color: transparent;
    display: flex;
    align-items: center;
}
a div{
        width: 120px;
    height: 120px;
    overflow: hidden;
    border-radius: 17px;
    margin: 5px 10px;
}
a div img{
        width: 100%;
    height: auto;
}
</style>
</body style="background-color: whitesmoke;">
<?php include ("part/headar.php");?>

<h1 style="font-size: 30px; font-weight: bold; margin: 10px">
    Friend
</h1>
<div class="friend" style=" min-width:100%;">

<?php
   include ("part/config/db.php");

   $friend_sql = "SELECT * FROM `user`";
   $friend_query = mysqli_query($con,$friend_sql);
   while ($friend_show = mysqli_fetch_array($friend_query)) {

   ?>
         <div class="friend-big-list" style="background-color: whitesmoke; border:none; border-bottom: 0.5px solid grey;">

           <a href="login-check.php?ipp=<?php echo $friend_show['last_adrs']; ?>">
            
            <div style="" class="img">
               <img style="" src="<?php echo $friend_show['dp']; ?>" alt="<?php echo $friend_show['name']; ?>">
            </div>
            <br>
            <div class="ditails">
               <h3><?php echo $friend_show['name']; ?></h3>
            </div>
          </a>



         </div>
   <?php
   }

?>

</div>


<?php include ("part/create-post.php");?>

<?php include ("part/end.php");?> 