<div class="modal fade" id="modal-upload-replied-email">
	<div class="modal-dialog modal-lg" role="document">
		<form action="action-upload-replied-email.php" method="post" class="modal-content" enctype="multipart/form-data">
			<div class="modal-header">
				<h4 class="modal-title">Upload replied email</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-3">
						<label>Order ID</label>
					</div>
					<div class="col-md-9">
						<input id="input-order-id" class="form-control mb-1" type="text" name="order-id" readonly>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<label>Email Date</label>
					</div>
					<div class="col-md-9">
						<input id="input-email-date" class="form-control mb-1" type="text" name="email-date" readonly>
					</div>
				</div>
				<div class="row mb-1">
					<div class="col-md-3">
						<label>Email</label>
					</div>
					<div class="col-md-9">
						<input type="file" name="email" class="form-control" accept=".msg">
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