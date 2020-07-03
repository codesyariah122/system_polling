// $(document).ready(function(){
// 	$('#view-data').load('contents/view_data.php');


// 	$('#polling-form').submit(function(event){
// 		const action = $(this).attr('action');
// 		const method = $(this).attr('method');
// 		let value = $('input[type=radio][name=framework]:checked').val();
// 		//boolean check
// 		if(value){
// 			alert("Framework pilihanmu : "+value);

// 			$.ajax({
// 				url: action,
// 				type: method,
// 				cache: false,
// 				async: false,
// 				dataType: 'JSON',
// 				data: {framework: value},
// 				success: function(data){
// 					if(data.statusCode==200)
// 						location.reload();
// 				}
// 			})
// 		}else{
// 			confirm("Nothing is selected");
// 			event.preventDefault();
// 		}
// 	})


// })

$(document).ready(function(){
	$('#view-data').hide().load('contents/view_data.php').fadeIn(1000);

	$('#polling-btn').on("click", function(e){
		const frameworkValue = $('input[type=radio][name=framework]:checked').val();

		if(!frameworkValue){
			alert("Nothing framework selected");
			e.preventDefault();
		}else{

			$.ajax({
				url: 'contents/view_data.php?p=polling',
				type: 'post',
				data: 'framework='+frameworkValue,
				success: function(response){
					if(response == 'success'){
						$('#view-data').load('contents/view_data.php');
						//reset input radio button
						$('input[type=radio][name=framework]').prop('checked', false);
					}else{
						alert("You not selected framework polling");
						e.preventDefault();
					}
				}
			}) 

		}


	})

});