<div id="box">
	<h1>Budaya</h1>
	<a href="?menu=createBudaya" class="new">Tambah Wisata Baru</a>
	<table>
		<tr class="box-top">	
			<th>No</th>
			<th>Wisata</th>
			<th>lokasi</th>
			<th colspan="2">Gambar</th>
			<th>Keterangan</th>
			<th colspan="2">Action</th>
		</tr>
	<?php

	$sql = "select * from budaya";
	$result = $crud->getResult($sql, null);

	$i = 1;
	while($row = $result->fetch()){

	?>

	<tr>
		<td><?=$i?></td>
		<td><?=$row['jenis_budaya']?></td>
		<td><?=$row['nama_budaya']?></td>
		<td>
			<img src="../assets/img/<?=$row['gambar1']?>">
		</td>
		<td>
			<img src="../assets/img/<?=$row['gambar2']?>">
		</td>
		<td><?=$row['keterangan']?></td>
		<form method="post" action="?menu=wisata.php">
			<td><a href="?menu=editwisata&id=<?=$row['id']?>">Edit</a></td>
			<td><a href="?menu=delete&id=<?=$row['id']?>">Hapus</a></td>
		</form>
	</tr>
	<?php
	$i++;
	}
	?>		
	</table>
</div>