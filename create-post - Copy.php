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
   height: 450px;
   background-color: white;
   box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
      0 10px 10px rgba(0,0,0,0.22);
      border-radius: 20px;
      margin-top: 50px;
}
h2{
    font-size: 20px;
    padding-top: 10px;
    color: #33BE8F;
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
    background-color: whitesmoke;
    margin-bottom: 10px;
    padding: 10px;
}

.one .location{
    background-color: whitesmoke;
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
    display: inline-block;
}
.two input {
    float: left;
    width: 42%;
    height: 38px;
    margin-left: 20px;
    border-radius: 10px;
    border: none;
    outline: 0;
    background-color: whitesmoke;
    color: #868786;
}
.two select{
/*    width: 42%;*/
    width: 90%;
    height: 38px;
    border-radius: 10px;
    border: none;
    outline: 0;
    background-color: whitesmoke;
    color: #868786;
    float: left;
    margin-left: 16px;

}

.three{
    width: 100%;
    align-items: center;
    align-content: center;
    padding-top: px;
    background-color: whitesmoke;
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
    padding: 8px 20px;
    font-size: 17px;
    font-weight: 600;
    border-radius: 10px;
    color: white;
    margin-top: 20px;
}
    </style>
</head>
<body>
<?php include ("part/headar.php");?>

<div class="full-page container">
	
<center>
<div class="suc-alert">
    <h2>Create a post</h2>

      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="one container">

           <textarea name="post_caption" placeholder="write your mind.."  rows="4" cols="40"></textarea>
           <input type="text" class="location" name="post_loacation" placeholder="write location">
           <!-- <input style="visibility: hidden;" type="text" class="location" value="<?php echo $date; ?>" name="post_loacation"> -->
        </div><br>

        <div class="two" style="padding-top: 4px;">

        <select name="post_felling">
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
        <!-- <select name="post_felling">
            <option value="">😊 Felling </option>
            <option value="angry"> angry</option><hr>
            <option value="happy"> happy</option>
            <option value="lovely"> lovely</option>
            <option value="loved"> loved</option>
            <option value="cool"> cool</option>
            <option value="thankful">thankful</option>
            <option value="sad"> sad</option>
            <option value="excited"> excited</option>
            <option value="in love"> in love</option>
            <option value="crazy"> crazy</option>
            <option value="fantastic"> fantastic</option>
        </select> -->
        </div>

<!--         <div class="four container">
        <p>Profile Picture</p> <p>Cover Picture</p>
        </div> -->

        <input type="file" name="image" style="padding-top: 10px; color: #868786;" placeholder="pic">
        <br>
        <button type="submit" name="submit">Submit</button>
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