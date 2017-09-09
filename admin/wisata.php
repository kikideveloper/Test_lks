<div id="box">
	<h1>Wisata</h1>
	<a href="?menu=createWisata" class="new">Tambah Wisata Baru</a>
	<table>
		<tr class="box-top">	
			<th>No</th>
			<th>Tours</th>
			<th>Location</th>
			<th colspan="2">Picture</th>
			<th>Information</th>
			<th>Fasilitas</th>
			<th colspan="2">Action</th>
		</tr>
	<?php

	$sql = "select * from wisata";
	$result = $crud->getResult($sql, null);

	$i = 1;
	while($row = $result->fetch()){

	?>

	<tr>
		<td><?=$i?></td>
		<td><?=$row['wisata']?></td>
		<td><?=$row['lokasi']?></td>
		<td>
			<img src="../assets/img/<?=$row['gambar1']?>">
		</td>
		<td>
			<img src="../assets/img/<?=$row['gambar2']?>">
		</td>
		<td><?=$row['keterangan']?></td>
		<td><?=$row['fasilitas']?></td>
		<td><a href="?menu=editwisata&id=<?=$row['id']?>" class="btn-enable">Edit</a></td>
		<td><a href="?menu=delete&id=<?=$row['id']?>" class="btn-block">Delete</a></td>
		<div class="paging">
			<?php
			// $hal = 1;
			// $crud->paging($row['id'], 2, $hal);
			// $hal++;
			?>
		</div>
	</tr>
	<?php
	$i++;
	}
	?>		
	</table>
</div>