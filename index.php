<?php 
include 'lib/fungsi.php';
include 'lib/query.php';
session_start();

if (isset($_POST['login'])) {
	$fung->redirect("?user=login");
}elseif (isset($_POST['out'])) {
	unset($_SESSION);
	session_destroy();
}

 ?>

<html>
<head>
	<title>Ponorogo Tourism</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/general.js"></script>
</head>
<body>
	<div id="header-admin">
		<div class="logo">
			<a href="index.php"><h1>Ponorogo<span>Tourism</span></h1></a>
			<form method="post" action="index.php">
				<a href="#" class="button">Keranjang</a>
			<?php
				if (!isset($_SESSION['user_session'])) {
					// echo '<input type="submit" name="login" value="Sign In" />';
					echo '<a href="?user=login" class="button">Login</a>';
				}else{
					echo '<input type="submit" name="out" value="Sign Out" />';
				}
			?>
				
			</form>
		</div>
		<div>
			<ul class="icon res">
				<button name="tombol" class="menu-icon" onclick="menu()">
					<hr class="line"></hr>
					<hr class="line"></hr>
					<hr class="line"></hr>
				</button>
			</ul>
			<ul class="respon">
				<a href="index.php">
					<li class="content-admin">
						<p>Home</p>
					</li>
				</a>
				<a href="?user=wisata">
					<li class="content-admin">
						<p>Wisata</p>
					</li>
				</a>
				<a href="?user=hotel">
					<li class="content-admin">
						<p>Hotel</p>
					</li>
				</a>
				<a href="?user=budaya">
					<li class="content-admin">
						<p>Budaya</p>
					</li>
				</a>
			</ul>
		</div>
	</div>
	
	<div class="container">
		<?php
		$content = $fung->get("user", "dashboard");
		include $content.'.php';

		// if (isset($_SESSION['user_session'])) {
			
		// }
		?>
	</div>
</body>
</html>