$(document).ready(function(){
	$('button').on("click", function(e){

		const value = $("input[type=radio][name=framework]:checked").val();
		if(value){
			alert("Framework yang kamu pilih : "+value);
		}
		else{
			alert("Nothing is selected");
			e.preventDefault();
		}
		
	})
})