<?php
session_start();
/*define('engine',1);*/
	require_once("../connect.php");
	unset($_SESSION['row_count']);
		$_SESSION['page']=88;
		$_SESSION['login']=true;
		 echo "<script>location=' ../';</script>";

?>