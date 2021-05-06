<?php 
	session_start();
	if($_SESSION['login'] != 0 | !isset($_SESSION['login'])) {
		if(!isset($_SESSION['lastActivity']) && (time()-$_SESSION['lastActivity'])>1800){
			unset($_SESSION['login']);
			header('Location:../index.php#');
			exit();
		}
	}
	$_SESSION['lastActivity']= time();
?>