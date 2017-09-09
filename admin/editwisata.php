<?php


if(isset($_POST["save"])){

	$param = array(
		':id' => $_POST['id'],
		':wisata' => $_POST["wisata"],
		':lokasi' => $_POST["lokasi"],
		':gambar1' => $_POST["gambar1"],
		':gambar2' => $_POST["gambar2"],
		':keterangan' => $_POST["keterangan"],
	);
	$sql = "update wisata set 
			
				wisata = :wisata,
				lokasi = :lokasi,
				gambar1 = :gambar1,
				gambar2 = :gambar2,
				keterangan = :keterangan

				where id = :id
			
	";

	if($crud->execute($sql, $param) == ''){
		$fung->alert("Update data berhasil!");
		$fung->redirect('?menu=wisata');
	}else{
		$fung->alert("Update data gagal!");
	}
}


if(!isset($_GET['id']) || !is_numeric($_GET['id'])){
	$fung->redirect('index.php?menu=wisata');
}


$param = array(':id' => $_GET['id']);
$sql = "select * from wisata where id = :id";

$row = $crud->getRow($sql, $param);


		
?>

<div>
	<table>
	<form method="post" action="?menu=editwisata" >
		<input type="hidden" name="id" value="<?=$row['id']?>"/>

		<h1>Masukan Wisata baru</h1>
		<tr>
			<td>
				<label for="wisata">nama</label>
			</td>
			<td>:</td>
			<td>
				<input type="text" name="wisata" placeholder="Masukan Nama Wisata" class="" required value="<?=$row['wisata']?>" />
			</td>
		</tr>
		<tr>
			<td>
				<label for="lokasi">Lokasi</label>
			</td>
			<td>:</td>
			<td>
				<input type="text" name="lokasi" placeholder="Masukan Lokasi" class="" required value="<?=$row['lokasi']?>"/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="gambar">Gambar Wisata</label>
			</td>
			<td>:</td>
			<td>
				<input type="file" name="gambar1" placeholder="Masukan Gambar" class="" required value="<?=$row['gambar']?>"/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="gambar">Gambar Wisata</label>
			</td>
			<td>:</td>
			<td>
				<input type="file" name="gambar2" placeholder="Masukan Gambar" class="" required value="<?=$row['gambar']?>"/>
			</td>
		</tr>
		<tr>
			<td>
				<label for="keterangan">Keterangan Hotel</label>
			</td>
			<td>:</td>
			<td>
				<input type="text" name="keterangan" placeholder="Masukan keterangan" class=""  required="" value="<?=$row['keterangan']?>"/>
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
	