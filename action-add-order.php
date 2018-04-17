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
		$email_subject  = $_FILES['email']['name'];
		$location		= $_POST['location'];
		$receive_date	= substr($_POST['email-date'],6,4)   .'-'.  substr($_POST['email-date'],3,2)   .'-'.  substr($_POST['email-date'],0,2);
		$reply_to		= implode(';', $_POST['reply-to']);
		$reply_cc		= implode(';', $_POST['cc-to']);
						  preg_match('/dated\s([0-9]{1,2}\s\b.*\b\s[0-9]{4})/', $_FILES['email']['name'], $order_date);
						  preg_match('/\((.*)\)/', $_FILES['email']['name'], $orderer);
						  preg_match('/([0-9]*)\sindividual/', $_FILES['email']['name'], $no_of_indvdl);
						  preg_match('/([0-9]*)\scompa/', $_FILES['email']['name'], $no_of_comp);
		$order_date		= date("Y-m-d", strtotime( $order_date[1] ));

		if (!isset($no_of_indvdl[1])) {
			$no_of_indvdl[1]= 0;
		}
		if (!isset($no_of_comp[1])) {
			$no_of_comp[1]= 0;
		}


	// Insert into database
		$sql = "INSERT INTO order_48 (order_date,orderer,email_subject,location,receive_date,no_of_indvdl,no_of_comp,reply_to,reply_cc)
					VALUES ('$order_date','$orderer[1]','$email_subject','$location','$receive_date',$no_of_indvdl[1],$no_of_comp[1],'$reply_to','$reply_cc')";
		$run = $conn->query($sql);
		$id 			= $conn->insert_id;

	// Insert into email list

		foreach ($_POST['reply-to'] as $address) {
			preg_match('/(\s*.*\s+)</', $address, $fullname);
			preg_match('/<(.*)>/', $address, $emailaddress);
			$sql = "INSERT IGNORE INTO emails (fullname,address,org) VALUES ('$fullname[1]','$emailaddress[1]','$orderer[1]')";

			$run = $conn->query($sql);
		}

		foreach ($_POST['cc-to'] as $address) {
			preg_match('/(\s*.*\s+)</', $address, $fullname);
			preg_match('/<(.*)>/', $address, $emailaddress);
			$sql = "INSERT IGNORE INTO emails (fullname,address,org) VALUES ('$fullname[1]','$emailaddress[1]','$orderer[1]')";

			$run = $conn->query($sql);
		}

	// Insert into location list
		$sql = "INSERT IGNORE INTO locations (loc_name) VALUES ('".$_POST['location']."')";
		$run = $conn->query($sql);

	// Upload to folder
		$folder			= 'docs/amla/ORDER/' . substr($_POST['email-date'],6,4) .'/'. substr($_POST['email-date'],3,2) .'/'. substr($_POST['email-date'],0,2) .'/'. $id .'/';
		make_directory($folder);

		// Upload email
		move_uploaded_file($_FILES['email']['tmp_name'], $folder.'1 - '.$_FILES['email']['name']);

		// Upload attachment
		for ($i=0; $i < count($_FILES['attachment']['name']); $i++) { 
			move_uploaded_file($_FILES['attachment']['tmp_name'][$i], $folder.'2 - '.$_FILES['attachment']['name'][$i]);
		}


	header('Location: '.$_SERVER['HTTP_REFERER']);


?>