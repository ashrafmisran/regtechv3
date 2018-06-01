<div class="container-fluid">
	<h3>Shariah Daily Checklist</h3>
	<form id="datepicker" action="?p=amla-daily" method="get" class="row mb-2">
		<div class="col-md-3">
			<label>Checklist date</label>
		</div>
		<div class="col-md-6">
			<input type="text" name="p" class="d-none" value="<?php echo $_GET['p'] ?>">
			<input type="text" name="date" class="singledatepicker form-control" value="<?php if(isset($_GET['date'])){echo $_GET['date'];} ?>" onkeydown="this.form.submit()">
		</div>
	</form>
</div>
<div class="container-fluid" style="background: #efefef; height: 640px;">
	<div class="row p-2 mt-4">
		<div class="col-3">
			<div class="nav flex-column nav-pills" id="sha-d-tabs" role="tablist" aria-orientation="vertical">
			  <a class="nav-link bg-success text-white active" id="tab-0" data-toggle="pill" href="#panel-0" role="tab" aria-controls="panel-0" aria-selected="true">Checklist</a>
			  <a class="nav-link" id="tab-1" data-toggle="pill" href="#panel-1" role="tab" aria-controls="panel-1" aria-selected="true">Buying and selling of SNCS</a>
			  <a class="nav-link" id="tab-2" data-toggle="pill" href="#panel-2" role="tab" aria-controls="panel-2" aria-selected="false">Pledge of SNCS</a>
			  <a class="nav-link" id="tab-3" data-toggle="pill" href="#panel-3" role="tab" aria-controls="panel-3" aria-selected="false">New Murabahah Share Margin facility</a>
			  <a class="nav-link" id="tab-4" data-toggle="pill" href="#panel-4" role="tab" aria-controls="panel-4" aria-selected="false">MSMF Transaction</a>
			  <a class="nav-link" id="tab-5" data-toggle="pill" href="#panel-5" role="tab" aria-controls="panel-5" aria-selected="false">Rollover of MSMF</a>
			  <a class="nav-link" id="tab-6" data-toggle="pill" href="#panel-6" role="tab" aria-controls="panel-6" aria-selected="true">Nominee Transaction</a>
			  <a class="nav-link" id="tab-7" data-toggle="pill" href="#panel-7" role="tab" aria-controls="panel-7" aria-selected="true">Ta'widh Charges</a>
			  <a class="nav-link" id="tab-8" data-toggle="pill" href="#panel-8" role="tab" aria-controls="panel-8" aria-selected="true">Company's Investment</a>
			  <a class="nav-link" id="tab-9" data-toggle="pill" href="#panel-9" role="tab" aria-controls="panel-9" aria-selected="true">Company's Borrowings</a>
			</div>
		</div>
		<form class="col-9" style="height: 590px; overflow-y: scroll;">
			<div class="tab-content" id="amla-daily-panel">
				<div class="tab-pane fade show active" id="panel-0" role="tabpanel" aria-labelledby="tab-0">
			  	<?php include 'shariah-daily/view-checklist.php'; ?>
			  </div>
			  <div class="tab-pane fade" id="panel-1" role="tabpanel" aria-labelledby="tab-1">
			  	<?php include 'shariah-daily/view-sncs-buy-sale.php'; ?>
			  </div>
			  <div class="tab-pane fade" id="panel-2" role="tabpanel" aria-labelledby="tab-2">
			  	<?php include 'shariah-daily/view-pledge.php'; ?>
			  </div>
			  <div class="tab-pane fade" id="panel-3" role="tabpanel" aria-labelledby="tab-3">
			  	<h4>New Murabahah Share Margin facility</h4>
			  	<hr>
			  </div>
			  <div class="tab-pane fade" id="panel-4" role="tabpanel" aria-labelledby="tab-4">
			  	<h4>MSMF Transaction</h4>
			  	<hr>
			  </div>
			  <div class="tab-pane fade" id="panel-5" role="tabpanel" aria-labelledby="tab-5">
			  	<h4>Rollover of MSMF</h4>
			  	<hr>
			  </div>
			  <div class="tab-pane fade" id="panel-6" role="tabpanel" aria-labelledby="tab-6">
			  	<h4>Nominee Transaction</h4>
			  	<hr>
			  </div>
			  <div class="tab-pane fade" id="panel-7" role="tabpanel" aria-labelledby="tab-7">
			  	<h4>Ta'widh Charges</h4>
			  	<hr>
			  </div>
			  <div class="tab-pane fade" id="panel-8" role="tabpanel" aria-labelledby="tab-8">
			  	<h4>Company's Investment</h4>
			  	<hr>
			  </div>
			  <div class="tab-pane fade" id="panel-9" role="tabpanel" aria-labelledby="tab-9">
			  	<h4>Company's Borrowings</h4>
			  	<hr>
			  </div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript">
	$('.singledatepicker').on('apply.daterangepicker', function(ev, picker) {
	  $('#datepicker').submit();
	});
</script>
