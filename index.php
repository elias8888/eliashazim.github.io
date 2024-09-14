<?php

	$message = '';

	if( isset($_POST['send']) ){
		/* Make sure values are correct and valid */
                $getemail = $_POST['inputEmail'];
                $getfullname = $_POST['inputFullName'];

  							require ("pages/database.php");


                $sql= "SELECT email, fullname FROM users WHERE email = '$getemail'";	
							 	$columna1='';
							 	$columna2='';
							 	$stat = $conn->query($sql);
								while ($row = $stat->fetch_assoc()){ 	//procesar datos
									$columna1 = $row['email'];
									$columna2 = $row['fullname'];
								}

								if($columna1==$getemail){	//verificar el nombre del usuario
								 	$message="We Found This User In Our Database.";
								}else{
									//$message="Usuario no encontrado";
									//se registra el nuevo usuario
									if(!empty($getemail)&&!empty($getfullname)){
									$sql = "INSERT INTO users (email, fullname) VALUES ('$getemail', '$getfullname')";
									if ($conn->query($sql)===TRUE) {
									    $message = 'Thanks For Registration, We Can Keep Touch...';
									} else {
									    $message = 'Error';
									}
									
								}
								$conn->close();
								}	
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="../images/logo.png">
	<meta name="viewport" content="width=device-width">
	<meta charset="utf-8">
	<title>AllouSis</title>
	<!-- style -->
	<link rel="stylesheet" href="css/styles.css">
	<!-- bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<!-- font -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
<!-- icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
<section id="nav-bar">
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="images/logo.png"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">

      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- navbarNavDropdown -->

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="pages/cv.html">CV</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pages/projects.html">Projects</a>
        </li>
        <?php /*
        <li class="nav-item">
          <a class="nav-link" href="pages/musicPage.html">Happy Time</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown link
          </a>
          
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      	*/ ?>
      </ul>
    </div>
  </div>
</nav>
</section>

<!-- banner section -->
<section id="banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p class="promo-title">AllouSis</p>
				<p>Personal website by eng. Elias Hazim.</p>
				<p id="txtwhite">Here you can find my personal CV, projects, subscribe with an email for keep in touch to receive nice informacion of technology and projects. </p>

			</div>
			<div class="col-md-6">
				<img src="images/AS2.gif" class="fluid">
			</div>
		</div>

	</div>
	<svg class="curve-container__curve curve-three" viewBox="10 -20 1870 210" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"> <path class="plain fill-" fill="#fff" d="M977.9,76.2 C475.2,-17.4 0.2,132.5 0.2,132.5 L0.2,275.5 L1891.3,275.5 L1891.3,0.7 C1891.3,0.7 1480.6,169.8 977.9,76.2 Z" id="Path"></path> </svg>
</section>

<section id="keepInTouch">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p class="promo-title"> Keep in Touch!</p>
				<p>Sign up here for updates and info about what I’m working on!</p>

			</div>

			<div class="col-md-6" style="margin-top: 30px;">
				<form method="POST">
				  <div class="mb-3">
				    <label for="inputEmail" class="form-label">Email address</label>
				    <input type="email" name="inputEmail" class="form-control" id="inputEmail" aria-describedby="emailHelp" required>
				    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
				  </div>
				  <div class="mb-3">
				    <label for="inputFullName" class="form-label">Full name</label>
				    <input type="text" name="inputFullName" class="form-control" id="inputFullName" required>
				  </div>
				  <p class="form-text" style="margin-top:-10px;"><?php echo "{$message}"; ?></p>
				  <button type="submit" class="btn btn-primary" name="send" style="margin: 0 auto; display: block; padding-left: 50px; padding-right: 50px;">Submit</button>
				</form>
			</div>
		</div>
	</div>
</section>

<footer>
	<section id="social-media">
		<div class="container text-center">
			<p>Find me on social media</p>
			<div class="social-icons">
				<a target="_blank" href="https://www.facebook.com/allous.ha.8/"><img src="images/fb.png"></a>
				<a target="_blank" href="https://wa.me/+584143031637"><img src="images/wts.png"></a>
				<a target="_blank" href="mailto:elia8hazim@gmail.com"><img src="images/gmail.png"></a>
			</div>
		</div>
	<pre>© 2022 - 2023 Eng. Elias Hazim</pre>
	</section>
</footer>
</body>
</html>