$(document).ready(function(){

	$('#view-data').hide().load('contents/view_data.php').fadeIn(1000);


	$('input[type=checkbox]').on("click", function(e){
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

		const value = $(this).attr('data-value');


		if(framework){
			$.ajax({
				url: 'contents/view_data.php?p=polling',
				type: 'post',
				data: 'framework='+framework,
				success: function(response){
				 	if(response){
					 	$('#view-data').load('contents/view_data.php').fadeIn(1000);
						Swal.fire({
						  position: 'bottom-left',
						  title: framework,
						  text: 'Your framework choice : '+framework,
						  imageUrl: location.href+'/assets/images/'+icon,
						  imageWidth: 150,
						  imageHeight: 130,
						  imageAlt: framework,
						  showCancelButton: false,
						  confirmButtonColor: '#3085d6',
						  cancelButtonColor: '#d33',
						  confirmButtonText: 'Yeahh, next polling again!',
						  timer: 2500
						}).then((result)=>{
							if(result.value){
								$('input[name=framework]').prop("checked", false);
							    setTimeout(function(){
							    	location.reload();
							    }, 1000);
							}
						});

					}else{
						swal.fire("Nothing framework selected");
						e.preventDefault();
					}
					
				}
			})
		}

		if(value >= 99){
			Swal.fire(framework+' : '+value)
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
							      'See you next Polling'
							    );
							    setTimeout(function(){
							    	$('#view-data').load('contents/view_data.php').fadeIn(1000);
							    }, 3000);
							  }
							})
						}
					}
			});
		}

	});
});

