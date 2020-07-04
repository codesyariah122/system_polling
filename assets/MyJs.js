$(document).ready(function(){
	$('#view-data').hide().load('contents/view_data.php').fadeIn(1000);
	$('input[type=radio]').on("click", function(e){
		const framework = $('input[name=framework]:checked').val();
		if(framework){
			$.ajax({
				url: 'contents/view_data.php?p=polling',
				type: 'post',
				data: 'framework='+framework,
				success: function(response){
				 	if(response){
					 	$('#view-data').load('contents/view_data.php').fadeIn(1000);
						$('input[type=radio]').prop("checked", false);
						swal.fire({
							position: 'bottom-end',
							icon: 'success',
							title: 'Your framework : '+framework,
							showConfirmButton: false, 
							timer: 1500
						});
					}else{
						swal.fire("Nothing framework selected");
						e.preventDefault();
					}
					
				}
			})
		}

	})
})