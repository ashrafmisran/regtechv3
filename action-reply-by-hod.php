<?php
	include 'function.php';

	switch ($_POST['newstatus']) {
		case 'ok':
			$newstatus = 'Archived';
			break;
		case 'exception':
			$newstatus = 'Follow-up';
			break;
		case 'returned':
			$newstatus = 'Returned by HOD';
			break;
	}

	$remark = $_POST['remark'];

	$report_id = $_POST['report'];

	$sql = "UPDATE order_48_report SET status = '$newstatus', hod = ".$_SESSION['user']['id'].", remark_hod = '$remark' WHERE id = $report_id";
	$conn->query($sql);

	header('Location: index.php');
