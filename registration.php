<?php 
require 'functions.php';

if ( isset($_POST["register"]) ) {

	if ( registrasi($_POST) > 0 ) {
		echo "<script>
				alert('Congratulation, you have registered now!');
				document.location.href = 'menu.php';
		</script>";
	} else {
		echo mysqli_error($conn);
	}
}

?>

<!DOCTYPE html>
<html>
<title>Moole - Motivation and Learning</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="shortcut icon" href="images/favicon.png">
<link rel="stylesheet" href="style/warna.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YBECQFTW99"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YBECQFTW99');
</script>


<body class="w3-text-white warna-back">

<div class="w3-content w3-display-container" style="max-width:400px;">

<header class="w3-container w3-center w3-animate-left">
  <a href="index.php" style="text-decoration:none;"><h1><img src="images/logo.png" width="200px"> </h1></a>
</header>

<div class="w3-container w3-margin-top w3-mobile">

	<form action="" method="POST" class="w3-container w3-medium w3-theme-d4">

	<p class="w3-xlarge">Register now</p>
<?php if (isset($error)) : ?>
	<p style="color: red; font-style: italic;">Sorry, your password is incorrect</p>
<?php endif; ?>
	<p>
	<label for="username">Username</label>
	<input class="w3-input w3-theme-d4" type="text" style="width:100%" name="username" id="username" required>
	</p>
	<p>
	<label for="password">Password</label>
	<input class="w3-input w3-theme-d4" type="password" style="width:100%" name="password" id="password" required>
	</p>
	<p>
	<label for="password2">Confirm Password</label>
	<input class="w3-input w3-theme-d4" type="password" style="width:100%" name="password2" id="password2" required>
	</p>

	<p>
	<button type="submit" name="register" class="w3-button w3-section w3-green w3-ripple w3-theme-d2 w3-round-xxlarge"> Register</button>
	<a href="login.php" type="submit" name="register" class="w3-button w3-section w3-green w3-ripple w3-theme-d2 w3-round-xxlarge"> <i class='fas fa-undo'></i></a>
	</p>

	</form>

</div>

</div>

  
</body>
</html>