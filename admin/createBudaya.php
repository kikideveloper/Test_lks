<?php
if(isset($_POST["save"])){
	// KODE UPLOAD DISINI

	$upload_Dir = '/assets/img';
	foreach($_FILES["gambar2"]["error"] as $key => $error) {
		if ($error==UPLOAD_ERR_OK) {
			$tmp_name = $_FILES["gambar2"]["error"][$key];
			$name = basename($_FILES["gambar2"]["name"][$key]);
			move_uploaded_file($tmp_name, "$upload_Dir/$name");
		}
	}

	$jenis = $_POST["jenis_budaya"];
	$nama = $_POST["nama_budaya"];
	$asal = $_POST["asal_budaya"];
	$gambar1 = $_POST["gambar1"];
	$gambar2 = $_POST["gambar2"];
	$keterangan = $_POST["keterangan"];

	$param = array(
		':id' => null,
		':jenis_budaya' => $jenis,
		':nama_budaya' => $nama,
		':asal_budaya' => $asal,
		':gambar1' => $gambar1,
		':gambar2' => $gambar2,
		':keterangan' => $keterangan,
	);
	$sql = "INSERT INTO budaya VALUES(
			:id,
			:jenis_budaya,
			:nama_budaya,
			:asal_budaya,
			:gambar1,
			:gambar2,
			:keterangan
		)";
	if($crud->execute($sql, $param) == ''){
		$fung->alert("Data sudah tersimpan");
		$fung->redirect('?menu=budaya');
	}else{
		$fung->alert("Data gagal tersimpan");
	}
}
?>
<div>
	<table>
	<form method="post" action="?menu=createBudaya">
		<h1>Masukan Wisata baru</h1>
		<tr>
			<td>
				<label for="jenis_budaya">Jenis Budaya</label>
			</td>
			<td>:</td>
			<td>
				<input type="text" name="jenis_budaya" placeholder="Masukan Jenis Budya" class="form-control" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="nama_budaya">Nama Budaya</label>
			</td>
			<td>:</td>
			<td>
				<input type="text" name="nama_budaya" placeholder="Masukan Nama Budaya" class="form-control" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="asal_budaya">Asal Budaya</label>
			</td>
			<td>:</td>
			<td>
				<input type="text" name="asal_budaya" placeholder="Masukan Asal Budaya " class="form-control" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="gambar1">Gambar Budaya</label>
			</td>
			<td>:</td>
			<td>
				<input type="file" name="gambar1" placeholder="Masukan Gambar" class="form-control" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="gambar2">Gambar Budaya</label>
			</td>
			<td>:</td>
			<td>
				<input type="file" name="gambar2" placeholder="Masukan Gambar" class="form-control" required />
			</td>
		</tr>
		<tr>
			<td>
				<label for="keterangan">Keterangan Budaya</label>
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
