$(document).ready(function(){

	$('#view-data').hide().load('contents/view_data.php').fadeIn(1000);


	$('input[type=checkbox]').on("click", function(e){
		const framework = $('input[name=framework]:checked').val();
		const value = $(this).attr('data-value');

		// alert(framework);

		switch(framework){
			case "Bootstrap":
			icon = 'bootstrap.png';
			color = "blue-text";
			break;
			case "Materialize":
			icon = 'materialize.png';
			color = "pink-text";
			break;
			case "Foundation":
			icon = 'foundation.png';
			color = "green-text";
			break;
			case "Bulma":
			icon = 'bulma.png';
			color = "purple-text";
			break;
		}


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
						  timer: 1500
						}).then((result)=>{
							if(result.value){
								$('input[name=framework]').prop("checked", false);
								setTimeout(function(){
									location.reload();
								}, 1000)
							}else{
								$('input[name=framework]').prop("checked", false);
								setTimeout(function(){
									location.reload();
								}, 500)
							}
						});

					}else{
						const lastFramework = $('input[name=lastFramework]').val();
						switch(lastFramework){
							case "Bootstrap":
							lastIcon = 'bootstrap.png';
							break;
							case "Materialize":
							lastIcon = 'materialize.png';
							break;
							case "Foundation":
							lastIcon = 'foundation.png';
							break;
							case "Bulma":
							lastIcon = 'bulma.png';
							break;
						}
						Swal.fire({
						  title: '<strong>Polling session <u>already started</u></strong>',
						  position: 'bottom-left', 
						  imageUrl: location.href+'/assets/images/'+lastIcon,
						  imageWidth: 150,
						  imageHeight: 130,
						  imageAlt: framework,
						  html:
						    '<b class="blue-text">'+lastFramework+'</b> : is the last you chose'+
						    '<br/><br/>'+
						    '<b class='+color+'>See next time.</b>',
						  showCloseButton: true,
						  showCancelButton: true,
						  focusConfirm: true,
						  confirmButtonText:
						    '<i class="fa fa-thumbs-up"></i> Great!',
						  confirmButtonAriaLabel: 'Thumbs up, great!',
						  cancelButtonText:
						    '<i class="fa fa-thumbs-down"></i>',
						  cancelButtonAriaLabel: 'Thumbs down'
						});
						
						setTimeout(function(){
							$('input[name=framework]').prop("checked", false);
							e.preventDefault();
						}, 1500);
					}
					
				}
			})
		}

		if(value >= 99){
		//Swal.fire(framework+' : '+value)
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
							  confirmButtonText: 'Yeahh, next polling again!',
							  timer: 1500
							}).then((result) => {
							  if (result.value) {
							 	$('input[name=framework]').prop("checked", false);
								$('#view-data').load('contents/view_data.php').fadeIn(1000);
								    Swal.fire(
								      'Ok !',
								      'See you next Polling',
								      1500
								    );
								   
							  }else{
							  		$('input[name=framework]').prop("checked", false);
							    	$('#view-data').load('contents/view_data.php').fadeIn(1000);
							  }
							});
						}
					}
			});
		}

	});
});

