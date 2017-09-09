<?php 
	include '../lib/query.php';
	include '../lib/fungsi.php';
	session_start();

	// print_r($_SESSION['admin']);

	if (!isset($_SESSION['admin'])) {
		$fung->redirect('login.php');
	}

 ?>
 <html>
 <head>
 	<title>Admin</title>
 	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
 	<meta name="viewport" content="width=device-width, initial-scale: 1.0, user-scalabe=0" />
 	<script src="../assets/js/jquery-3.2.1.min.js"></script>
 	<script src="../assets/js/general.js"></script>
 </head>
 <body>
 	<div id="header-admin">
 		<div class="logo">
 			<a href="#" class="logo-app"><h1>Ponorogo<span>Tourism</span></h1></a>
			<a href="?menu=out" class="button">
				<p>
					Sign Out
				</p>
			</a>
 		</div>
 	</div>
 	<a href="#" class="mobile">Menu</a>
 	<div class="container">
 		<div class="sidebar">
 			<ul id="nav">
 				<li><a class="selected" href="index.php">Home</a></li>
 				<li><a href="?menu=user">User</a></li>
 				<li><a href="?menu=wisata">Tours</a></li>
 				<li><a href="?menu=hotel">Hotel</a></li>
 				<li><a href="?menu=budaya">Culture</a></li>
 				<li><a href="?menu=newAdmin">New Admin</a></li>
 			</ul>
 		</div>
 		<div class="content">
 			<?php
 			$menu = $fung->get("menu","dashboard");
 			include $menu.'.php';
 			?>
 		</div>
 	</div>
 </body>
 </html>