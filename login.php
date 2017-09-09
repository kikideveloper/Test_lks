<?php 
	// if (!isset($_POST['out'])) {
	// 	session_destroy();
	// 	unset($_SESSION['user_session']);
	// 	// $fung->redirect('?user=login');
	// }
	// if ($crud->isLoggedIn()) {
	// 	$fung->redirect('index.php');
	// }
	if (isset($_POST['btn-save'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];
		if ($crud->login($email, $password)) {
			$fung->alert('Berhasil login');
			$fung->redirect('index.php?user=dashboard&session=user_session');
		}else{
			$fung->alert("maaf Email Atau password anda salah");
		}
	}
 ?>
<div class="login">
	<div>
		<div class="login-page">
			<div class="login-panel">
				<form method="post">
				<?php if (isset($error)): ?>
                  <div class="error">
                      <?php echo $error ?>
                  </div>
              <?php endif; ?>
              <?php if (isset($success)): ?>
                  <div class="success">
                      Berhasil mendaftar. Silakan <a href="login.php">masuk</a>
                  </div>
              <?php endif; ?>	
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email"></input>
					<label for="password">Password</label>
					<input type="password" name="password" class="form-control" placeholder="Password"></input>
					<button type="submit" class="btn btn-login-admin" name="btn-save">
		    			Login
					</button>
					<p>
						<a href="?user=register">Create a new acount?</a>
					</p>
				</form>
			</div>
		</div>
	</div>
</div>