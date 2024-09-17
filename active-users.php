<?php 
include ("part/session.php");
include ("part/start.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
    <link rel="stylesheet" href="style/main.css">


      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="style/bootstrap2.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


<title><?php echo $my_nm; ?> - Active usrs on mySOCIAL</title>

</head>
</body>
<?php include ("part/headar.php");?>

<div class="full container" style="background-color: white;">
	

         <table class="table table-striped table-bordered" style="background-color: whitesmoke; max-width: 100%; border: none;">
            <thead>
               <tr>
                  <!-- <th width="5%">#</th> -->
                  <!-- <th width="80%">Name</th>
                  <th width="15%">Status</th> -->
               </tr>
            </thead>
            <tbody id="user_grid" style="max-width: 100%; border: none; background-color: white;">
<!--    <?php 

			  $time=time();
			  $res=mysqli_query($con,"select * from user where last_login >$time");
			   $i=1;
			   while($row=mysqli_fetch_assoc($res)){
			   $status='Offline';
			   $class="btn-danger";
	         $style_on_status = ' background-color: black;';

			   if($row['last_login']>$time){
					$status='';
					$class="btn-success";
	            $style_on_status = ' background-color: green;';

			   }
			   ?>	-->
<!-- 			    
               <tr>
                  <th scope="row"  width="10%"><?php echo $i?></th> 
                  <td class="name" width="80%"><?php echo $row['username']?></td>
                  <td width="10%"><button style="border-radius: 50%; min-width: 10px; min-height: 10px; border: none;  '.$style_on_status.'" class="status" type="button" class="btn <?php echo $class?>"><?php echo $status?></button></td>
               </tr>
			   <?php 
			   $i++;
			   } ?> -->
            </tbody>
         </table>

</div>



<?php include ("part/end.php");?>