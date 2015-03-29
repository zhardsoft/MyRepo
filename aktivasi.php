<?php
	session_start();

	require_once("../connect.php");
	if (!isset($_GET['nope'])){
		if (!isset($_SESSION['frame'])){
				//echo "<script>location=' ../';</script>";
			}elseif($_SESSION['frame']==99) {
				//echo "<script>location=' ../';</script>"; 
		}
		$err=0;
		$nope=0;
	}else{
		$nope=$_GET['nope'];
		$_SESSION['page']=2;
	}
	error_reporting(0);
	$err=$_GET['err'];
	if(isset($_SESSION['wrn'])){
		$wrn=$_SESSION['wrn'];
		unset($_SESSION['wrn']);
	}
?>
<html>
<head>
	<link rel="stylesheet" href="../framework/foundation/css/foundation.css">
	<script src="../framework/foundation/js/foundation.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<script>
		function a(){
			var b=document.getElementById('btn-act');
			b.value='Mengirim Ulang ...';
			b.disabled=true;
			t=setTimeout(function(){document.getElementById('frm-act').src='send.php';document.getElementById('btn-act').style.display='none';},5000);
		}
	</script>
</head>
<body name="gt" id="gt" onload="parent.alertsize(document.body.scrollHeight);">
	<script>
		document.onkeydown = function (event) {
			
			if (!event) { /* This will happen in IE */
				event = window.event;
			}
				
			var keyCode = event.keyCode;
			
			if (keyCode == 8 &&
				((event.target || event.srcElement).tagName != "TEXTAREA") && 
				((event.target || event.srcElement).tagName != "INPUT")) { 
				
				if (navigator.userAgent.toLowerCase().indexOf("msie") == -1) {
					event.stopPropagation();
				} else {
					alert("prevented");
					event.returnValue = false;
				}
				
				return false;
			}
		};	
	
	</script>
<center>
		<?php
			if($loginSucces>0){
				print ("<div class=\"success\"><img src=\"../gmb/icon/succes.png\" width=\"25\" height=\"25\">\n");
				echo "Anda Sudah Terdaftar, Silakan Login..";
				print ("</div>");
			}
			if($err>0){
				print ("<div class=\"error\"><img src=\"../gmb/icon/error.png\" width=\"25\" height=\"25\">\n");
				if($err==1){echo "Login Gagal, Password Salah";}
				if($err==2){echo "Email Ini Belum Terdaftar";}
				print ("</div>");
			}
			if($wrn>0){
				print ("<div class=\"warn\">\n");
				if($wrn==1){echo "Silakan Login Untuk Melakukan Pemesanan";}
				if($wrn==2){echo "Silakan Login Untuk Merubah Akun";}
				if($wrn==3){echo "Silakan Login Untuk Mengirim Testimonial";}
				print ("</div>");
			}
		?>
	<form action="proses.php" method="POST">
	<table class="table-aktivasi">
		<tr>
			<td><h3 class="title-aktivasi">Aktivasi</h3></td>
		</tr>
		<tr>
			<td><font color="grey">Kode Aktivasi Sudah Dikirim Ke Nomor <strong> <?php echo $nope ?></strong></font><br>
			<?php
				//if(isset($_SESSION['pesan']) & isset($_SESSION['hp'])){
			?>
			<iframe id="frm-act" name="frm-act" src=""></iframe>
			<input id="btn-act" type="button" value="Kirim Ulang Kode" onclick="a();">
			<?php
			//}
			?>
			</td>
		</tr>
		<tr>
			<input type="hidden" name="nope" value="<?php echo $nope ?>">
			<td><input class="" type="text" name="kode" placeholder="Masukan Kode Aktivasi"></td>
		</tr>
		<tr>
			<td><input class="submit-aktivasi" type="submit" value="SUBMIT"></td>
		</tr>
	</table>
	</form>
</center>
	<?php $_SESSION['frame']=99; ?>
</body>
</html>