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
				WHERE hotel_id	= '$_POST[hotel_id]'";

			mysqli_query($conn, $sql);
		}
		else {
			die();
		}
		header('Location:admin.php?page=hotel_data');
		break;

	case 'register':
		if ($cmd == "add") {
			$username = $_POST['username'];
			$password = md5($_POST['password']);

			$exist = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username'");

			if (!$exist || mysqli_num_rows($exist) > 0) {
				echo "<script>alert('FAILURE ! Email account has been registered !')</script>";
				echo "<script>window.location = 'register.php'</script>";
			} else {
				$sql = "INSERT INTO user (user_fullname, user_name, user_password, user_level) VALUES ('$_POST[fullname]', '$_POST[username]', '$password', 'user')";
				mysqli_query($conn, $sql);

				echo "<script>alert('SUCCESS ! Your account was created successfully')</script>";
				echo "<script>window.location = 'login.php'</script>";
			}
		}
		else if($cmd=="edit") {
			$password = $_POST['password'];

			if ($password == "") {
				$sql = "UPDATE user SET user_fullname = '$_POST[fullname]' WHERE user_id = '$_POST[user_id]'";
			} else {
				$password = md5($password);
				$sql = "UPDATE user SET user_fullname = '$_POST[fullname]', user_password = '$password' WHERE user_id = '$_POST[user_id]'";
			}
			
			mysqli_query($conn, $sql);

			echo "<script>alert('SUCCESS ! Your account was updated successfully')</script>";
			echo "<script>window.location = 'admin.php'</script>";
		}
		else {
			die();
		}
		break;
	
	case 'feedback':
		if ($cmd == "add") {
			$sql = "INSERT INTO feedback (hotel_id, feedback_rating, feedback_desc, feedback_status, user_id) VALUES ('$_POST[hotel_id]', '$_POST[feedback_rating]', '$_POST[feedback_desc]', 1, '$_POST[user_id]')";

			mysqli_query($conn, $sql);

			echo "<script>alert('SUCCESS ! Your feedback was saved successfully')</script>";
			echo "<script>window.location = 'admin.php'</script>";
		} 
		else {
			die();
		}
		break;

	default:
		require_once("pages/404.php");
		break;
}

?>