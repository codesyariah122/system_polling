$(document).ready(function(){

	$('#view-data').hide().load('contents/view_data.php').fadeIn(1000);

	$('input[type=radio]').on("click", function(e){
		const framework = $('input[name=framework]:checked').val();

		// alert(framework);

		switch(framework){
			case "Bootstrap":
			icon = 'bootstrap.png';
			break;
			case "Materialize":
			icon = 'materialize.png'
			break;
			case "Foundation":
			icon = 'foundation.png';
			break;
			case "Bulma":
			icon = 'bulma.png';
			break;
		}

		const value = $('#progress').attr('aria-valuenow');


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
						  title: framework,
						  text: 'Your framework choice : '+framework,
						  imageUrl: location.href+'/assets/images/'+icon,
						  imageWidth: 150,
						  imageHeight: 130,
						  imageAlt: framework,
						  timer: 2000
						});
					}else{
						swal.fire("Nothing framework selected");
						e.preventDefault();
					}
					
				}
			})
		}

		if(value >= 99){
		$('#view-data').hide().load('contents/view_data.php').fadeIn(1000);
			$.ajax({
				url: 'contents/view_data.php?p=reset',
				type: 'post',
				data: 'framework='+framework,
				success: function(response){
					if(response){
							Swal.fire({
							  title: framework+' is Winner <i class="fas fa-medal"></i>',
							  text: framework+" has 100%",
							  imageUrl: location.href+'/assets/images/'+icon,
							  imageWidth: 150,
							  imageHeight: 130,
							  imageAlt: framework,	
							  showCancelButton: false,
							  confirmButtonColor: '#3085d6',
							  cancelButtonColor: '#d33',
							  confirmButtonText: 'Yeahh, next polling again!'
							}).then((result) => {
							  if (result.value) {
							    Swal.fire(
							      'Ok !',
							      'See you next Polling',
							      location.href+'/assets/images/'+icon,
								  '150',
								  '130',
								  framework,
							    );
							    setTimeout(function(){
							    	$('#view-data').load('contents/view_data.php').fadeIn(1000);
							    }, 1500);
							  }
							})
						}
					}
			});
		}

	});
});

