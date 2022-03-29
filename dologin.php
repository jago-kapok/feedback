<?php
require "config/main.php";

$username	= $_POST['username'];
$password	= md5($_POST['password']);

$query  = mysqli_query($conn, "SELECT * FROM user WHERE user_name = '$username' AND user_password = '$password'");

if (!$query || mysqli_num_rows($query) != 0) {
	$data   = mysqli_fetch_array($query, MYSQLI_BOTH);

	session_start();
	$_SESSION['id'] 			= $data['user_id'];
	$_SESSION['username'] 	= $data['user_name'];
	$_SESSION['password'] 	= $data['user_password'];
	$_SESSION['fullname'] 	= $data['user_fullname'];
	$_SESSION['level'] 		= $data['user_level'];
	
	header('Location:admin.php');
} else {
   echo "<script>alert('FAILURE ! Your username or password is wrong !')</script>";
   echo "<script>window.location = 'login.php'</script>";
}
?>