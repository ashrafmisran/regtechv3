<?php
	session_start();
	include 'connect.php';
	include 'function.php';

	/*echo '<textarea style="width:100%;height:800px">';
	var_dump($_POST);
	echo('<br>');
	var_dump($_FILES);
	echo('</textarea>');*/
	
	// Set variable
		$order_id 		= $_POST['order-id'];
		$email_subject  = $_FILES['email']['name'];
		$email_date 	= $_POST['email-date'];

	// Update database
		$sql = "UPDATE order_48 SET status = 'Replied' WHERE order_id = $order_id";
		$run = $conn->query($sql);

	// Upload to folder
		$folder			= 'docs/amla/ORDER/' . substr($email_date,0,4) .'/'. substr($email_date,5,2) .'/'. substr($email_date,8,2) .'/'. $order_id .'/';
		make_directory($folder);

		// Upload email
		move_uploaded_file($_FILES['email']['tmp_name'], $folder.'3 - '.$_FILES['email']['name']);

		// Upload attachment
		for ($i=0; $i < count($_FILES['attachment']['name']); $i++) { 
			move_uploaded_file($_FILES['attachment']['tmp_name'][$i], $folder.'2 - '.$_FILES['attachment']['name'][$i]);
		}


	header('Location: '.$_SERVER['HTTP_REFERER']);


?>