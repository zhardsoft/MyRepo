<?php
session_start();
error_reporting(0);
if(isset($_GET['confirm'])){
	$confirm=$_GET['confirm'];
	$map = array("@" => "+", "-" => "/");
	$confirm=strtr($confirm, $map);
	$key = 'pesanbae';
	$decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($confirm), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
	$excon=explode('/',$decrypted);
	$nope=$excon[0];
	$kode=$excon[1];
	//echo "<script>alert('$confirm$nope$kode')</script>";
}else{
	if(!isset($_POST['nope'])){
		echo "<script>top.location=' ../home';</script>";
		exit;
		}else{
		
	}
	$nope=$_POST['nope'];
	$kode=$_POST['kode'];
}
	

	$_SESSION['frame']=195;

include("../connect.php");
	
//$sql="SELECT * FROM konsumen WHERE ";
//$result=mysql_query($sql);
//$count=mysql_num_rows($result);

$sqlmail="SELECT * FROM konsumen WHERE No_telephon='$nope' AND Kode_Aktivasi='$kode'";
$resultmail=mysql_query($sqlmail);
$rowmail=mysql_fetch_array($resultmail);

if($rowmail){
	if(isset($_GET['confirm'])){
		$sql=mysql_query("UPDATE konsumen SET Aktif='1' WHERE No_telephon='$nope'");
		echo "<script>alert('Aktivasi Sukses, Silahkan Login');location = '../login'</script>";
	}else{
		$sql=mysql_query("UPDATE konsumen SET Aktif='1' WHERE No_telephon='$nope'");
		echo "<script>location = '../login/login.php?loginSucces=1'</script>";
	}
}else{
	$_SESSION['login']=true;
	if(isset($_GET['confirm'])){
		echo "<script>alert('Gagal, Kode Aktivasi Salah');location = '../'</script>";
	}else{
		echo "<script>alert('Gagal, Kode Aktivasi Salah');location = 'aktivasi.php?nope=$nope'</script>";
		echo "<script>parent.alertsize(20);</script>";
	}
}