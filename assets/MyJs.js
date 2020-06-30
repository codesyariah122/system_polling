$(document).ready(function(){
	$('#view-data').load('contents/view_data.php');

	$('#polling-form').submit(function(event){
		const action = $(this).attr('action');
		const method = $(this).attr('method');
		let value = $('input[type=radio][name=framework]:checked').val();
		//boolean check
		if(value){
			alert("Framework pilihanmu : "+value);

			$.ajax({
				url: action,
				type: method,
				cache: false,
				async: false,
				dataType: 'JSON',
				data: {framework: value},
				success: function(data){
					if(data.statusCode==200)
						location.reload();
				}
			})
		}else{
			confirm("Nothing is selected");
			event.preventDefault();
		}
	})
})