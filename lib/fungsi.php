<?php 
 class Fungsi{
 	public function get($var, $red)
 	{
 		return isset($_GET["$var"])?$_GET["$var"]:"$red";
 	}
 	public function post($var, $red)
 	{
 		return isset($_POST["$var"])?$_POST["$var"]:"$red";
 	}
 	public function session($var, $red)
 	{
 		return isset($_SESSION["$var"])?$_SESSION["$var"]:"$red";
 	}
 	public function alert($message)
 	{
 		echo "<script>alert('$message')</script>";
 	}
 	public function redirect($url)
 	{
 		echo "<script>location.href='$url'</script>";
 	}
 	public function back()
 	{
 		echo "<script>history.back()</script>";
 	}
 	public function nav($url, $jumlah, $page)
 	{
 		for ($i=1;$i<=$jumlah;$i++) { 
 			if ($i=$page) {
 				echo "<span>$i</span>";
 			}else{
 				echo "<a href='$url&page=$i'>$i</a>";
 			}
 		}
 	}
 } 
$fung=new Fungsi;
 ?>