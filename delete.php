<?php 
if (isset($_GET['delete'])) {
	require "config/main.php";
	switch ($_GET['delete']) {
		case 'hotel_data':
			mysqli_query($conn, "DELETE FROM hotel WHERE hotel_id = ".$_GET['hotel_id']);
			header('Location:index.php?page='.$_GET['delete']);
			break;

		case 'user_data':
			mysqli_query($conn, "DELETE FROM user WHERE user_id = ".$_GET['user_id']);
			header('Location:index.php?page='.$_GET['delete']);
			break;
		
		default:
			require_once("pages/404.php");
			break;
	}
}
else {
	require_once("pages/home.php");
}

 ?>