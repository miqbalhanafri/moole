<?php  
session_start();

if ( !isset($_SESSION["login"]) ) {
	header("Location: login.php");
	exit;
}

// memanggil functions.php
require 'functions.php';

$userid = $_SESSION["userId"]; 
$userku = query("SELECT username FROM user WHERE id = '$userid' ");
$info = query("SELECT informasi FROM info_admin");

$tampil = query("SELECT progress.user, SUM(marketing.points) AS totalpoints
	FROM marketing 
	LEFT JOIN progress ON progress.opsi = marketing.id 
	WHERE progress.user = '$userid'
	GROUP BY user
	ORDER BY SUM(marketing.points) DESC 
	");

$tampil2 = query("SELECT progress.user, SUM(marketing.points) AS total2, user.username, uploadfoto.gambar, uploadfoto.motivasi
	FROM (((progress
	LEFT JOIN marketing ON progress.opsi = marketing.id)
	LEFT JOIN user ON progress.user=user.id)
	LEFT JOIN uploadfoto ON progress.user=uploadfoto.user)
	");

$tampil4 = query("SELECT * FROM uploadfoto WHERE user='$userid' ");

$tampil3 = query("SELECT COUNT(id) FROM progress WHERE user='$userid' ");

$tampil5 = query("SELECT progress.user, SUM(marketing.points) AS total5, user.username, uploadfoto.gambar, uploadfoto.motivasi
	FROM (((progress
	LEFT JOIN marketing ON progress.opsi = marketing.id)
	LEFT JOIN user ON progress.user=user.id)
	LEFT JOIN uploadfoto ON progress.user=uploadfoto.user)
	GROUP BY user 
	HAVING SUM(marketing.points) 
	ORDER BY SUM(marketing.points) DESC 
	");


?>


<!DOCTYPE html>
<html>
<title>Moole - Motivation and Learning</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src='js/a076d05399.js' crossorigin='anonymous'></script>
<!--Get your own code at fontawesome.com-->
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style/warna.css">

<style>
.checked {
  color: orange;
}

.bulat {
  width: 75px;
  height: 75px;
  object-fit: cover;
}

body {
  background-color: #e9f5ff;
}

.dark-mode {
    background-color: black;
    color: white;
  }


</style>

<!-- Awal Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YBECQFTW99"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YBECQFTW99');
</script>
<!-- Akhir Global site tag (gtag.js) - Google Analytics -->

<!-- Awal Script W3.JS -->
<script src="https://www.w3schools.com/lib/w3.js"></script>
<!-- Akhir Script W3.JS -->
 
<body>

<nav class="w3-sidebar w3-bar-block w3-card  w3-theme-d2" id="mySidebar">
  <div class="w3-container">
    <span onclick="closeSidebar()" class="w3-button w3-display-topright w3-large"><i class="fa fa-close"></i></span>
    <br>
    <div class="w3-padding w3-center">
      <a href="menu.php">
        <img src="images/logo2.png" alt="moole" style="width:110px">
      </a>
    </div><br>
    <div class="w3-padding w3-center">
      <a href="profile.php" style="text-decoration:none;">
        <img src="uploadfoto/5fbaaff143fa4.jpg" class="w3-circle bulat" alt="moole">	
        <p>M. IQbaL Hanafri</p>
        <img src="images/coin.png" alt="" width="30px"> 122
      </a>
    </div>
    <br>
    <a class="w3-bar-item w3-button" href="menu.php"><i class="fas fa-book"></i>&nbsp;&nbsp;Learn</a>
    <a class="w3-bar-item w3-button" href="leaderboard.php"><i class="fas fa-award"></i>&nbsp;&nbsp;Rank</a>
    <a class="w3-bar-item w3-button" href="chat.php"><i class="fas fa-comment"></i>&nbsp;&nbsp;Chat</a>
    <a class="w3-bar-item w3-button" href="news.php"><i class="fas fa-paper-plane"></i>&nbsp;&nbsp;News</a>
    <a class="w3-bar-item w3-button" href="profile.php"><i class="fas fa-user-graduate"></i>&nbsp;&nbsp;Profile</a>
    <a class="w3-bar-item w3-button" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Log out</a>
  </div>
</nav>


<!-- Awal header -->
<header class="w3-bar w3-card w3-theme-d2">
	<button class="w3-bar-item w3-button w3-large w3-hover-theme" onclick="openSidebar()"><i class="fa fa-bars"></i></button>  
	<div class="w3-bar-item w3-button w3-large w3-hover-theme w3-right">
      <i type="button" onclick="themeToggle()" class="fas fa-lightbulb"></i>
      <!--<div id="theme"></div>-->
  </div>
  <div class="w3-center">
  	<h5>Let's learn</h5>
  </div>
</header>
<!-- Akhir header -->


<!-- Awal aplikasi baru -->
<div class="w3-content w3-display-container" style="max-width:900px">


  <div class="w3-row">
    <div class="w3-col w3-container" style="width:80%">
      <h5>Pelajaran IPS</h5>
    </div>
    <div class="w3-col w3-container" style="width:20%">
      <p><a href="leaderboard.php"><i class='fas fa-angle-double-right'></i></a></p>
    </div>
  </div>

  <div class="w3-center">
    <a href="books/senibudaya.php"><img src="images/Lost in the woods.png" class="w3-round-large" alt="Norway" style="width:40%"></a>&nbsp;&nbsp;<img src="images/The  tale of monster falls.png" class="w3-round-large" alt="Norway" style="width:40%">
  </div>

  <div class="w3-row">
    <div class="w3-col w3-container" style="width:80%">
      <h5>Pelajaran IPA</h5>
    </div>
    <div class="w3-col w3-container" style="width:20%">
      <p><a href="leaderboard.php"><i class='fas fa-angle-double-right'></i></a></p>
    </div>
  </div>

  <div class="w3-center">
    <img src="images/Lets be Friends Animals.png" class="w3-round-large" alt="Norway" style="width:40%">&nbsp;&nbsp;<img src="images/The littlest bird.png" class="w3-round-large" alt="Norway" style="width:40%">
  </div>

</div>
<!-- Akhir aplikasi baru -->


<!-- Awal Script untuk Sidebar --> 
<script>
closeSidebar();
function openSidebar() {
  document.getElementById("mySidebar").style.display = "block";
}

function closeSidebar() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
<!-- Akhir Script untuk Sidebar --> 




<!-- Awal Script untuk Toogle Darkmode --> 
<script>
// On page load set the theme.
(function() {
	let onpageLoad = localStorage.getItem("theme") || "";
	let element = document.body;
	element.classList.add(onpageLoad);
	document.getElementById("theme").textContent =
	  localStorage.getItem("theme") || "light";
  })();
  
  function themeToggle() {
	let element = document.body;
	element.classList.toggle("dark-mode");
  
	let theme = localStorage.getItem("theme");
	if (theme && theme === "dark-mode") {
	  localStorage.setItem("theme", "");
	} else {
	  localStorage.setItem("theme", "dark-mode");
	}
  
	document.getElementById("theme").textContent = localStorage.getItem("theme");
  }
</script>
<!-- Akhir Script untuk Toogle Darkmode -->

</body>
</html>