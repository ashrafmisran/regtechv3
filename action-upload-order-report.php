<?php
	var_dump($_FILES);
	var_dump($_POST);
	
	// Set the variable
	$report_date = $_POST['report-date'];
	$status		= 'Uploaded';
	$remark		= $_POST['remark'];

	// Upload file
	$folder			= 'docs/amla/REPORT/';
	make_directory($folder);

	move_uploaded_file($_FILES['report']['tmp_name'], $folder. substr($report_date,0,4) .'-'. substr($report_date,5,2) .'-'. substr($report_date,8,2) .'-');

	// Insert into order_48_report table
	
	

?>