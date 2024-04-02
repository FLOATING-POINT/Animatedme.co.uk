jQuery(document).ready( function($) {

	$('.approveBtn').click(function() {
		
		$.post("approve.php", { id: this.id } , function(data){
   			console.log(data);
   		});

	});
});