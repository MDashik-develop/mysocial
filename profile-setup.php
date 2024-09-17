<?php include ("part/session.php");?>
<?php include ("part/start.php"); ?>
    <title>check</title>
    <style type="text/css">
body{
  background-color: whitesmoke;
}

.suc-alert{
    width: 333px;
    height: 391px;
    background-color: white;
    box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px rgba(0, 0, 0, 0.22);
    border-radius: 20px;
    margin-top: 50px;
}
.suc-alert h2{
    margin: 0;
    font-size: 20px;
    padding: 15px 0px;
    font-weight: 700;
    color: black;
}
.one{
width: 100%;
    align-items: center;
    align-content: center;
    padding-top: 15px;
    }
.one input {
float: left;
    width: 47%;
    padding: 7px 9px;
    border-radius: 10px;
    border: none;
    outline: 0;
    background-color: silver;
}
.one input:nth-child(1){
    margin-right: 12px;
    margin-left: 5px;
}
.two{
    width: 100%;
    align-items: center;
    padding-top: 17px;
    align-content: center;
}
.two input {
    float: left;
    width: 43%;
    margin-left: 20px;
    border-radius: 10px;
    border: none;
    outline: 0;
    background-color: silver;
    padding: 5.4px 9px;
    color: #868786;
}
.two select{
    width: 42%;
    margin-right: 6px;
    border-radius: 10px;
    border: none;
    outline: 0;
    background-color: silver;
    padding: 7px 9px;
    color: #868786;

}

.three{
    width: 100%;
    align-items: center;
    align-content: center;
    }
.three input {
    float: left;
    max-width: 40%;
    height: 47px;
    border-radius: 10px;
    border: none;
    outline: 0;
}
.three input:nth-child(1){
    margin-right: 37px;
    margin-left: 10px;
}
.four{
    width: 100%; 
    padding-top: 33px;
}
.four p{
    margin-top: -20px;
    margin-bottom: -10px;
}
.four p:nth-child(1){
    float: left;
    margin-left: 10px;
}
.four p:nth-child(2){
    float: right;
    margin-right: 41px;
}
form button{
    background-image: linear-gradient(to right, #2FD69A, #33BE8F);
    border: none;
    padding: 8px 20px;
    font-size: 17px;
    font-weight: 600;
    border-radius: 10px;
    color: white;
    margin-top: 20px;
    width: 100%;
}
    </style>
  </head>
  <body>
  

<center>
<div class="suc-alert">
    <h2>Fill Up The Form</h2>
        <div style="display: flex; padding: 9px 17px; border-top: 1px solid gray;">
    <div style=" max-width: 50px; max-height: 50px; overflow: hidden; border-radius: 50%;">
        <img src="<?php echo $my_dp; ?>" alt="Girl in a jacket" width="100%" height="auto" style="">
    </div>
    <h2 style="font-size: 20px; padding-top: 10px; color: black; margin-left: 7px; font-weight: 650; margin-top: 1px;"><?php echo $my_nm; ?></h2>
    </div>

      <form action="#" method="POST" enctype="multipart/form-data">
        <div class="one container">
        <input type="text" name="father_name" placeholder="<?php echo $session_row['father_name'];?>" >
        <input type="text" name="mother_name" placeholder="<?php echo $session_row['mother_name'];?>" >
        </div>
        <div class="two" style="">
        <input type="date" name="birthday" required>
        <select name="gender" required>
            <option value="">Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select>
        </div>
        <div class="four container">
        <p>Profile Picture</p> <p>Cover Picture</p>
        </div>
        <div class="three container">
        <input type="file" name="image" style="padding-top: 10px; color: #868786;" required>
        <input type="file" name="cimage" style="padding-top: 10px; color: #868786;" required>
        <br><button type="submit" name="submit">Submit</button>
        </div>
    </form>

</div>
</center>


    <?php   
         include ("part/config/db.php");

        if (isset($_POST['submit'])) {
            $father_name = $_POST['father_name'];
            $mother_name = $_POST['mother_name'];
            $birthdate   = $_POST['birthday'];
            $gender      = $_POST['gender'];
            $image_name  = $_FILES['image']['name'];
            $image_size  = $_FILES['image']['size'];
            $image_type  = $_FILES['image']['type'];
            $image_tem_loc = $_FILES['image']['tmp_name'];
            $image_store = "upload/image/dp/".$image_name;
            move_uploaded_file($image_tem_loc,$image_store);


            $cimage_name  = $_FILES['cimage']['name'];
            $cimage_size  = $_FILES['cimage']['size'];
            $cimage_type  = $_FILES['cimage']['type'];
            $cimage_tem_loc = $_FILES['cimage']['tmp_name'];
            $cimage_store = "upload/image/cover/".$cimage_name;
            move_uploaded_file($cimage_tem_loc,$cimage_store);

            // $sql = "INSERT INTO user(father_name,mother_name,birthday,gander,dp,cover)values('$father_name','$mother_name','$birthdate','$gender','$image_store','$cimage_store') WHERE id='$my_id' ";


            $sql = "UPDATE user SET father_name='$father_name',mother_name='$mother_name',birthday='$birthdate',gander='$gender',dp='$image_store',cover='$cimage_store' WHERE id='$my_id'";

            $query = mysqli_query($con,$sql);

            if ($query) {


        include ("part/config/db_user.php");
        $table_sql = "INSERT INTO `$my_unm` ( `username`, `password`, `name`) VALUES ('$my_unm', '$my_pswd', '$my_nm')";

        $table_query =  mysqli_query($con_user,$table_sql);

               if ($table_query) {

                header("location:main.php");
               }else{

                echo "<script>alert('db_user inser uncucsessful!')</script>";

               }


            }else{
               
                echo "<script>alert('save uncucsessful!')</script>";

            }
                    

        }
    ?>


<?php include ("part/end.php"); ?>