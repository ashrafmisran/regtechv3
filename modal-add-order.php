<div class="modal fade" id="modal-add-order">
	<div class="modal-dialog modal-lg" role="document">
		<form action="action-add-order.php" method="post" class="modal-content" enctype="multipart/form-data">
			<div class="modal-header">
				<h4 class="modal-title">Add new order</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					<span class="sr-only">Close</span>
				</button>
			</div>
			<div class="modal-body">
				
				<div class="row mb-1">
					<div class="col-md-3">
						<label>Email Date</label>
					</div>
					<div class="col-md-9">
						<input type="text" name="email-date" class="singledatepicker form-control">
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

				<div class="row mb-1">
					<div class="col-md-3">
						<label>Attachment</label>
					</div>
					<div class="col-md-9">
						<input type="file" name="attachment[]" class="form-control" multiple accept=".doc,.docx,.pdf,.xls,.xlsx">
					</div>
				</div>

				<div class="row mb-1">
					<div class="col-md-3">
						<label>Location</label>
					</div>
					<div class="col-md-9">
						<select name="location" class="select2 form-control w-100">
							<?php $run = $conn->query('SELECT * FROM locations'); while($row = $run->fetch_assoc()){ ?>
								<option><?php echo $row['loc_name']; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="row mb-1">
					<div class="col-md-3">
						<label>Reply To</label>
					</div>
					<div class="col-md-9">
						<select name="reply-to[]" class="select2 form-control w-100" multiple>
							<?php $run = $conn->query('SELECT * FROM emails'); while($row = $run->fetch_assoc()){ ?>
								<?php if($row['fullname'] == 'Rashid Ismail ' OR $row['fullname'] == 'Sofiah Chong Abdullah ') {continue;} ?>
								<option><?php echo $row['fullname'].' &lt;'.$row['address'].'&gt;'; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="row mb-1">
					<div class="col-md-3">
						<label>CC To</label>
					</div>
					<div class="col-md-9">
						<select name="cc-to[]" class="select2 w-100 form-control" multiple>
							<option selected>Rashid Ismail &lt;rashid@bimbsec.com.my&gt;</option>
							<option selected>Sofiah Chong Abdullah &lt;sofiah@bimbsec.com.my&gt;</option>
							<?php $run = $conn->query('SELECT * FROM emails'); while($row = $run->fetch_assoc()){ ?>
								<?php if($row['fullname'] == 'Rashid Ismail ' OR $row['fullname'] == 'Sofiah Chong Abdullah ') {continue;} ?>
								<option><?php echo $row['fullname'].' &lt;'.$row['address'].'&gt;'; ?></option>
							<?php } ?>
						</select>
					</div>
				</div>

				<div class="row mb-1">
					<div class="col-md-3">
						<label>Remark</label>
					</div>
					<div class="col-md-9">
						<textarea name="remark" class="form-control"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-primary">Add new</button>
			</div>
		</form><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->