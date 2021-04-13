<?php
if(isset($_GET['id'])){	
	require_once('./class/class.Account.php'); 		
	$objAccount = new Account(); 
	$objAccount->id = $_GET['id'];
	
	$objAccount->SelectOneAccount();
	if($objAccount->hasil == false){		
		echo '<script>window.history.back()</script>';	
	}else{
		$objAccount->DeleteAccount();
		echo "<script> alert('".$objAccount->message."'); </script>";
		echo "<script>window.location = 'index.php?p=accountlist'</script>";			
	}	
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>