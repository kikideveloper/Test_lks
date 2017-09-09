<script type="text/javascript">
 	$(document).ready(function() {
        $("#img-slide > img").fadeOut();
        $("#img-slide > img").fadeIn(300);
        $(".welcome").fadeOut();
        $(".welcome").fadeIn(300);
        startSlider();
        
    });
	var sliderNext = 4;
    $(document).ready(function() {
        $("#img-slide > img").fadeOut();
        $("#img-slide > img").fadeIn(30);

        startSlider();
    });
 </script>
<div id="slide">
	<div class="slide" style="transform: translate(0%);">
		<img src="assets/img/Festival-Reog-Ponorogo-Jawa-timur.jpg" id="1" />
		<img src="assets/img/Telaga-Ngebel.jpg" id="2" />
		<img src="assets/img/Pantai-Pulau-Merah.jpg" id="3" />
		<img src="assets/img/reog3.jpg" id="4" class="ke" />
	</div>
</div>
<div class="margin">
	<h1>Wisata</h1>
	<div class="konten">
		<?php
			$sql = "select * from wisata";
			$result = $crud->getResult($sql, null);

			$i = 1;
			while($row = $result->fetch()){

			?>
	<a href="?user=detail&id=<?=$row['id']?>" class="wisata">
		<div class="item">
			<h3>
				<?=$row['wisata']?>
			</h3>
			<p>
				<?=$row['lokasi']?>
			</p>
			<img src="assets/img/<?=$row['gambar1']?>">
			<img src="assets/img/<?=$row['gambar2']?>">
			<div class="info">
			<br>
			<br><?=$row['keterangan']?></div>
		</div>
	</a>
			<?php
		}
			?>
		</div>
</div>
<div class="margin">
	<h1>Hotel</h1>
	<div class="konten">
		<?php
			$sql2 = "select * from hotel";
			$result2 = $crud->getResult($sql2, null);

			$i = 1;
			while($row2 = $result2->fetch()){

			?>

	<form method="post">
		<a href="?user=detail&id=<?=$row2['id']?>" class="wisata">
			<div class="item">
				<img src="assets/img/<?=$row['gambar2']?>">
				<div class="info"><?=$row2['nama_hotel']?><br><?=$row2['lokasi']?><br><?=$row2['keterangan']?></div>
			</div>
		</a>
	</form>
			<?php
		}
			?>
		</div>
</div>