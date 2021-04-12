<?php
if(isset($_GET['id'])){	
	require_once('./class/class.User.php'); 		
	$objUser = new User(); 
	$objUser->id = $_GET['id'];
	
	$objUser->SelectOneUser();
	if($objUser->hasil == false){		
		echo '<script>window.history.back()</script>';	
	}else{
		$objUser->DeleteUser();
		echo "<script> alert('".$objUser->message."'); </script>";
		echo "<script>window.location = 'index.php?p=userlist'</script>";			
	}	
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>