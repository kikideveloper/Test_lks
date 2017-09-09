<?php
	class Cart
	{
		public function add($sessionAndId)
		{
			if (! empty($sessionAndId)) {
				return $sessionAndId += 1;
			}else{
				return $sessionAndId = 1;
			}
		}
		public function up($session, $jumlah, $hst)
		{
			if (! empty($session)) {
				foreach ($jumlah as $key => $value) {
					if ($jumlah[$key] > $hst[$key]) {
						alert('<fieldset class="alert">Jumlah barang melebihi batas kami ! </fieldset>');
					}
				}
			}
		}
	}
?>