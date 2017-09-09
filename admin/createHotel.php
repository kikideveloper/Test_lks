<?php
if(isset($_POST["save"])){
	// KODE UPLOAD DISINI

	$upload_Dir = '/assets/img';
	foreach($_FILES["gambar1"]["error"] as $key => $error) {
		if ($error==UPLOAD_ERR_OK) {
			$tmp_name = $_FILES["gambar1"]["error"][$key];
			$name = basename($_FILES["gambar1"]["name"][$key]);
			move_uploaded_file($tmp_name, "$upload_Dir/$name");
		}
	}

	$hotel = $_POST["nama_hotel"];
	$lokasi = $_POST["lokasi"];
	$gambar1 = $_POST["gambar1"];
	$gambar2 = $_POST["gambar2"];
	$keterangan = $_POST["keterangan"];
	$param = array(
		':id' => null,
		':nama_hotel' => $hotel,
		':lokasi' => $lokasi,
		':gambar1' => $gambar1,
		':gambar2' => $gambar2,
		':keterangan' => $keterangan,
	);
	$sql = "insert into hotel values 
			(
				:id,
				:nama_hotel,
				:lokasi,
				:gambar1,
				:gambar2,
				:keterangan
			)
	";

	if($crud->execute($sql, $param) == ''){
		$fung->alert("Data sudah tersimpan");
		$fung->redirect('?menu=hotel');
	}else{
		$fung->alert("Data gagal tersimpan");
	}
}
?>
<div>
	<table>
	<form method="post" action="?menu=createHotel">
		<h1>Masukan Wisata baru</h1>
		<tr>
			<td>
				<label for="nama_hotel">Nama Hotel</label>
			</td>
			<td>:</td>
			<td>
				<input type="text" name="nama_hotel" placeholder="Masukan Nama Wisata" class="form-control" required />
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
				<label for="gambar1">Gambar Hotel</label>
			</td>
			<td>:</td>
			<td>
				<input type="file" name="gambar1" placeholder="Masukan Gambar" class="form-control" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="gambar2">Gambar Hotel</label>
			</td>
			<td>:</td>
			<td>
				<input type="file" name="gambar2" placeholder="Masukan Gambar" class="form-control" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="keterangan">Keterangan Hotel</label>
			</td>
			<td>:</td>
			<td>
				<input type="text" name="keterangan" placeholder="Masukan keterangan" class="form-control"  required=""/>
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
