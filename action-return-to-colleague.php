<?php
	include 'function.php';

	$sql = "UPDATE order_48_report SET status = 'Returned by verifier' WHERE id = ".$_GET['report'];
	$run = $conn->query($sql);

	header('Location: index.php');