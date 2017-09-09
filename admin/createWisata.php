<?php
if(isset($_POST["save"])){
	// KODE UPLOAD DISINI

	// foreach ($_FILES["gambar"]["error"] as $key => $error) {
	// 	if ($error==UPLOAD_ERR_OK) {
	// 		$tmp_name = $_FILES["gambar"]["error"][$key];
	// 		$name = basename($_FILES["gambar"]["name"][$key]);
	// 		move_uploaded_file($tmp_name, "$upload_Dir/$name");
	// 	}
	// }

	$upload_Dir = '/assets/img';
	$tmp_name = $_FILES["gambar"]["error"][$key];
	$name = basename($_FILES["gambar"]["name"][$key]);
	move_uploaded_file($tmp_name, "$upload_Dir/$name");

	$param = array(
		':id' => null,
		':wisata' => $_POST["wisata"],
		':lokasi' => $_POST["lokasi"],
		':gambar1' => $_POST["gambar1"],
		':gambar2' => $_POST["gambar2"],
		':keterangan' => $_POST["keterangan"],
		':fasilitas' => $_POST['fasilitas'],
	);
	$sql = "insert into wisata values 
			(
				:id,
				:wisata,
				:lokasi,
				:gambar1,
				:gambar2,
				:keterangan,
				:fasilitas
			)
	";

	if($crud->execute($sql, $param) == ''){
		$fung->alert("Data sudah tersimpan");
		$fung->redirect('?menu=wisata');
	}else{
		$fung->alert("Data gagal tersimpan");
	}
}
?>
<div>
	<table>
	<form method="post" action="?menu=createWisata">
		<h1>Masukan Wisata baru</h1>
		<tr>
			<td>
				<label for="wisata">nama</label>
			</td>
			<td>:</td>
			<td>
				<input type="text" name="wisata" placeholder="Masukan Nama Wisata" class="form-control" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="lokasi">Lokasi</label>
			</td>
			<td>:</td>
			<td>
				<input type="text" name="lokasi" placeholder="Masukan Lokasi" class="form-control" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="gambar1">Gambar Wisata</label>
			</td>
			<td>:</td>
			<td>
				<input type="file" name="gambar1" placeholder="Masukan Gambar" class="form-control" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="gambar2">Gambar Wisata</label>
			</td>
			<td>:</td>
			<td>
				<input type="file" name="gambar2" placeholder="Masukan Gambar" class="form-control" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="keterangan">Keterangan Wisata</label>
			</td>
			<td>:</td>
			<td>
				<textarea name="keterangan" placeholder="Masukan keterangan" class="form-control"  required=""></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<label for="fasilitas">Fasilitas Hotel</label>
			</td>
			<td>:</td>
			<td>
				<textarea name="fasilitas" placeholder="Masukan Fasilitas" class="form-control"  required=""></textarea>
			</td>
		</tr>
		<tr>
			<td colspan="3">
				<input type="submit" name="save" value="save" />
				<input type="button" name="cancel" value="Cancel" />
			</td>
		</tr>
		</form>
	</table>
</div>
