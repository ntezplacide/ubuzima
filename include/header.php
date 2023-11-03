<!DOCTYPE html>
<html>
<head>

	<title>Ubuzimana </title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
	<script type="text/javascript" src="https://example.com/my-javascript-file.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-info bg-info">
	<a href="body.php"><h3 class="text-white">UMUZE HMS</h3></a>
	<div class="mr-auto"></div>
	<ul class="navbar-nav">
		<?php 
if(isset($_SESSION['admin'])){
	$user =$_SESSION['admin'];
	echo '<li class="nav-item"><a href ="#" class= "nav-link text-white">'.$user'
	</a> </li>
	<li class="nav-item"> <a href ="#" class= "nav-link text-white">Logout</a> </li>
	';
} else{
	echo '
	<li class="nav-item"><a href ="#" class= "nav-link text-white">Paterners
	</a> </li>
	<li class="nav-item"><a href ="#" class= "nav-link text-white"> Our services
	</a> </li>
	<li class="nav-item"><a href ="#" class= "nav-link text-white"> Customers care
	</a> </li>
	<li class="nav-item"><a href ="#" class= "nav-link text-white">Patience
	</a> </li>
	<li class="nav-item"><a href ="#" class= "nav-link text-white">Cunsolor
	</a> </li>
	
	 '
}
		 ?>
	</ul>

	
</nav>
</body>
</html>
