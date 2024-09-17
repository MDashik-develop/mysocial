<style>
:root {
    --green: rgb(0, 218, 98); /* color: var(--green); */
}

* {
    padding: 0;
    margin: 0;
    background-color: #0000000;
    
}

.containerr {
    
    overflow-X: hidden;
}

.main .details {
    max-height: 48px;
    height: 48px;
}

.details {
    max-width: 100%;
    padding: 0;
    margin: 0;
}

.dp-img-div {
    max-height: 50px;
    max-width: 50px;
    overflow: hidden;
    float: left;
    border-radius: 20%;
}

.post-details {
    padding: 0;
    width: 82%;
}

.main .details h4 {
    font-size: 18px;
    float: left;
    min-width: 3%;
    max-width: 50%;
    color: black;
    font-weight: 700;
    margin-left: 10px;
}

.main .details .felling {
    margin-left: 4px;
    font-size: 14px;
    float: left;
}

.main .details .location {
    margin-left: 0px;
    font-weight: 500;
    max-width: 200px;
    float: left;
}

.main .details .felling-name {
    float: left;
    font-size: 14px;
    margin-left: 5px;
    font-weight: 600;
}

.main .details button {
    border: none;
    background-color: transparent;
    float: right;
    margin-top: -10px;
    font-size: 21px;
    font-weight: 500;
    outline: 0;
}

.main .details .date-time {
    margin-left: 0px;
    padding: 0px;
    font-weight: 500;
    margin-left: 10px;
    margin-top: -17px;
}

.post-menu {
    float: left;
    font-size: 18px;
    font-weight: 700;
    min-width: 5%;
    max-width: 5%;
    text-align: center;
}

.status {
    display: flex;
    margin-top: 4px;
    min-width: 100%;
    max-width: 100%;
}

.status h2 {
    font-size: 15px;
    text-align: right;
    font-weight: 400;
}
.react_details{
    color: #000;
    min-width: 100%;
    background-color: whitesmoke;
    display: inline;
    width: cover;
}

.like-react-comment-share .ul {
    list-style: none;
    text-align: center;
    margin-top: 8px;
    margin-bottom: -10px;
}

.like-react-comment-share .ul li {
    display: inline-block;
    max-width: 32%;
    min-width: 32%;
    vertical-align: middle;
    font-size: 17px;
}

.like-react-comment-share .ul li p {}

.like-react-comment-share .ul li button {
    min-width: 100%;
}

.like-react-comment-share .ul li .count-react,
.count-cmnt,
.count-share {
    border: none;
    background-color: silver;
    padding: 9px 0px;
    border-radius: 31px;
}

.like-react-comment-share .ul li .count-react:hover,
.count-cmnt:hover,
.count-share:hover {
    background-color: gray;
}

.like-react-comment-share .ul li .count-react img,
.count-cmnt img,
.count-share img {
    margin-top: -8px;
}
.like-react-comment-share .cmnt{
    max-width: 100%;
    min-width: 100%;
    list-style: none;
}
.like-react-comment-share .cmnt li{
    display: inline-block;

}

.like-react-comment-share .cmnt :nth-child(1){
    min-width: 70%;
    display: inline;
    margin-left: 3px;

}
.like-react-comment-share .cmnt :nth-child(1) input{
    border-radius: 50px;
    border: none;
    height: 40px;
    background-color: whitesmoke;
    margin-top: 20px;
     box-sizing: border-box;
}
input:focus {
    outline: 2px solid #007bff; /* Blue outline */
}
.like-react-comment-share .cmnt :nth-child(2) button{
    border: none;
    background-color: silver;
    padding: 5px 50px;
    border-radius: 31px;
    margin-bottom: 5px;

}

.like-react-comment-share .cmnt :nth-child(2) img{
    border: none;
}
.active{
  font-size: 100px;
  color: green;
  position: Absolute;
  margin-left: -410px;
  margin-top: -112px;
  
}
</style>

<div class="main container containerr">
    <?php
    include("config/db.php");

    // Fetch all posts
    $feed_sql = "SELECT * FROM post WHERE post_user_name = '$my_unm' ORDER BY post_id DESC";
    $feed_query = mysqli_query($con, $feed_sql);

    while ($info = mysqli_fetch_array($feed_query)) {
        $post_id = $info['post_id'];

        // Fetch like count for the post
        $feed_sqll = "SELECT * FROM post_like WHERE post_id = $post_id";
        $feed_queryy = mysqli_query($con, $feed_sqll);
        $infoo = mysqli_fetch_array($feed_queryy);

        if (!$infoo) {
            // If no record exists, create a new one with 0 likes
            $infoo = ['react' => 0];
        }
    ?>

    <form action="#" method="POST" style="backdrop-filter: blur(37px); box-shadow: 0 2px 2px rgba(0.2, 0.2, 0.2, 0.2); height: auto; padding: 17px 8px; margin-top: 30px; border-radius: 20px;">
        <div class="details">
            <div class="dp-img-div">
                <a href="#"><img style="max-height: 100%; min-height: 100%; max-width: 100%; min-width: 100%;  transform: scale(1.3);" src="<?php
                    $post_user_name = $info['post_user_name'];
                    $post_user_sql = "SELECT * FROM user WHERE username='$post_user_name'";
                    $post_user_query = mysqli_query($con, $post_user_sql);
                    $post_user_row = mysqli_fetch_array($post_user_query);
                    echo $post_user_row['dp'];
                ?>"></a>
            </div>
            <div class="post-details" style="float: left;">
                <a href=""><h4><?php echo $post_user_row['name']; ?></h4></a>
                <p class="felling">Feeling</p>
                <p class="felling-name"><?php echo $info['post_felling']; ?></p>
                <!--<p style="padding-left: 10px;" class="location"><?php // echo $info['post_location']; ?></p>-->
            </div>
            <div class="post-menu">
                ...
            </div>
            <div class="date-time-div" style="float: left; min-width:80%;">
                <p class="date-time"><?php echo $info['post_date_time']; ?></p>
            </div>
            

            <br>
        </div>

        <?php
        $unmm =$post_user_row['username'];
        $time=time();
			  $res=mysqli_query($con,"select * from user where username='$unmm' AND last_login >$time");
			   $i=1;
			   while($row=mysqli_fetch_assoc($res)){

			   if($row['last_login']>$time){
	            $active = 'green';
                ?>

<span class="active">.</span>

                <?php
			   }
			   $i++;
			   } ?>


        <div class="status" style="text-align: center;">

            <h2><?php echo $info['post_caption']; ?></h2>
            <!-- Hidden field to store post ID -->
            <input type="hidden" name="pst_id" value="<?php echo $post_id; ?>">
        </div>
        <div class="img" style="max-width: 100%; width: 100%; text-align: center;">
            <img src="<?php echo $info['post_image_adress']; ?>" alt="" style="max-width: 100%; max-height:470px;">
        </div>

        <div class="like-react-comment-share">
               <?php
               $sqql = "SELECT SUM(ammount) AS total_likes FROM post_likes WHERE post_id = $post_id";
               $post_user_queryd = mysqli_query($con, $sqql);
               $post_user_rowsd = mysqli_fetch_array($post_user_queryd);
               ?>
            <a class="react_details" href=""><?php echo $post_user_rowsd['total_likes']; ?></a>
            <ul class="ul">
                <li><button type="submit" name="react" class="count-react">
                    <?php echo $post_user_rowsd['total_likes']; ?>
                    <img src="icon/bx-like.svg" alt="">
                </button></li>
                <li><button type="submit" name="cmnt" class="count-cmnt">
                <?php
               $sqqql = "SELECT SUM(ammount) AS total_comments FROM post_comment WHERE post_id = $post_id";
               $post_user_querydd = mysqli_query($con, $sqqql);
               $post_user_rowsdd = mysqli_fetch_array($post_user_querydd);
               ?>
                    <?php echo $post_user_rowsdd['total_comments']; ?>
                    <img src="icon/bx-comment-dots.svg" alt="">
                </button></li>
                <li><button type="submit" name="share" class="count-share">
                    <?php echo $infoo['react']; ?>
                    <img src="icon/bx-share.svg" alt="">
                </button></li>
            </ul>
            <ul>
          <!-- post downt comments -->
            <!-- ?php  
               $cmnt_sql = "SELECT * FROM post_comment WHERE post_id='$post_id'";
               $cmnt_post_user_querydd = mysqli_query($con, $cmnt_sql);
            while ($cmnt_post_user_rowsdd = mysqli_fetch_array($cmnt_post_user_querydd)) {
               ?>             
                <li> ?php echo $cmnt_post_user_rowsdd['commentt']; ?> </li>
                ?php } ?> -->
          <!-- post downt comments -->
            </ul>
            <ul class="cmnt">
                <li><input type="text" placeholder="Type comment..." name="cmnt"></li>
                    
                <li><button type="submit" name="cmt" value="cmt"><img src="icon/bx-comment-dots.svg" alt=""></button></li>
            </ul>
            
        </div>
    </form>

    <?php
    }

    // Handle form submission for date
    if (isset($_POST['react'])) {
        $pst_id = $_POST['pst_id'];
        $react = "likes";

        
        // insert date in database
        if ($like_row) {
            $update_query = "INSERT INTO post_likes (post_id, react, react_username, ammount) VALUES ('$pst_id', '$react', '$my_unm,  1)";
        } else {
            // Insert new record if not exists
            $update_query = "INSERT INTO post_likes (post_id, react, react_username, ammount) VALUES ('$pst_id', '$react', '$my_unm', 1)";
        }

        $result = mysqli_query($con, $update_query);
        if ($result) {
            echo "<meta http-equiv='refresh' content='0; url=#'>";
        } else {
            echo "<script>alert('Update failed')</script>";
        }
    }
    ?>



<?php

if (isset($_POST['cmt'])) {
        $cmnt = $_POST['cmnt'];
        $pst_id = $_POST['pst_id'];

        
        // insert date in database
        if ($like_roww) {
            $update_queryy = "INSERT INTO post_comment (post_id, commentt, comment_username, ammount) VALUES ('$pst_id', '$cmnt', '$my_unm,  1)";
        } else {
            // Insert new record if not exists
            $update_queryy = "INSERT INTO post_comment (post_id, commentt, comment_username, ammount) VALUES ('$pst_id', '$cmnt', '$my_unm', 1)";
        }

        $resultt = mysqli_query($con, $update_queryy);
        if ($resultt) {
            echo "<meta http-equiv='refresh' content='0; url=#'>";
        } else {
            echo "<script>alert('Update failed')</script>";
        }
    }
    ?>
</div>