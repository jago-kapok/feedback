<?php
session_start();
session_destroy();
echo "<script>alert('SUCCESS ! You have successfully logged out'); window.location = 'index.php'</script>";
?>