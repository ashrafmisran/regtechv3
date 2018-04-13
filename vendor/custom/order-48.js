function deleteOrder(url,id){
	$.$.ajax({
		url: url,
		type: 'GET',
		dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		data: {order-id: id},
	})
	.done(function() {
		console.log("success");
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}
