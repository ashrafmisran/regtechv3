<div class="container-fluid">
	<h3>Order 48</h3>

	<nav>
	  <div class="nav nav-tabs" id="nav-tab" role="tablist">
	    <a class="nav-item nav-link active" id="nav-order-tab" data-toggle="tab" href="#nav-order" role="tab" aria-controls="nav-order" aria-selected="true">Order</a>
	    <a class="nav-item nav-link" id="nav-report-tab" data-toggle="tab" href="#nav-report" role="tab" aria-controls="nav-report" aria-selected="false">Report</a>
	  </div>
	</nav>
	<div class="tab-content" id="nav-tabContent">
	  <!-- Order Tab Panel -->
	  <div class="tab-pane fade show active" id="nav-order" role="tabpanel" aria-labelledby="nav-order-tab">
	  	<button class="btn btn-primary my-1" data-toggle="modal" data-target="#modal-add-order">Add new Order</button>
	  	<table class="table datatable">
	  		<thead>
	  			<tr>
	  				<th>#</th>
	  				<th>Order ID</th>
	  				<th>Email date</th>
	  				<th>Order date</th>
	  				<th>Inquirer</th>
	  				<th>Indv</th>
	  				<th>Comp</th>
	  				<th>Remark</th>
	  				<th>Uploader</th>
	  				<th>Status</th>
	  				<th>Replier</th>
	  				<th>Files</th>
	  				<th>Action</th>
	  			</tr>
	  		</thead>
	  		<tbody>
		  	<?php $i = 1; $run = $conn->query('SELECT *,(SELECT name FROM users WHERE id = order_48.uploader) AS uploader_name,(SELECT name FROM users WHERE id = order_48.replier) AS replier_name FROM order_48 WHERE status <> "Deleted" ORDER BY order_id DESC'); while ( $row = $run->fetch_assoc() ){ ?>
		  		<tr>
		  			<th><?php echo $i ?></th>
	  				<td>ORD<?php echo 10000+$row['order_id'] ?></td>
	  				<td><?php echo $row['receive_date'] ?></td>
	  				<td><?php echo $row['order_date'] ?></td>
	  				<td><?php echo $row['orderer'] ?></td>
	  				<td><?php echo $row['no_of_indvdl'] ?> person(s)</td>
	  				<td><?php echo $row['no_of_comp'] ?> comp(s)</td>
	  				<td><?php echo $row['remark'] ?></td>
	  				<td><?php echo $row['uploader_name'] ?></td>
	  				<td><?php echo $row['status'] ?></td>
	  				<td><?php echo $row['replier_name'] ?></td>
	  				<td width="165px" class="bg-warning">
	  					<select class="form-control form-control-sm" onchange="window.open(this.value,'_blank')">
							<option selected disabled>Choose to view...</option>
							<?php 
								$folder = 'docs/amla/ORDER/' .substr($row['receive_date'],0,4). '/' .substr($row['receive_date'],5,2). '/' .substr($row['receive_date'],8,2). '/' .$row['order_id']. '/';
								$files = scandir($folder); foreach($files as $file){ if($file == '..' OR $file =='.'){ continue; } ?>
									<option value="<?php echo $folder.$file ?>"><?php echo $file; ?></option>
							<?php } ?>
						</select>
	  				</td>
	  				<td width="150px" class="bg-warning">
	  					<a class="btn btn-sm btn-outline-primary has-tooltip" href="generate-reply-email.php?to=<?php echo $row['reply_to'] ?>&cc=<?php echo $row['reply_cc'] ?>&subject=<?php echo urlencode( str_replace(':', '', $row['email_subject']) ) ?>&emaildate=<?php echo $row['receive_date'] ?>" title="Download draft email"><i class="fas fa-download"></i></a>
	  					<button class="btn btn-sm btn-outline-primary has-tooltip" data-toggle="modal" title="Upload replied email" data-target="#modal-upload-replied-email" data-id="ORD<?php echo 10000+$row['order_id']; ?>" data-email-date="<?php echo $row['receive_date']; ?>""><i class="fas fa-upload"></i></button>
	  					<button class="btn btn-sm btn-outline-danger has-tooltip" data-toggle="modal" title="Delete order" data-target="#modal-delete-order-<?php echo $row['order_id'] ?>"><i class="fas fa-trash-alt"></i></button>
	  				</td>
		  		</tr>

		  		<!-- Modal -->
  				<div class="modal fade" id="modal-delete-order-<?php echo $row['order_id'] ?>">
  					<div class="modal-dialog" role="document">
  						<div class="modal-content">
  							<div class="modal-header">
  								<h4 class="modal-title">Delete order</h4>
  								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  									<span aria-hidden="true">&times;</span>
  									<span class="sr-only">Close</span>
  								</button>
  							</div>
  							<div class="modal-body">
  								<p>Are you sure to delete ORD<?php echo 10000+$row['order_id'] ?>?</p>
  							</div>
  							<div class="modal-footer">
  								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
  								<a href="action-delete-order.php?id=<?php echo 10000+$row['order_id'] ?>" class="btn btn-danger">Confirm deletion</a>
  							</div>
  						</div><!-- /.modal-content -->
  					</div><!-- /.modal-dialog -->
  				</div><!-- /.modal -->

		  	<?php $i++; } ?>
		  	</tbody>
	  	</table>
	  </div>
	  
	  <!-- Report Tab Panel -->
	  <div class="tab-pane fade" id="nav-report" role="tabpanel" aria-labelledby="nav-report-tab">
	  	<button class="btn btn-primary my-1" data-toggle="modal" data-target="#modal-upload-order-report">Upload AMLA008 Report</button>
	  	<table class="table datatable">
	  		<thead>
	  			<tr>
	  				<th class="text-center">#</th>
	  				<th class="text-center">Report ID</th>
	  				<th class="text-center">Report date</th>
	  				<th class="text-center">Order(s)</th>
	  				<th class="text-center">Report File</th>
	  				<th class="text-center">Remark by Officer</th>
	  				<th class="text-center">Processor</th>
	  				<th class="text-center">Verifier</th>
	  				<th class="text-center">HOD</th>
	  				<th class="text-center">Remark by HOD</th>
	  				<th class="text-center">Status</th>
	  			</tr>
	  		</thead>
	  		<tbody>
		  	<?php $i = 1; 
		  		if ($_SESSION['user']['role'] == 2) {
		  			$conditions = '(status = "Submitted to HOD" OR status = "Archived")';
		  		}else{
		  			$conditions = '( (processor = '.$_SESSION['user']['id'].' ) OR (status = "Submitted for verification"))';
		  		}
		  		
		  		$run = $conn->query('SELECT *,(SELECT name FROM users WHERE id = order_48_report.processor) AS processor_name,(SELECT name FROM users WHERE id = order_48_report.verifier) AS verifier_name,(SELECT name FROM users WHERE id = order_48_report.hod) AS hod_name FROM order_48_report WHERE status != "Deleted" AND '.$conditions.' ORDER BY id DESC '); while ( $row = $run->fetch_assoc() ){ ?>
		  		<tr>
		  			<th class="text-center"><?php echo $i ?></th>
		  			<td class="text-center">RPT<?php echo 10000+$row['id'] ?></td>
		  			<td class="text-center"><?php echo $row['report_date'] ?></td>
		  			<td class="text-center">
		  				<?php
		  					$orders = explode(',', $row['order_id']);
		  					foreach ($orders as $id) { ?>
		  						<span style="cursor:pointer" data-toggle="modal" data-target="#modal-order-details-<?php echo $id ?>" class="badge badge-secondary has-tooltip" title="Click to see attachment(s)">ORD<?php echo 10000+$id ?></span>

		  						<!-- Modal -->
				  				<div class="modal fade" id="modal-order-details-<?php echo $id ?>">
				  					<div class="modal-dialog" role="document">
				  						<div class="modal-content">
				  							<div class="modal-header">
				  								<h4 class="modal-title">Order details &ndash; ORD<?php echo(10000+$id) ?></h4>
				  								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				  									<span aria-hidden="true">&times;</span>
				  									<span class="sr-only">Close</span>
				  								</button>
				  							</div>
				  							<div class="modal-body text-left">
				  								<h5>Attachments</h5>
				  								<?php 
				  									$sql3 = "SELECT * FROM order_48 WHERE order_id = $id";
				  									$run3 = $conn->query($sql3);
				  									$row3 = $run3->fetch_assoc();
													$folder = 'docs/amla/ORDER/' .substr($row3['receive_date'],0,4). '/' .substr($row3['receive_date'],5,2). '/' .substr($row3['receive_date'],8,2). '/' .$row3['order_id']. '/';
													$files = scandir($folder); foreach($files as $file){ if($file == '..' OR $file =='.'){ continue; } ?>
														<div class="mb-3">
															<a href="<?php echo $folder.$file ?>" target="_blank"><?php echo $file; ?></a>
														</div>
												<?php } ?>
												<h5>Remark</h5>
												<?php echo($row3['remark']) ?>
				  							</div>
				  							<div class="modal-footer">
				  								<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				  							</div>
				  						</div><!-- /.modal-content -->
				  					</div><!-- /.modal-dialog -->
				  				</div><!-- /.modal -->
		  					<?php }
		  				?>		  					
		  			</td>
		  			<td class="text-center"><a href="docs/amla/REPORT/<?php echo $row['report_date'] ?>.pdf" target="_blank"><i class="fas fa-file text-warning"></i></a></td>
		  			<td class="text-center"><?php echo $row['remark'] ?></td>
		  			<td width="150px">
		  				<?php if ($row['processor'] != $_SESSION['user']['id'] OR $_SESSION['user']['role'] == 2) { ?>
		  					<?php echo($row['processor_name']) ?>
		  				<?php }else{ ?>
		  					<a href="action-submit-for-verify.php?report=<?php echo $row['id'] ?>" class="btn btn-sm btn-outline-primary has-tooltip" title="Submit report to colleague for checking"><i class="fas fa-share-square"></i></a>
		  					
		  					<button class="btn btn-sm btn-outline-primary has-tooltip" data-toggle="modal" title="Submit report to HOD" data-target="#modal-submit-report-<?php echo $row['id'] ?>"><i class="fas fa-share-square"></i></button>
		  					<button class="btn btn-sm btn-outline-danger has-tooltip" data-toggle="modal" title="Delete report" data-target="#modal-delete-report-<?php echo $row['id'] ?>"><i class="fas fa-trash-alt"></i></button>
		  				<?php } ?>
	  				</td>
		  			<td>
		  				<?php if ($row['processor'] == $_SESSION['user']['id'] OR $_SESSION['user']['role'] == 2) { ?>
		  					<?php echo($row['verifier_name']) ?>
		  				<?php }else{ ?>
			  				<a class="btn btn-sm btn-outline-primary has-tooltip" title="Verify as no error" href="action-verify-report.php?report=<?php echo $row['id'] ?>"><i class="fas fa-check"></i></a>
		  					<a href="action-return-to-colleague.php?report=<?php echo $row['id'] ?>" class="btn btn-sm btn-outline-warning has-tooltip" data-toggle="modal" title="Return report to colleague for re-processing" data-target="#modal-delete-report-<?php echo $row['id'] ?>"><i class="fas fa-reply"></i></a>
	  					<?php } ?>
		  			</td>
	  				<td width="110px">
	  					<?php if ($_SESSION['user']['role'] != 2 OR $row['status'] == 'Archived') { ?>
		  					<?php echo($row['hod_name']); ?>
		  				<?php }else{ ?>
		  					<button class="btn btn-sm btn-outline-primary has-tooltip" data-toggle="modal" title="No exception" data-target="#modal-review-report-<?php echo $row['id'] ?>" data-label="No exception" data-status="ok"><i class="fas fa-check"></i></button>
		  					<button class="btn btn-sm btn-outline-danger has-tooltip" data-toggle="modal" title="Exception" data-target="#modal-review-report-<?php echo $row['id'] ?>" data-label="Exception" data-status="exception"><i class="fas fa-times"></i></button>
		  					<button class="btn btn-sm btn-outline-warning has-tooltip" data-toggle="modal" title="Return report to Officer for re-processing" data-target="#modal-review-report-<?php echo $row['id'] ?>" data-label="Return to Officer" data-status="returned"><i class="fas fa-reply"></i></button>
		  				<?php } ?>
	  						<div class="modal fade" id="modal-review-report-<?php echo($row['id']) ?>">
	  							<div class="modal-dialog" role="document">
	  								<form action="action-reply-by-hod.php" method="post" class="modal-content">
	  									<div class="modal-header">
	  										<h4 class="modal-title">Review RPT<?php echo(10000+$row['id']) ?></h4>
	  										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	  											<span aria-hidden="true">&times;</span>
	  											<span class="sr-only">Close</span>
	  										</button>
	  									</div>
	  									<div class="modal-body">
	  										<h5></h5>
	  										<label>Fill in your remark</label>
	  										<textarea name="remark" class="form-control"></textarea>
	  										<input class="d-none" name="report" value="<?php echo $row['id'] ?>">
	  										<input class="d-none newstatus" name="newstatus">
	  									</div>
	  									<div class="modal-footer">
	  										<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
	  										<button type="submit" class="btn btn-primary">Submit</button>
	  									</div>
	  								</form><!-- /.modal-content -->
	  							</div><!-- /.modal-dialog -->
	  						</div><!-- /.modal -->
	  						<script type="text/javascript">
	  							$('#modal-review-report-<?php echo $row['id'] ?>').on('shown.bs.modal', function (event){
	  								var button = $(event.relatedTarget);
	  								var label = button.data('label');
	  								var status = button.data('status');
	  								var modal = $(this);
	  								var link;
	  								if(status == 'ok'){
	  									modal.find('textarea').val('No exception');
	  								}else{
	  									modal.find('textarea').val('');
	  								}
	  								modal.find('h5').text(label);
	  								modal.find('.newstatus').val(status);
	  								modal.find('textarea').trigger('focus');
	  							})
	  						</script>
	  				</td>
	  				<td class="text-center"><?php echo $row['remark_hod'] ?></td>
		  			<td class="text-center"><?php
		  			 echo $row['status'] ?></td>
		  		</tr>


		  		<!-- Modal -->
  				<div class="modal fade" id="modal-delete-report-<?php echo $row['id'] ?>">
  					<div class="modal-dialog" role="document">
  						<div class="modal-content">
  							<div class="modal-header">
  								<h4 class="modal-title">Delete report</h4>
  								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  									<span aria-hidden="true">&times;</span>
  									<span class="sr-only">Close</span>
  								</button>
  							</div>
  							<div class="modal-body">
  								<p>Are you sure to delete RPT<?php echo 10000+$row['id'] ?>?</p>
  							</div>
  							<div class="modal-footer">
  								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
  								<a href="action-delete-report.php?id=<?php echo 10000+$row['id'] ?>" class="btn btn-danger">Confirm deletion</a>
  							</div>
  						</div><!-- /.modal-content -->
  					</div><!-- /.modal-dialog -->
  				</div><!-- /.modal -->


  				

		  	<?php $i++; } ?>
		  	</tbody>
		</table>
	  </div>
	</div>

</div>
<?php include 'modal-add-order.php'; ?>
<?php include 'modal-upload-replied-email.php'; ?>
<?php include 'modal-upload-order-report.php'; ?>