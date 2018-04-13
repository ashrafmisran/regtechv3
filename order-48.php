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
	  	<div class="row">
		  	<?php $run = $conn->query('SELECT * FROM order_48'); while ( $row = $run->fetch_assoc() ){ ?>
		  		<div class="col-md-6">
	  				<div class="card mb-4">
	  					<div class="card-block m-2">
	  						<h4 class="card-title">ORD-<?php echo $row['order_id'] ?></h4>
	  						<p class="card-text">Order by <span class="badge badge-secondary"><?php echo($row['orderer']) ?></span> on <span class="badge badge-secondary"><?php echo($row['order_date']) ?></span>.<br>Email received on <span class="badge badge-secondary"><?php echo($row['receive_date']) ?></span>.</p>
	  						<div class="row mb-2">
	  							<div class="col-3">
	  								<label>Files</label>
	  							</div>
	  							<div class="col">
	  								<select class="form-control">
	  									<?php $ ?>
	  									<option></option>
	  								</select>
	  							</div>
	  						</div>
	  						<button class="btn mb-1 btn-primary">Generate Email</button>
	  						<button class="btn mb-1 btn-primary">Upload replied email</button>
	  						<button class="btn mb-1 btn-danger"><i class="fas fa-trash-alt"></i></button>
	  						<button class="btn mb-1 btn-danger">Confirm delete</button>
	  						<button class="btn mb-1 btn-primary">Cancel</button>
	  					</div>
	  				</div>
	  			</div>
		  	<?php } ?>
	  	</div>
	  </div>
	  
	  <!-- Report Tab Panel -->
	  <div class="tab-pane fade" id="nav-report" role="tabpanel" aria-labelledby="nav-report-tab">

	  </div>
	</div>

</div>
<?php include 'modal-add-order.php'; ?>
<?php include 'modal-generate-email.php'; ?>