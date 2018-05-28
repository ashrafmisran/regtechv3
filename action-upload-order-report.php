<?php
	include 'function.php';
	
	// Set the variable
	$report_date = $_POST['report-date'];
	$report_date = substr($report_date,6,4) .'-'. substr($report_date,3,2) .'-'. substr($report_date,0,2);
	$order_id	= implode(',', $_POST['order-id'] );
	$status		= 'Uploaded';
	$remark		= $_POST['remark'];
	$filename   = substr($report_date,0,4) .'-'. substr($report_date,5,2) .'-'. substr($report_date,8,2) .'.pdf';

	// Upload file
	$folder			= 'docs/amla/REPORT/';
	make_directory($folder);

	move_uploaded_file($_FILES['report']['tmp_name'], $folder. $filename);

	// Insert into order_48_report table
	$sql = "INSERT INTO order_48_report (report_file,order_id,report_date,remark,status,processor) VALUES ('$filename','$order_id','$report_date','$remark','$status',".$_SESSION['user']['id'].")";
	$run = $conn->query($sql);
	
	if ($run != FALSE) {
		$_SESSION['noti'] = 'Order report uploaded';
		header('Location: '. $_SERVER['HTTP_REFERER']);
	}else{
		$_SESSION['noti'] = 'Upload failed';
		header('Location: '. $_SERVER['HTTP_REFERER']);
	}

?>