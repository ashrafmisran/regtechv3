<?php

	session_start();
	include 'connect.php';

	$id = $_GET['id']-10000;
	$sql = "UPDATE order_48_report SET status = 'Deleted' WHERE id = ".$id;
	$run = $conn->query($sql);
	if ($run != FALSE) {
		$_SESSION['noti'] = 'Deletion completed';
		header('Location: '. $_SERVER['HTTP_REFERER']);
	}else{
		$_SESSION['noti'] = 'Deletion failed';
		header('Location: '. $_SERVER['HTTP_REFERER']);
	}


?>