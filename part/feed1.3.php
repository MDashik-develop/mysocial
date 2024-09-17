<style>

:root{
    --green: rgb(0, 218, 98);     /*  color: var(--green);  */
}

*{
    padding: 0;
    margin: 0;
    background-color: #0000000;
}
.container{
}
.main .details{
    max-height: 48px;
    height: 48px;

}
.details{
    max-width:100%;
    padding: 0;
    margin: 0;
}
.dp-img-div{
  /* border: 2.2px solid lime; */
  max-height: 50px; 
  max-width: 50px;
  overflow: hidden;
  float: left;
  -moz-border-radius: 20%;
  -webkit-border-radius: 20%;
  border-radius: 20%;

}
.post-details{
  padding: 0;
  background-color: green;
  width: 83%;
}
.main .details h4{
    font-size: 18px;
     float: left;
     min-width: 30%;
     max-width: 50%;
     color:  black;
     font-weight: 700;
     margin-left: 10px;
    background-color: lime;

}
.main .details .felling{
    margin-left: 4px;
    font-size: 14px;
    float: left;
    background-color: aqua;
}
.main .details .location{
  margin-left: 0px;
  font-weight: 500;
  max-width: 200px;
  float: left;
  background-color: blue;
}
.main .details .felling-name{
    float: left;
    font-size: 14px;
    margin-left: 5px;
    font-weight: 500;
    background-color: aqua;
}
.main .details button{
    border: none;
    background-color: transparent;
    float: right;
    margin-top:  -10px;
    font-size: 21px;
    font-weight: 500;
    outline: 0;
}
.main .details .date-time{

    margin-left: 0px;
    padding: 0px;
    font-weight: 500; 
    margin-left: 10px;
    margin-top: -17px;
}
.post-menu{
  float: left;
  font-size: 18px;
  font-weight: 700;
  background-color: silver;
  min-width: 5%;
  max-width: 5%;
  text-align: center;
}

.status{
  display: flex;
  margin-top: 4px;
  min-width: 100%;
  max-width: 100%;
}
.status h2{
    font-size: 14.2px;
    text-align: right;
    font-weight: 350;
}


.like-react-comment-share ul{
  list-style: none;
  text-align: center;
  margin-top: 8px;
  margin-bottom: -10px;
}
.like-react-comment-share ul li{
  display: inline-block;
  max-width: 32%;
  min-width: 32%;
  vertical-align: middle;
  font-size: 17px;
}
.like-react-comment-share ul li p {
}
.like-react-comment-share ul li button{
  min-width: 100%;
}
.like-react-comment-share ul li .count-react, .count-cmnt, .count-share{
  border: none;
  background-color: silver;
  padding:9px 0px;
  border-radius: 31px;
}
.like-react-comment-share ul li .count-react:hover, .count-cmnt:hover, .count-share:hover{
  background-color: gray;
}
.like-react-comment-share ul li .count-react img, .count-cmnt img , .count-share img{
 margin-top: -8px;
}




  </style>
   <div class="main container">

   	<?php 
          include("config/db.php");
          $feed_sql = "SELECT * FROM post  ORDER BY post_id DESC";
          $feed_sqll = "SELECT * FROM post_like  ORDER BY post_id DESC";

              $feed_query = mysqli_query($con,$feed_sql);
              $feed_queryy = mysqli_query($con,$feed_sqll);
              while ($info = mysqli_fetch_array($feed_query)) {
                $infoo = mysqli_fetch_array($feed_queryy)

              // 	$urnm = $info['post_user_name'];

              // 	$Post_user_sql = "SELECT * FROM user WHERE username='$urnm'";
              // $_query = mysqli_query($con,$Post_user_sql);
              // while ($Post_user_info = mysqli_fetch_array($feed_query)) {

			?>

		<form action="#" method="POST" style=" backdrop-filter: blur(37px); height: auto; padding: 17px 8px; margin-top: 30px; border-radius: 20px;">

        <div class="details" style="">

            <div class="dp-img-div" style=""><a href="#"><img style=" max-height: 100%; min-height: 100%; max-width: 100%; min-width: 100%; " src="
              <?php
                $post_user_name  = $info['post_user_name'];
                $post_user_sql   = "SELECT * FROM user WHERE username='$post_user_name'";
                $post_user_query = mysqli_query($con,$post_user_sql);
                $post_user_row   = mysqli_fetch_array($post_user_query);
                
                echo $post_user_row['dp'];

              ?>">
              </a> 
            </div>

            <div class="post-details" style="float: left;">  
              <a href=""><h4><?php echo $post_user_row['name']; ?></h4></a> <p class="felling">Felling</p><p class="felling-name"><?php  echo $info['post_felling']; ?></p><p style="padding-left: 10px;" class="location"><?php echo $info['post_location']; ?></p>
            </div>
            <div class="post-menu">
              ...
            </div>
            <div class="date-time-div" style="float: left; min-width:80%; background-color: pink;">
              <p class="date-time" style=" "><?php echo $info['post_date_time']; ?></p>
            </div>
            


            <br>

        </div>
        <div class="status" style=" text-align: center;">
           
            <h2><?php echo $info['post_caption']; ?></h2>
            <p value="<?php echo $infoo['post_id'];?>" name="pst_id"><?php echo $infoo['post_id'];?></p>
            
        </div>
        <div class="img" style=" max-width: 100%; width: 100%; text-align: center;">
            <img src="<?php echo $info['post_image_adress']; ?>" alt="" style="max-width: 100%; max-height:470px;">
        </div>

        <div class="like-react-comment-share">
          <p><?php echo $infoo['react'];  $rac = $infoo['react'];  ?></p>
          <ul>
            <li><button type="submit" name="react" class="count-react">
            <?php  $rac = $infoo['react']; echo $rac; ?>
            <img src="icon/bx-like.svg" alt="">
            </button></li>
            <li><button type="submit" name="cmnt" class="count-cmnt">
            <?php  $rac = $infoo['react']; echo $rac; ?>
            <img src="icon/bx-comment-dots.svg" alt="">
            </button></li>
            <li><button type="submit" name="share" class="count-share">
            <?php  $rac = $infoo['react']; echo $rac; ?>
            <img src="icon/bx-share.svg" alt="">
            </button></li>
          </ul>     
        </div>

    </form>
  
<?php
// }
		}


    
    if (isset($_POST['react'])) {
      $pst_id = $_POST['pst_id'];
      
      $pals = 1;
      $likreact = $rac + $pals;

      
      $post_sqlll = "UPDATE post_like SET react = '5' WHERE post_id = $pst_id ";
      
          $post_query = mysqli_query($con,$post_sqlll);
          if (!$post_query) {
              
              echo "<script>alert('Post Unsucssesfull')</script>";
      
          }else{
      
                 
          ?>
      
          <meta http-equiv = "refresh" content= "0; url = main.php" />
      
          <?php
      
      
          }
      
      
      }



		 ?>


    </div>