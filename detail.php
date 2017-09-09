<div class="detail">
	<div class="item-bacground">
		<?php
		$sql = "SELECT * FROM wisata Where id = :id";
		$param = array(":id"=>$_GET['id']);
		// $result = $crud->execute($sql, $param);
		$data = $crud->getResult($sql,$param);
		while($field = $data->fetch()) {
		?>
		<div class="isi-detail">
			<div class="panel panel-top">
				<h1><?=$field['wisata']?></h1>
				<p><?=$field['lokasi']?></p>
			</div>
			<div class="gambar">
				<img src="assets/img/<?=$field['gambar1']?>">
				<img src="assets/img/<?=$field['gambar2']?>">
			</div>
			<div class="keterangan">
				<?=$field['keterangan']?>
			</div>
		</div>
		<?php
		}
		?>
		<form method="post" action="?user=detail">
			<input type="submit" name="back" value="< < Back" />
		</form>
		<?php
			if (isset($_POST['back'])) {
				$fung->redirect("index.php?user=wisata");
			}
		?>
	</div>
</div>