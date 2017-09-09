<div id="box">
	<h1>User</h1>
	<table>
		<tr class="box-top">	
			<th>No</th>
			<th>Name</th>
			<th>Email</th>
			<th>Address</th>
			<th>Gender</th>
			<th>Place of Birth</th>
			<th>Date of Birth</th>
			<th>status</th>
			<th>Insert date</th>
			<th>Last Update</th>
			<th colspan="2">Action</th>
		</tr>
	<?php
	$sql = "SELECT * FROM user";
	$result = $crud->getResult($sql, null);

	$i = 1;
	while($row = $result->fetch()){
		
	?>

	<tr>
		<td><?=$i?></td>
		<td><?=$row['name']?></td>
		<td><?=$row['email']?></td>
		<td><?=$row['addres']?></td>
		<td><?=$row['gender']?></td>
		<td><?=$row['place_of_birth']?></td>
		<td><?=$row['date_of_birth']?></td>
		<td>
			<?php
				if (isset($row['status'])?'' :1) {
					echo "non aktif";
				}else{
					echo "actived";
				}
			?>
		</td>
		<td><?=$row['insert_date']?></td>
		<td><?=$row['last_update']?></td>
		<td><a href="?menu=aktif&id=<?=$row['id']?>&aksi=aktif" class="btn-enable">Enable</a></td>
		<td><a href="?menu=action&id=<?=$row['id']?>&aksi=blokir" class="btn-block">Block</a></td>
	</tr>
	<?php
	$i++;
	}
	?>		
	</table>
	<div class="page">
		<?php
			// $fung->nav("?menu=user",$page['jumlah'],$d);
		?>
	</div>
</div>