<div class="container-fluid">
	<h3>AMLA Daily Checklist</h3>
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
			<div class="nav flex-column nav-pills" id="amla-daily-tab" role="tablist" aria-orientation="vertical">
			  <a class="nav-link active" id="v-pills-trust-deposit-tab" data-toggle="pill" href="#v-pills-trust-deposit" role="tab" aria-controls="v-pills-trust-deposit" aria-selected="true">Client Daily Trust / Deposit exceeding RM10,000</a>
			  <a class="nav-link" id="v-pills-hrpep-tab" data-toggle="pill" href="#v-pills-hrpep" role="tab" aria-controls="v-pills-hrpep" aria-selected="false">High Risk (HR) Client's Transaction</a>
			  <a class="nav-link" id="v-pills-foreign-tab" data-toggle="pill" href="#v-pills-foreign" role="tab" aria-controls="v-pills-foreign" aria-selected="false">Foreign Account Trading</a>
			  <a class="nav-link" id="v-pills-payment-tab" data-toggle="pill" href="#v-pills-payment" role="tab" aria-controls="v-pills-payment" aria-selected="false">Client's Payment By The Company</a>
			  <a class="nav-link" id="v-pills-receipt-tab" data-toggle="pill" href="#v-pills-receipt" role="tab" aria-controls="v-pills-receipt" aria-selected="false">Client's Receipt By The Company</a>
			  <a class="nav-link" id="v-pills-trust-withdrawal-tab" data-toggle="pill" href="#v-pills-trust-withdrawal" role="tab" aria-controls="v-pills-trust-withdrawal" aria-selected="true">Client Daily Trust / Withdrawal</a>
			  <a class="nav-link" id="v-pills-order-48-tab" data-toggle="pill" href="#v-pills-order-48" role="tab" aria-controls="v-pills-order-48" aria-selected="true">Section 48 Order</a>
			</div>
		</div>
		<form class="col-9" style="height: 590px; overflow-y: scroll;">
			<div class="tab-content" id="amla-daily-panel">
			  <div class="tab-pane fade show active" id="v-pills-trust-deposit" role="tabpanel" aria-labelledby="v-pills-trust-deposit-tab">
			  	<h4>Client Daily Trust / Deposit exceeding RM10,000</h4>
			  </div>
			  <div class="tab-pane fade" id="v-pills-hrpep" role="tabpanel" aria-labelledby="v-pills-hrpep-tab">
			  	<h4>High Risk (HR) Client's Transaction</h4>
			  </div>
			  <div class="tab-pane fade" id="v-pills-foreign" role="tabpanel" aria-labelledby="v-pills-foreign-tab">
			  	<h4>Foreign Account Trading</h4>
			  </div>
			  <div class="tab-pane fade" id="v-pills-payment" role="tabpanel" aria-labelledby="v-pills-payment-tab">
			  	<h4>Client's Payment By The Company</h4>
			  </div>
			  <div class="tab-pane fade" id="v-pills-receipt" role="tabpanel" aria-labelledby="v-pills-receipt-tab">
			  	<h4>Client's Receipt By The Company</h4>
			  </div>
			  <div class="tab-pane fade" id="v-pills-trust-withdrawal" role="tabpanel" aria-labelledby="v-pills-trust-withdrawal-tab">
			  	<h4>Client Daily Trust / Withdrawal</h4>
			  </div>
			  <div class="tab-pane fade" id="v-pills-order-48" role="tabpanel" aria-labelledby="v-pills-order-48-tab">
			  	<h4>Section 48 Order</h4>
			  	<hr>
			  	<div class="report-details container-fluid">
			  		<h5>Report Details</h5>
			  		<div class="bg-light p-2 mb-3">
			  			<object width="100%" height="200" data="docs/amla/REPORT/<?php echo(substr($_GET['date'],6,4).'-'.substr($_GET['date'],3,2).'-'.substr($_GET['date'],0,2) ) ?>.pdf"></object>
			  		</div>
			  	</div>
			  	<div class="review container-fluid">
			  		<h5>Review by HOD</h5>
			  		<div class="input-group row">
				  		<label class="col-2">Status:</label>
				  		<div class="form-check col-3">
						  <input class="form-check-input" type="radio" name="exception-status" id="order-48-no-exception" checked>
						  <label class="form-check-label" for="order-48-no-exception">
						    No exception
						  </label>
						</div>
						<div class="form-check col-3">
						  <input class="form-check-input" type="radio" name="exception-status" id="order-48-exception">
						  <label class="form-check-label" for="order-48-exception">
						    Exception
						  </label>
						</div>
			  		</div>
			  		<div class="input-group row mt-1">
				  		<label class="col-2">Remarks:</label>
				  		<textarea class="col-10 form-control"></textarea>
			  		</div>
			  	</div>
			  	<div class="controller mt-3">
			  		<div class="d-flex justify-content-between">
			  			<button type="button" class="btn"><i class="fas fa-arrow-left"></i> Prev</button>
			  			<button type="button" class="btn" onclick="showtab(3)">Next <i class="fas fa-arrow-right"></i></button>
			  		</div>
			  	</div>
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
