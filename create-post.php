<?php 
include ("part/session.php");
include ("part/start.php");// Change the line below to your timezone!
date_default_timezone_set('Asia/Dhaka');
// $date = date('Y-m-d h:i:s a', time());
$date = date('Y-m-d H:i:s', time());

?>
<title>Create Post - mySocial</title>
    <style>
body{
  background-color: whitesmoke;
}

.suc-alert{
   width: 333px;
   height: 360px;
   background-color: white;
   box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
      0 10px 10px rgba(0,0,0,0.22);
      border-radius: 20px;
      margin-top: 50px;
}

.one{
    width: 100%;
    align-items: center;
    align-content: center;
    margin-top: 20px;
    }
.one textarea {
    float: left;
    width: 100%;
    border-radius: 10px;
    border: none;
    outline: 0;
    background-color: silver;
    margin-bottom: 10px;
    padding: 10px;
    margin-top: -22px;
}

.one .location{
    background-color: silver;
    border-radius: 10px;
    border: none;
    outline: 0;
    width: 100%;
    height: 30px;
    font-size: 13px;
    padding: 10px;
}
.two{
    min-width: 100%;
    align-items: center;
    margin-top: -20px;
    align-content: center;
    display: flex;
    gap: 5px;
}
.two input {
    width: 17%;
    height: 55px;
    margin-left: -63px;
    border-radius: 10px;
    border: none;
    outline: 0;
    background-color: silver;
    color: #868786;
    opacity: 0;
}
.two select{
    /* width: 42%; */
    width: 15%;
    /* height: 38px; */
    border-radius: 10px;
    border: none;
    outline: 0;
    background-color: silver;
    color: #868786;
    float: left;
    margin-left: 16px;
    appearance: none;
    padding: 8px 10px;
    font-size: 21px;
}

.three{
    width: 100%;
    align-items: center;
    align-content: center;
    padding-top: px;
    background-color: silver;
    }
.three input {
    float: left;
    max-width: 40%;
    height: 47px;
    border-radius: 10px;
    border: none;
    outline: 0;
    margin-left: 20px;
    display: inline-block;
}
button{
    background-image: linear-gradient(to right, #2FD69A, #33BE8F);
    border: none;
    padding: 10px 77px;
    font-size: 19px;
    font-weight: 700;
    border-radius: 10px;
    color: white;
    margin-left: 0px;
}
    </style>
</head>
<body>
<?php include ("part/headar.php");?>

<div class="full-page container">
	
<center>
<div class="suc-alert">
    <h2 style="font-size: 20px; padding: 12px; color: black;">Create a post</h2>
    <div style="display: flex; padding: 9px 17px; border-top: 1px solid gray;">
    <div style=" max-width: 50px; max-height: 50px; overflow: hidden; border-radius: 50%;">
        <img src="<?php echo $my_dp; ?>" alt="Girl in a jacket" width="100%" height="auto" style="">
    </div>
    <h2 style="font-size: 20px; padding-top: 10px; color: black; margin-left: 7px; font-weight: 650; margin-top: 1px;"><?php echo $my_nm; ?></h2>
    </div>


      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="one container">

           <textarea name="post_caption" placeholder="write your mind.."  rows="4" cols="40"></textarea>
           <input type="text" class="location" name="post_loacation" placeholder="write location">
           <!-- <input style="visibility: hidden;" type="text" class="location" value="<?php echo $date; ?>" name="post_loacation"> -->
        </div><br>

        <div class="two" style="padding-top: 4px;">

        <select name="post_felling" required>
            <option value="">😊 Felling </option>
            <option value="😠">😠 angry</option><hr>
            <option value="😊_happy">😊 happy</option>
            <option value="🥰_lovely">🥰 lovely</option>
            <option value="😍_loved">😍 loved</option>
            <option value="😎_cool">😎 cool</option>
            <option value="😃_thankful">😃 thankful</option>
            <option value="😥_sad"> 😥s ad</option>
            <option value="😄_excited">😄 excited</option>
            <option value="😘_in love">😘 in love</option>
            <option value="🤪_crazy">🤪 crazy</option>
            <option value="😁_fantastic">😁 fantastic</option>
        </select>
        <img src="icon/photos.png" alt="Girl in a jacket" width="60px" height="" style="    background-color: silver;
    padding: 8px 10px;
    border-radius: 6px;
    width: 52px;">
        <input type="file" name="image" style="" placeholder="pic">
        <button type="submit" name="submit">Post</button>
        </div>

<!--         <div class="four container">
        <p>Profile Picture</p> <p>Cover Picture</p>
        </div> -->

        </div>
    </form>

</div>
</center>



<?php 

if (isset($_POST['submit'])) {
    
$post_caption = $_POST['post_caption'];
$post_loacation = $_POST['post_loacation'];
$post_felling = $_POST['post_felling'];
$image_name  = $_FILES['image']['name'];
$image_size  = $_FILES['image']['size'];
$image_type  = $_FILES['image']['type'];
$image_tem_loc = $_FILES['image']['tmp_name'];
$image_store = "upload/image/post_image/".$image_name;
move_uploaded_file($image_tem_loc,$image_store);

$post_sql = "INSERT INTO `post` ( `post_caption`, `post_image`, `post_image_adress`, `post_user`, `post_user_name`, `post_felling`, `post_location`, `post_date_time`, `post_type`) VALUES ('$post_caption', '$image_name', '$image_store', '$my_nm', '$my_unm', '$post_felling', '$post_loacation', '$date', 'upload')";

    $post_query = mysqli_query($con,$post_sql);

$post_sqll = "INSERT INTO `post_like` ( `my_username`, `react`) VALUES ( '$my_unm', 0)";

    $post_queryy = mysqli_query($con,$post_sqll);
    if (!$post_query && !$post_queryy) {
        
        echo "<script>alert('Post Unsucssesfull')</script>";

    }else{

           
    ?>

    <meta http-equiv = "refresh" content= "0; url = main.php" />

    <?php


    }


}

?>


</div>
<?php include ("part/end.php");?>