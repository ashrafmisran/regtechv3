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
}, function(start, end, label) {
    console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
});

$('.singledatepicker').daterangepicker({
    "locale": {
        "format": "DD/MM/YYYY"
    },
    "singleDatePicker": true,
    "showDropdowns": true,
    "showWeekNumbers": true,
    "autoApply": true,
    "opens": "right"
})