<?php 
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

require 'functions.php';
// tangkap id dahulu
$id = $_GET["id"];

if ( hapussettings($id) >= 0 ) {
	echo "
			<script>
			alert('The data has been deleted!');
			document.location.href = 'settings.php';
			</script>
		";
} else {
	echo "
			<script>
			alert('The data can't be deleted!');
			document.location.href = 'settings.php';
			</script>
		";
}




 ?>