<?php

	session_start();
	include 'connect.php';

	$id = $_GET['id']-10000;
	echo $sql = "UPDATE order_48 SET status = 'Deleted' WHERE order_id = ".$id;
	$run = $conn->query($sql);
	if ($run != FALSE) {
		$_SESSION['noti'] = 'Deletion completed';
		header('Location: '. $_SERVER['HTTP_REFERER']);
	}else{
		$_SESSION['noti'] = 'Deletion failed';
		header('Location: '. $_SERVER['HTTP_REFERER']);
	}


?>