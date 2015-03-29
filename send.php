<?php
session_start();
	//if(isset($_SESSION['pesan']) && isset($_SESSION['hp'])){
	$pesan=$_SESSION['pesan'];
	$handphone=$_SESSION['hp'];
	echo "<iframe id=\"frame-out\" name=\"frame-out\" src=\"\" style=\"border:0px;\"></iframe>";
	echo "<script>alert('Kode Aktivasi Di Kirim Ke Nomor $handphone');</script>";
		//echo "<script>parent.alertsize(20);alert('Kode Aktivasi Akan Di Kirim Ke Nomor $handphone');</script>";
	//echo "<script>self.frames['frame-out'].location.href='http://masking.sms-notifikasi.com/apps/smsapi.php?userkey=imul94&passkey=30081994&nohp=$handphone&pesan=$pesan';setTimeout(function(){ location = '../aktivasi/aktivasi.php?nope=$handphone'; }, 3000);</script>";
	unset($_SESSION['pesan']);
	unset($_SESSION['hp']);
	//}	
?>