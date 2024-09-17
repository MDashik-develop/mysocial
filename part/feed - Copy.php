<style>
:root {
    --green: rgb(0, 218, 98); /* color: var(--green); */
}

* {
    padding: 0;
    margin: 0;
    background-color: #0000000;
}

.container {
    
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
    width: 83%;
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
     padding-left: 20px;
}
input:focus {
    outline: 2px solid #007bff; /* Blue outline */
}
.like-react-comment-share .cmnt :nth-child(2) button{
    border: none;
    background-color: silver;
    padding: 5px 40px;
    border-radius: 31px;
    margin-bottom: 5px;

}

.like-react-comment-share .cmnt :nth-child(2) img{
    border: none;
}
.active{
    font-size: 100px;
    color: red;
    position: Absolute;
    margin-left: 30px;
    /* margin-top: -347px; */
    margin-top: -54.5px;
    padding: 0px;
    line-height: 0px;
}
</style>

<div class="main container">
    <?php
        include("config/db.php");

        // Fetch all posts
        $feed_sql = "SELECT * FROM post ORDER BY post_id DESC";
        $feed_query = mysqli_query($con, $feed_sql);

            // time ago mesthod 
     
                date_default_timezone_set('Asia/Dhaka');  

                function time_ago($time)
                    {
                    $time_difference = time() - strtotime($time);
                    $seconds = $time_difference;
                    $minutes = round($seconds / 60);
                    $hours = round($seconds / 3600);
                    $days = round($seconds / 86400);
                    $weeks = round($seconds / 604800);
                    $months = round($seconds / 2629440);
                    $years = round($seconds / 31553280);
                
                    if ($seconds <= 60) {
                        return "$seconds seconds ago";
                    } elseif ($minutes <= 60) {
                        return "$minutes minutes ago";
                    } elseif ($hours <= 24) {
                        return "$hours hours ago";
                    } elseif ($days <= 7) {
                        return "$days days ago";
                    } elseif ($weeks <= 4.3) { // 4.3 == 30/7
                        return "$weeks weeks ago";
                    } elseif ($months <= 12) {
                        return "$months months ago";
                    } else {
                        return "$years years ago";
                    }
                }
                                

        while ($info = mysqli_fetch_array($feed_query)) {
            $post_id = $info['post_id'];

            // time ago action 
            $tim = $info['post_date_time'];
            $post_time = $tim; // Post creation time


                // Fetch user details
                $post_user_name = $info['post_user_name'];
                $post_user_sql = "SELECT * FROM user WHERE username='$post_user_name'";
                $post_user_query = mysqli_query($con, $post_user_sql);
                $post_user_row = mysqli_fetch_array($post_user_query);

                    // Fetch like count for the post
                    $likes_sql = "SELECT SUM(ammount) AS total_likes FROM post_likes WHERE post_id = $post_id";
                    $likes_query = mysqli_query($con, $likes_sql);
                    $likes_data = mysqli_fetch_array($likes_query);
                    $total_likes = $likes_data['total_likes'] ?? 0;

                        // Check if the current user has liked the post
                        $likes_check_sql = "SELECT * FROM post_likes WHERE post_id = $post_id AND react_username = '$my_unm'";
                        $likes_check_query = mysqli_query($con, $likes_check_sql);
                        $likes_already = mysqli_num_rows($likes_check_query) > 0;

                            //fetch comment for the post
                            $comments_sql = "SELECT SUM(ammount) AS total_comments FROM post_comment WHERE post_id = $post_id";
                            $comments_post_user_queryd = mysqli_query($con, $comments_sql);
                            $comments_user_rows = mysqli_fetch_array($comments_post_user_queryd);
                            $total_comments = $comments_user_rows['total_comments'] ?? 0;

                                
                     ?>

            <form action="#" method="POST" style="backdrop-filter: blur(37px); height: auto; padding: 17px 8px; margin-top: 30px; border-radius: 20px; box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;">
                <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">

                <div class="details">
                    <div class="dp-img-div">
                        <a href="profile.php?username=<?php echo $post_user_name; ?>"><img style="max-height: 100%; min-height: 100%; max-width: 100%; min-width: 100%;  transform: scale(1.3);" src="<?php echo $post_user_row['dp'];?>"></a>
                    </div>
                    <div class="post-details" style="float: left;">
                        <a href="profile.php?username=<?php echo $post_user_row['username']; ?>"><h4><?php echo $post_user_row['name']; ?></h4></a>
                        <p class="felling">Feeling</p>
                        <p class="felling-name"><?php echo $info['post_felling']; ?></p>
                        <p style="padding-left: 10px;" class="location"><?php echo $info['post_location']; ?></p>
                    </div>
                    <div class="post-menu">
                        ...
                    </div>
                    <div class="date-time-div" style="float: left; min-width:80%;">
                        <p class="date-time" id="timeAgo">
                            <?php                        
                            $tim = $info['post_date_time'];
                            echo time_ago($post_time); // Output: "X minutes/hours/days ago"
                            ?>        
                        </p>

                    </div>
                    

                    <br>
                </div>




                <div class="status" style="text-align: center;">
                        <span class="active" style="color:<?php
                        
                                //active methood
                                $unmm =$post_user_row['username'];
                                $time=time();
                                    $res=mysqli_query($con,"select * from user where username='$unmm' AND last_login >$time");
                                    $i=1;
                                    while($row=mysqli_fetch_assoc($res)){

                                            if($row['last_login']>$time){
                                                $active = 'green';
                                                echo"green";
                                            }
                                    $i++;
                                    }
                            ?>;">
                            .
                        </span>

                    <h2><?php echo $info['post_caption']; ?></h2>
                </div>
                <div class="img" style="max-width: 100%; width: 100%; text-align: center;">
                    <img src="<?php echo $info['post_image_adress']; ?>" alt="" style="max-width: 100%; max-height:470px;">
                </div>

                <div class="like-react-comment-share">
                    <!-- <a class="react_details" href=""><?php //echo $total_likes; ?>React</a> -->
                    <ul class="ul">
                        <li>
                            <button type="submit" id="likeButton" name="react" class="count-react" style="background-color: <?php echo $likes_already ? 'var(--green)' : 'silver'; ?>;" >
                                <?php echo $total_likes; ?>
                                <img src="icon/bx-like.svg" alt="">
                        </button>
                        </li>
                        <li>
                            <button type="submit" name="cmnt" class="count-cmnt">
                                <?php echo $total_comments; ?>
                                <img src="icon/bx-comment-dots.svg" alt="">
                            </button>
                        </li>
                        <li>
                            <button type="submit" name="share" class="count-share">
                                <?php // echo $total_share; ?>
                                <img src="icon/bx-share.svg" alt="">
                            </button>
                        </li>
                    </ul>
                    <ul>
                        <!-- post downt comments -->
                            <!-- ?php  
                            $cmnt_sql = "SELECT * FROM post_comment WHERE post_id='$post_id'";
                            $cmnt_comments_post_user_queryd = mysqli_query($con, $cmnt_sql);
                            while ($cmnt_comments_user_rows = mysqli_fetch_array($cmnt_comments_post_user_queryd)) {
                            ?>             
                                <li> ?php echo $cmnt_comments_user_rows['commentt']; ?> </li>
                                ?php } ?> -->
                        <!-- post downt comments -->
                    </ul>
                    <ul class="cmnt">
                        <li>
                            <input type="text" placeholder="Type comment..." name="comment">
                        </li>  
                        <li>
                            <button type="submit" name="post_comment" value="cmt">
                                <img src="icon/bx-comment-dots.svg" alt="">
                            </button>
                        </li>
                    </ul>                    
                </div> 
            </form>
            </form>

<?php
} // End of while loop

// Handle like functionality
if (isset($_POST['react'])) {
    $pst_id = $_POST['post_id'];

    // Check if the user already liked the post
    $likes_check_sql = "SELECT * FROM post_likes WHERE post_id = $pst_id AND react_username = '$my_unm'";
    $likes_check_query = mysqli_query($con, $likes_check_sql);

    if (mysqli_num_rows($likes_check_query) > 0) {
        // If liked, unlike the post
        $delete_like_query = "DELETE FROM post_likes WHERE post_id = '$pst_id' AND react_username = '$my_unm'";
        mysqli_query($con, $delete_like_query);
    } else {
        // If not liked, like the post
        $insert_like_query = "INSERT INTO post_likes (post_id, react_username, ammount) VALUES ('$pst_id', '$my_unm', 1)";
        mysqli_query($con, $insert_like_query);
    }

    // Refresh the page after submitting the like/unlike action
    echo "<meta http-equiv='refresh' content='0'>";
}

// Handle form submission for comments
if (isset($_POST['post_comment'])) {
    $cmnt = $_POST['comment'];
    $pst_id = $_POST['post_id'];

    // Insert the comment into the database
    $update_queryy = "INSERT INTO post_comment (post_id, commentt, comment_username, ammount) VALUES ('$pst_id', '$cmnt', '$my_unm', 1)";

    $resultt = mysqli_query($con, $update_queryy);
    if ($resultt) {
        echo "<meta http-equiv='refresh' content='0; url=main.php'>";
    } else {
        echo "<script>alert('Comment failed')</script>";
    }
}
?>

</div>