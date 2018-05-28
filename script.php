<script type="text/javascript">
	$('.rangepicker').daterangepicker({
	    "locale": {
	        "format": "DD/MM/YYYY"
	    },
	    "showDropdowns": true,
	    "showWeekNumbers": true,
	    "autoApply": true,
	    "ranges": {
	        'Today': [moment(), moment()],
	        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
	        'Last 7 Days': [moment().subtract(6, 'days'), moment()],
	        'Last 30 Days': [moment().subtract(29, 'days'), moment()],
	        'This Month': [moment().startOf('month'), moment().endOf('month')],
	        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
	    },
	    "opens": "right"
	});

	$('input.singledatepicker').daterangepicker({
	    "locale": {
	        "format": "DD/MM/YYYY"
	    },
	    "singleDatePicker": true,
	    "showDropdowns": true,
	    "showWeekNumbers": true,
	    "autoApply": true,
	    "opens": "right"
	})

	$('.select2').select2({
		width: '100%',
		height: '1rem',
		allowClear: true,
		tags: true,
	    tokenSeparators: [',', ';'],
		insertTag : function (data, tag) {
		    // Insert the tag at the end of the results
		    data.push(tag);
		},
		placeholder: 'Please choose...'
	});

	$('.datatable').DataTable();

	$(function () {
	  $('.has-tooltip').tooltip()
	})
</script>