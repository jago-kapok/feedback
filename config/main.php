<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "hotel";

$conn = mysqli_connect($server,$username,$password) or die("Connection Failure !");
mysqli_select_db($conn, $database) or die("Can't Open Database");
?>