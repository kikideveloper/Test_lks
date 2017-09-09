<?
if (isset($_POST['out'])) {
	unset($_SESSION['admin']);
	session_destroy();
	$fung->redirect('index.php');
}
?>