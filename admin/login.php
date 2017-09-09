<?php
	include '../lib/fungsi.php';
	include '../lib/query.php';

	if (isset($_POST['btn-save'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		
			if ($crud->loginAdmin($email, $password)) {
			$fung->redirect('index.php');
			$fung->alert('Welcome to Admin');
		}
	}
?>
<html>
<head>
	<title>
		Admin Login
	</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body>
<div id="header-admin">
 		<div class="logo">
 			<a href="#"><h1>Ponorogo<span>Tourism</span></h1></a>
 		</div>
 	</div>
	<div class="container">
		<div class="login">
			<div class="login-page">
				<div class="login-panel">
					<form method="post" action="login.php">
						<label for="email">Email</label>
						<input type="text" name="email" class="form-control" placeholder="Email" required/>
						<label for="password">Password</label>
						<input type="password" name="password" class="form-control" placeholder="Password" required/>

						<button type="submit" class="btn btn-login-admin" name="btn-save">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>