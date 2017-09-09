<div>
	<h1>Hotel</h1>
	<div class="konten">
		<?php
			$sql2 = "select * from hotel";
			$result2 = $crud->getResult($sql2, null);

			$i = 1;
			while($row2 = $result2->fetch()){

			?>
<style type="text/css">
	div.item{
		background: url('assets/img/<?=$row2['gambar1']?>');
		background-position: center;
		background-repeat: no-repeat;
		width: 23%;
		height: 30%;
		padding-top: 125px;
		-webkit-transition:0.45s;
		-moz-transition:0.45s;
		-o-transition:0.45s;
		transition:0.45s;
	}
	div.item:hover{
		background: url("assets/img/<?=$row2['gambar2']?>"); 
		background-position: center;
		background-repeat: no-repeat;
		-webkit-transition:0.45s;
		-moz-transition:0.45s;
		-o-transition:0.45s;
		transition:0.45s;
		box-shadow: 12px 19px 53px 1px;
	}
	div.info{
		background-color:  rgba(167, 167, 167, 0.78);
		text-align: center;
		width: 80%;

	}
</style>
	<form method="post">
		<a href="?user=detail&id=<?=$row2['id']?>" class="wisata">
			<div class="item">
				<div class="info"><?=$row2['nama_hotel']?><br><?=$row2['lokasi']?><br><?=$row2['keterangan']?></div>
			</div>
		</a>
	</form>
			<?php
		}
			?>
		</div>
</div>