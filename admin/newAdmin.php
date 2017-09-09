<?php
    //Jika ada data dikirim
    if(isset($_POST['btn-save'])){
        $param = array(
        		":id" => null,
        		":nama" => $_POST['nama'],
	        	":email" => $_POST['email'],
	        	":password" => password_hash($_POST['password'],PASSWORD_DEFAULT),
	        	":addres" => $_POST['addres'],
	        	":gender" => $_POST['gender'],
	        	":place_of_birth" => $_POST['place_of_birth'],
	        	":date_of_birth" => $_POST['date_of_birth'],
	        	":insert_date" =>$_POST['insert_date'],
        	);

        $sql = "INSERT INTO admin VALUES(
        	:id,
        	:nama,
        	:email,
        	:password,
        	:addres,
        	:gender,
        	:place_of_birth,
        	:date_of_birth,
        	:insert_date
        )";
        if ($crud->verifyEmail($_POST['email'])) {
        	echo "<script>alert('Maaf Email yang anda pakai sudah terdaftar')</script>";
        	$fung->redirect("?menu=newAdmin");
        }else{
	        if($crud->execute($sql, $param)==''){
	            $fung->alert('Berhasil Di buat !!');
	            $fung->redirect('?menu=dashboard');
	        }else{
	            $fung->alert('gagal Login');
	        }
        }
    }
 ?>
<div class="register-page">
	<form method="post" action="index.php?menu=newAdmin">
		<div class="register-panel">
		<h1>Register</h1>
			<table>
			<input type="hidden" name="insert_date" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
				<tr>
					<td>
						<label for="nama">Nama</label>
					</td>
					<td>:</td>
					<td>
						<input type="text" name="nama" class="form-control" placeholder="Masukan Nama Anda" required/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="email">Email</label>
					</td>
					<td>:</td>
					<td>
						<input type="text" name="email" class="form-control" placeholder="Masukan Email" required/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="password">Password</label>
					</td>
					<td>:</td>
					<td>
						<input type="password" name="password" class="form-control" placeholder="Password" required/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="addres">Address</label>
					</td>
					<td>:</td>
					<td>
						<textarea name="addres" class="form-control" placeholder="Masukan Alamat anda" required></textarea>
					</td>
				</tr>
				<tr>
					<td>
						<label for="gender">Gender</label>
					</td>
					<td>:</td>
					<td>
						<input type="radio" name="gender" value="laki-laki" required/>
						Laki-laki
						<input type="radio" name="gender" value="Perrempuan" required/>
						Perempuan
					</td>
				</tr>
				<tr>
					<td>
						<label for="place_of_birth">Place Of Birth</label>
					</td>
					<td>:</td>
					<td>
						<input type="text" name="place_of_birth" class="form-control" placeholder="Masukan Tempat Lahir anda" required/>
					</td>
				</tr>
				<tr>
					<td>
						<label for="date_of_birth">Date Of Birth</label>
					</td>
					<td>:</td>
					<td>
						<input type="date" name="date_of_birth" class="form-control" required/>
					</td>
				</tr>
			</table>
			<div>
				
				<input type="submit" name="btn-save" value="Create"></input>
			</div>
		</div>
	</form>
</div>
