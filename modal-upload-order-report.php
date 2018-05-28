<div class="modal fade" id="modal-upload-order-report">
	<div class="modal-dialog modal-lg" role="document">
		<form action="action-upload-order-report.php" method="post" class="modal-content" enctype="multipart/form-data">
			<div class="modal-header">
				<h4 class="modal-title">Upload AMLA008 Report</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3">
						<label>Report Date</label>
					</div>
					<div class="col-md-9">
						<input class="singledatepicker form-control" type="text" name="report-date" required>
					    <small class="form-text text-muted mb-2">The date when the report is generated.</small>
					</div>
				</div>
				<div class="row mb-1">
					<div class="col-md-3">
						<label>AMLA008 Report</label>
					</div>
					<div class="col-md-9">
						<input type="file" name="report" class="form-control" accept=".pdf" required>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label>Order ID</label>
					</div>
					<div class="col-md-9">
						<select class="select2 form-control" multiple name="order-id[]">
							<?php $run = $conn->query('SELECT * FROM order_48 WHERE status = "Replied" ORDER BY order_id DESC'); while ( $row = $run->fetch_assoc() ){ ?>
								<option value="<?php echo $row['order_id'] ?>">ORD-<?php echo $row['order_id'] ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-md-3">
						<label>Remark</label>
					</div>
					<div class="col-md-9">
						<textarea class="form-control" name="remark"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Upload</button>
			</div>
		</form><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
	$('#modal-upload-replied-email').on('shown.bs.modal', function (event) {
		var button 	  = $(event.relatedTarget) // Button that triggered the modal
		var id 	 	  = button.data('id')
		var emailDate = button.data('email-date')
		var modal 	  = $(this)
		modal.find('#input-order-id').val(id)
		modal.find('#input-email-date').val(emailDate)
	})
</script>