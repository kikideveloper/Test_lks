
<div class="isi">
	
	<div class="konten">
		<div class="head">
			<h1>Wisata</h1>
		</div>
		<div class="konten">
		<?php
			$sql = "select * from wisata";
			$result = $crud->getResult($sql, null);

			$i = 1;
			while($row = $result->fetch()){

			?>
<style type="text/css">
	div.item{
		background: url('assets/img/<?=$row['gambar1']?>');
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
		background: url("assets/img/<?=$row['gambar2']?>"); 
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
		<a href="?user=detail&id=<?=$row['id']?>" class="wisata">
			<div class="item">
				<div class="info"><?=$row['wisata']?><br><?=$row['lokasi']?><br><?=$row['keterangan']?></div>
			</div>
		</a>
	</form>
			<?php
		}
			?>
		</div>
	</div>
</div>