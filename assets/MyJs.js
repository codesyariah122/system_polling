// window.onscroll = function () {myfunction()};

// const header = document.getElementById("header");
// const sticky = header.offsetTop;

// function myfunction()
// {
// 	if(window.pageYOffset > sticky){
// 		header.classList.add("sticky");
// 	}else{
// 		header.classList.remove("sticky");
// 	}
// }

$(document).ready(function(){
	const header = document.getElementById("header");
	const sticky = header.offsetTop;
	console.log(sticky);
	let fix = function(){
		if(window.pageYOffset < sticky){
			console.log("Ok!");
		}else{
			console.log("Ooo No!");
		}
	}
    $('.tooltipped').tooltip();
})