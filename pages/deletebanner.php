<?php
if(isset($_GET['id'])){	
	require_once('./class/class.Banner.php'); 		
	$objBanner = new Banner(); 
	$objBanner->id = $_GET['id'];
	
	$objBanner->SelectOneBanner();
	if($objBanner->hasil == false){		
		echo '<script>window.history.back()</script>';	
	}else{
		$objBanner->DeleteBanner();
		echo "<script> alert('".$objBanner->message."'); </script>";
		echo "<script>window.location = 'index.php?p=bannerlist'</script>";			
	}	
}
else{		
	echo '<script>window.history.back()</script>';	
}
?>