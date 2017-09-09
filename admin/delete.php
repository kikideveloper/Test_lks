<?php
if (isset($_GET['id'])) {
	if ($menu='wisata') {
		$sql = "delete from wisata where id = :id ";
		$param = array(':id'=>$_GET['id']);

		if($crud->execute($sql, $param) == ''){
			$fung->alert("Data sudah Terhapus");
			$fung->redirect("?menu=wisata");
		}else{
			$fung->alert("Data gagal Terhapus");
			$fung->redirect("?menu=wisata");
		}
	}


}
 ?>