<?php 
	include 'function.php';

	$email = $_POST['email'];
	$password = md5( $_POST['password'] );

	$sql = "SELECT id,name,position,phone,email,role FROM users WHERE email = '$email' AND password = '$password'";
	$run = $conn->query($sql);
	if ($run->num_rows > 0) {
		$row = $run->fetch_assoc();
		$_SESSION['user']['id']		       	= $row['id'];
	    $_SESSION['user']['name']       	= $row['name'];
	    $_SESSION['user']['position']       = $row['position'];
	    $_SESSION['user']['phone']          = $row['phone'];
	    $_SESSION['user']['email']          = $row['email'];
	    $_SESSION['user']['role']           = $row['role'];
	}else{
		$_SESSION['noti'] = '<p class="text-danger">Your username/password is not correct. Please re-try.</p>';
	}
	header('Location: index.php');
?>
