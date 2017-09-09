<div id="box">
	<h1>Hotel</h1>
	<a href="?menu=createHotel" class="new">Tambah Wisata Baru</a>
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

	$sql = "select * from hotel";
	$result = $crud->getResult($sql, null);

	$i = 1;
	while($row = $result->fetch()){

	?>

	<tr>
		<td><?=$i?></td>
		<td><?=$row['nama_hotel']?></td>
		<td><?=$row['lokasi']?></td>
		<td>
			<img src="../assets/img/<?=$row['gambar1']?>">
		</td>
		<td>
			<img src="../assets/img/<?=$row['gambar2']?>">
		</td>
		<td><?=$row['keterangan']?></td>
		<form method="post" action="?menu=wisata.php">
			<td><a href="?menu=editHotel&id=<?=$row['id']?>">Edit</a></td>
			<td><a href="?menu=delete&id=<?=$row['id']?>">Hapus</a></td>
		</form>
	</tr>
	<?php
	$i++;
	}
	?>		
	</table>
</div>