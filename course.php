<!DOCTYPE html>
<html>
<title>Moole - Motivation and Learning</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Comfortaa">
<link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" href="style/warna.css">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YBECQFTW99"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YBECQFTW99');
</script>

<body class="w3-text-white warna-back">

<div class="w3-content w3-display-container w3-display-middle" style="max-width:900px;">

<header class="w3-container w3-center w3-animate-left">
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/logo.png" width="200px"> </h1></a>
</header>

<div class="w3-container w3-margin-top w3-mobile">


<div class="w3-content" style="max-width:500px">
  <a href="login.php">
  <img class="mySlides" src="images/banner1.png" style="width:100%">
  <img class="mySlides" src="images/banner2.png" style="width:100%">
  <img class="mySlides" src="images/banner3.png" style="width:100%">
  </a>
</div>

<div class="w3-center">
  <div class="w3-section">
    <button class="w3-button w3-light-grey w3-round-xxlarge w3-theme-d3" onclick="plusDivs(-1)">❮ Prev</button>
    <button class="w3-button w3-light-grey w3-round-xxlarge w3-theme-d3" onclick="plusDivs(1)">Next ❯</button>
  </div>
  <button class="w3-button demo w3-round-xxlarge" onclick="currentDiv(1)">1</button> 
  <button class="w3-button demo w3-round-xxlarge" onclick="currentDiv(2)">2</button> 
  <button class="w3-button demo w3-round-xxlarge" onclick="currentDiv(3)">3</button> 
</div>


</div>

</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-theme", "");
  }
  x[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " w3-theme";
}
</script>
  
</body>
</html>