<?php 

if (isset($_GET['page'])) {
	switch ($_GET['page']) {
		case 'hotel_data':
			$title = "Hotel List";
			break;
		case 'user_data':
			$title = "User Management";
			break;
		case 'profile_data':
			$title = "User Profile";
			break;
		
		default:
			$title = "Page Not Found";
			break;
	}
	echo $title;
}
else {
	echo "Main Page";
}

 ?>