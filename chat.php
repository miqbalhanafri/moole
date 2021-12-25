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




.base-timer {
  position: relative;
  width: 300px;
  height: 300px;
}

.base-timer__svg {
  transform: scaleX(-1);
}

.base-timer__circle {
  fill: none;
  stroke: none;
}

.base-timer__path-elapsed {
  stroke-width: 7px;
  stroke: grey;
}

.base-timer__path-remaining {
  stroke-width: 7px;
  stroke-linecap: round;
  transform: rotate(90deg);
  transform-origin: center;
  transition: 1s linear all;
  fill-rule: nonzero;
  stroke: currentColor;
}

.base-timer__path-remaining.green {
  color: #21a0fa;
}

.base-timer__path-remaining.orange {
  color: orange;
}

.base-timer__path-remaining.red {
  color: red;
}

.base-timer__label {
  position: absolute;
  width: 300px;
  height: 300px;
  top: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 70px;
  color:#023e68;
}

</style>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YBECQFTW99"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YBECQFTW99');
</script>

 
<body class="w3-theme-l5">

<!-- 
<div class="w3-sidebar w3-bar-block w3-theme-d3 w3-xxlarge" style="width:70px">
  <a href="menu.php" class="w3-bar-item w3-button"><abbr title="Home"><i class="fa fa-home"></i></abbr></a> 
  <a href="one.php" class="w3-bar-item w3-button"><abbr title="Leaderboard"><i class="fa fa-users"></i></abbr></a> 
  <a href="two.php" class="w3-bar-item w3-button"><abbr title="Add Checklist"><i class="fas fa-tasks"></i></abbr></a> 
  <a href="three.php" class="w3-bar-item w3-button"><abbr title="Chatting"><i class="fa fa-comments"></i></abbr></a>
  <a href="logout.php" class="w3-bar-item w3-button"><abbr title="Log Out"><i class="fa fa-power-off"></i></abbr></a> 
</div>

<div style="margin-left:70px">
-->


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
    </a>
  </div>
  <br>
<a class="w3-bar-item w3-button" href="menu.php"><i class="fas fa-book"></i>&nbsp;&nbsp;Learn</a>
<a class="w3-bar-item w3-button" href="leaderboard.php"><i class="fas fa-award"></i>&nbsp;&nbsp;Leaderboard</a>
<a class="w3-bar-item w3-button" href="chat.php"><i class="fas fa-comment"></i>&nbsp;&nbsp;Chat</a>
<a class="w3-bar-item w3-button" href="profile.php"><i class="fas fa-user-graduate"></i>&nbsp;&nbsp;Profile</a>
<a class="w3-bar-item w3-button" href="news.php"><i class="fas fa-paper-plane"></i>&nbsp;&nbsp;News</a>
<a class="w3-bar-item w3-button" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;Log out</a>
</div>
</nav>


<!--
<header class="w3-bar w3-card w3-theme">
  <button class="w3-bar-item w3-button w3-xxlarge w3-hover-theme" onclick="openSidebar()"><i class="fa fa-bars"></i></button>
  <div class="w3-padding w3-center">
    <img src="images/logo.png" alt="avatar" style="width:120px">
  </div>
</header>
-->

<header class="w3-bar w3-card w3-theme-d2">
	<button class="w3-bar-item w3-button w3-large w3-hover-theme" onclick="openSidebar()"><i class="fa fa-bars"></i></button>  
	<div class="w3-bar-item w3-button w3-large w3-hover-theme w3-right"><a href="logout.php"><i class="fas fa-stopwatch"></i></a></div>
  <div class="w3-center">
  	<h5>Chat zone</h5>
  </div>

</header>




<div class="w3-content w3-display-container" style="max-width:900px">

<div class="w3-container w3-margin-top w3-large w3-mobile">

<!-- Awal aplikasi baru -->


<div class="w3-row">
  <!-- Satu Baris -->
  <div class="w3-col s10 w3-center">
    <div>
    .
    </div>
  </div>
  <div class="w3-col s1 w3-center">
    <div>
    <img src="images/coin.png" alt="" width="30px">
    </div>
  </div>
  <div class="w3-col s1 w3-center">
    122
  </div>

</div>

<div class="w3-center">
	<img src="images/robot.png" alt="" width="50%">
</div>

<center>
  <div id="app"></div>
</center>


<!--
<div class="w3-row">

  <div class="w3-col s1">
    <i class="far fa-calendar-check"></i>
  </div>
  <div class="w3-col s11 w3-center">
    <div class="w3-light-grey w3-round-xlarge">
      <div class="w3-container w3-blue w3-round-xlarge" style="width:25%">25%</div>
    </div>
  </div>

</div>
-->






<div class="w3-center">
<button type="submit" name="login" class="w3-button w3-section w3-theme-d2 w3-ripple w3-round-xxlarge">Start</button>
</div>










<!-- Akhir aplikasi baru -->

</div>

</div>


<!-- Script untuk Sidebar --> 
<script>
closeSidebar();
function openSidebar() {
  document.getElementById("mySidebar").style.display = "block";
}

function closeSidebar() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>
<!-- Last Script untuk Sidebar --> 


<script>
  // Credit: Mateusz Rybczonec

const FULL_DASH_ARRAY = 283;
const WARNING_THRESHOLD = 10;
const ALERT_THRESHOLD = 5;

const COLOR_CODES = {
  info: {
    color: "green"
  },
  warning: {
    color: "orange",
    threshold: WARNING_THRESHOLD
  },
  alert: {
    color: "red",
    threshold: ALERT_THRESHOLD
  }
};

const TIME_LIMIT = 20;
let timePassed = 0;
let timeLeft = TIME_LIMIT;
let timerInterval = null;
let remainingPathColor = COLOR_CODES.info.color;

document.getElementById("app").innerHTML = `
<div class="base-timer">
  <svg class="base-timer__svg" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <g class="base-timer__circle">
      <circle class="base-timer__path-elapsed" cx="50" cy="50" r="45"></circle>
      <path
        id="base-timer-path-remaining"
        stroke-dasharray="283"
        class="base-timer__path-remaining ${remainingPathColor}"
        d="
          M 50, 50
          m -45, 0
          a 45,45 0 1,0 90,0
          a 45,45 0 1,0 -90,0
        "
      ></path>
    </g>
  </svg>
  <span id="base-timer-label" class="base-timer__label">${formatTime(
    timeLeft
  )}</span>
</div>
`;

startTimer();

function onTimesUp() {
  clearInterval(timerInterval);
}

function startTimer() {
  timerInterval = setInterval(() => {
    timePassed = timePassed += 1;
    timeLeft = TIME_LIMIT - timePassed;
    document.getElementById("base-timer-label").innerHTML = formatTime(
      timeLeft
    );
    setCircleDasharray();
    setRemainingPathColor(timeLeft);

    if (timeLeft === 0) {
      onTimesUp();
    }
  }, 1000);
}

function formatTime(time) {
  const minutes = Math.floor(time / 60);
  let seconds = time % 60;

  if (seconds < 10) {
    seconds = `0${seconds}`;
  }

  return `${minutes}:${seconds}`;
}

function setRemainingPathColor(timeLeft) {
  const { alert, warning, info } = COLOR_CODES;
  if (timeLeft <= alert.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(warning.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(alert.color);
  } else if (timeLeft <= warning.threshold) {
    document
      .getElementById("base-timer-path-remaining")
      .classList.remove(info.color);
    document
      .getElementById("base-timer-path-remaining")
      .classList.add(warning.color);
  }
}

function calculateTimeFraction() {
  const rawTimeFraction = timeLeft / TIME_LIMIT;
  return rawTimeFraction - (1 / TIME_LIMIT) * (1 - rawTimeFraction);
}

function setCircleDasharray() {
  const circleDasharray = `${(
    calculateTimeFraction() * FULL_DASH_ARRAY
  ).toFixed(0)} 283`;
  document
    .getElementById("base-timer-path-remaining")
    .setAttribute("stroke-dasharray", circleDasharray);
}
</script>

</body>
</html>

