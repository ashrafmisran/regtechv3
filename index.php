<?php
	include 'function.php';
	include 'connect.php';
	include 'head.php';
	include 'navbar.php';
	if ( isset($_SESSION['user']) ){
		include 'order-48.php';
	}else{
		if (isset($_GET['p'])) {
			include 'view-'.$_GET['p'].'.php';
		}else{
			include 'view-login.php';
		}
	}
	
	include 'footer.php';
?>