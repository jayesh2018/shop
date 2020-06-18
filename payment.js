function createOrder()
{
	console.log( "clicked!" );
	console.log($('#amount').val());
	var amount = $('#amount').val()
	$.post("paymentfetch.php", {amount:amount}, function(data, status){
    // alert("Data: " + data + "\nStatus: " + status);
    window.location.href = 'http://shopgold.xyz/payment.php';
  });
}
$(document).ready(function() {

	console.log( "ready!" );
});