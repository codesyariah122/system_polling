	$(document).ready(function(){
		$('input[type=checkbox]').on('click', function(e){
			const reaction = $('input[name=reaction]:checked').val();
			const emoji = $('input[name=reaction]:checked').attr('data-checkbox');
			if(reaction){
				$.ajax({
					url: '<?=base_url()?>home/reaction',
					type: 'post',
					data: 'reaction='+reaction,
					success: function(response){
						if(response == reaction){
							$('#view-reaction').load('<?=base_url()?>home/index/').fadeIn(1000);
							$('input[type=checkbox]').prop("checked", false);						
							alert("Your Reaction : "+emoji);
						}else{
							alert("Nothing selected data");
						}
					}
				})
			}
		})
	})
