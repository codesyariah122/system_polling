$(document).ready(function(){
	$('button').on("click", function(){
		const value = $("input[type=radio][name=framework]:checked").val();
		if(value)
			alert("Framework yang kamu pilih : "+value);
		else
			alert("Nothing is selected");
	})
})