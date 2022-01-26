<?php 

// Menghapus session
session_start();
$_SESSION = [];
session_unset();
session_destroy();

// Menghapus cookie
setcookie('id', '', time() - (86400*31));
setcookie('key', '', time() - (86400*31));

header("Location: login.php");
exit;	

 ?>