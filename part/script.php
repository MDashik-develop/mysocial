

	  	  <script>
// usert staus satrt

		function updateUserStatus(){
			jQuery.ajax({
				url:'part/update_user_status.php',
				success:function(){
					
				}
			});
		}
		
		function getUserStatus(){
			jQuery.ajax({
				url:'part/get_user_status.php',
				success:function(result){
					jQuery('#user_grid').html(result);
				}
			});
		}
		
		setInterval(function(){
			updateUserStatus();
		},3000);
		
		setInterval(function(){
			getUserStatus();
		},4000);

// usert staus end

	  </script>
