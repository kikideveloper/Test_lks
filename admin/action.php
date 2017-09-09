<?php
	
	// if (isset($_POST['aksi']'aktif' = '')) {
		if (!empty($_GET["aksi"])) {
			$status = true;
		}else{
			$status = false;
		}

		$sql = "UPDATE user SET status = :status WHERE id = :id";
		$param = array(
				':id' => $_GET["id"],
				':status' => $status,
			);
		$crud->execute($sql, $param);
		$fung->redirect('?menu=user');
	// }else
	// if (!isset($_GET['aksi']='blokir')) {
		if (!empty($_GET["aksi"])) {
			$status = true;
		}else{
			$status = false;
		}

		$sql = "UPDATE user SET status = :status WHERE id = :id";
		$param = array(
				':id' => $_GET["id"],
				':status' => $status,
			);
		$crud->execute($sql, $param);
		$fung->redirect('?menu=user');
	// }

?>