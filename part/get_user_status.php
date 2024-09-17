<?php
include ("session.php");
$time=time();
$res=mysqli_query($con,"select * from user where last_login >$time");
$i=1;
$html='';
while($row=mysqli_fetch_assoc($res)){
	$status='Offline';
	$style_on_status = ' black';
	$class="btn-danger";
	if($row['last_login']>$time){
		$status='';
		$class="btn-success";
	    $style_on_status = 'green';

	}
	$html.='<tr style="background-color: transparent; border: none; border-bottom: 1px solid silver;">
                 
                  
                  <td style="background-color: transparent; border: none;" width="90%" class="name">'.$row['name'].'</td>

                  <td style="background-color: transparent; border: none;" width="10%"><button style="border-radius: 50%; min-width: 10px; min-height: 10px; border: none;  background-color: '.$style_on_status.';" class="status" type="button" class="btn '.$class.'">'.$status.'</button></td>
               </tr>'



               ;
	$i++;


$style_status='<style>

td{
	background-color: green;
}

</style>';
}
echo $html;
// echo $style_status;
?>