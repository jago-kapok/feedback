<?php require "config/main.php";
$type = trim($_POST['type']);
$cmd = trim($_POST['cmd']);

switch ($type) {
	case 'hotel':
		if ($cmd == "add") {
			$sql = "INSERT INTO hotel (hotel_name, hotel_location, hotel_desc) VALUES ('$_POST[hotel_name]', '$_POST[hotel_location]', '$_POST[hotel_desc]')";
			mysqli_query($conn, $sql);
		} 
		else if($cmd=="edit") {
			$sql = "UPDATE hotel SET
				hotel_name 		= '$_POST[hotel_name]',
				hotel_location 	= '$_POST[hotel_location]',
				hotel_desc 		= '$_POST[hotel_desc]'
				WHERE hotel_id = '$_POST[hotel_id]'";

			mysqli_query($conn, $sql);
		}
		else {
			die();
		}
		header('Location:index.php?page=hotel_data');
		break;
	
	default:
		require_once("pages/404.php");
		break;
}

?>