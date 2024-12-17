$(document).ready(function () {
	$('#view-data').hide().load('contents/view_data.php').fadeIn(1000);
	$('input[type=checkbox]').on("click", function (e) {
		const framework = $('input[name=framework]:checked').val();

		const value = $(this).attr('data-value');

		const lastFramework = $('input[name=lastFramework]').val();

		if (lastFramework) {
			switch (lastFramework) {
				case "Idea Orbit":
					icon = "89.jpg";
					color = "blue-text";
					break;
				case "Eureka Minds":
					icon = "89.jpg";
					color = "pink-text";
					break;
				case "Dialog Kreatif":
					icon = "89.jpg";
					color = "purple-text";
					break;
				case "Mindspark":
					icon = "89.jpg";
					color = "green-text";
					break;
				case "URidea":
					icon = "89.jpg";
					color = "blue-text";
					break;
				case "Sansvieria":
					icon = "89.jpg";
					color = "pink-text";
					break;
				case "Hexarion":
					icon = "89.jpg";
					color = "purple-text";
					break;
				case "Sinarupa":
					icon = "89.jpg";
					color = "green-text";
					break;
				case "Braind":
					icon = "89.jpg";
					color = "blue-text";
					break;
				case "Digisense Tech Solution":
					icon = "89.jpg";
					color = "pink-text";
					break;
				case "Kreatix Media":
					icon = "89.jpg";
					color = "purple-text";
					break;
				case "Sparklab Digital":
					icon = "89.jpg";
					color = "green-text";
					break;
				case "Nexlora":
					icon = "89.jpg";
					color = "blue-text";
					break;
				case "StartNova":
					icon = "89.jpg";
					color = "pink-text";
					break;
				case "Zynova":
					icon = "89.jpg";
					color = "purple-text";
					break;
				case "Vortech Digital":
					icon = "89.jpg";
					color = "green-text";
					break;
				case "Ionlab Media":
					icon = "89.jpg";
					color = "purple-text";
					break;
				case "Quantum Media":
					icon = "89.jpg";
					color = "green-text";
					break;
			}

			Swal.fire({
				position: 'bottom-left',
				title: '<strong>Session polling <u>already started</u></strong>',
				imageUrl: location.href + '/assets/images/' + icon,
				imageHeight: 150,
				imageWidth: 130,
				imageAlt: lastFramework,
				html:
					'Brand yang sudah kamu pilih : <b class="' + color + '">' + lastFramework + '</b>',
				showCloseButton: true,
				showCancelButton: false,
				focusConfirm: true,
				confirmButtonText:
					'<i class="fa fa-thumbs-up"></i> See next time!',
				confirmButtonAriaLabel: 'Thumbs up, great!',
				cancelButtonText:
					'<i class="fa fa-thumbs-down"></i>',
				cancelButtonAriaLabel: 'Thumbs down'
			});
			//load kembali view data
			setTimeout(function () {
				$('#view-data').load('contents/view_data.php').fadeIn(1000);
				$('input[name=framework]').prop('checked', false);
				//preventDefault();
			}, 1500)
		}


		//menambahkan icon untuk framework
		switch (framework) {
			case "Idea Orbit":
				icon = "89.jpg";
				color = "blue-text";
				break;
			case "Eureka Minds":
				icon = "89.jpg";
				color = "pink-text";
				break;
			case "Dialog Kreatif":
				icon = "89.jpg";
				color = "purple-text";
				break;
			case "Mindspark":
				icon = "89.jpg";
				color = "green-text";
				break;
			case "URidea":
				icon = "89.jpg";
				color = "blue-text";
				break;
			case "Sansvieria":
				icon = "89.jpg";
				color = "pink-text";
				break;
			case "Hexarion":
				icon = "89.jpg";
				color = "purple-text";
				break;
			case "Sinarupa":
				icon = "89.jpg";
				color = "green-text";
				break;
			case "Braind":
				icon = "89.jpg";
				color = "blue-text";
				break;
			case "Digisense Tech Solution":
				icon = "89.jpg";
				color = "pink-text";
				break;
			case "Kreatix Media":
				icon = "89.jpg";
				color = "purple-text";
				break;
			case "Sparklab Digital":
				icon = "89.jpg";
				color = "green-text";
				break;
			case "Nexlora":
				icon = "89.jpg";
				color = "blue-text";
				break;
			case "StartNova":
				icon = "89.jpg";
				color = "pink-text";
				break;
			case "Zynova":
				icon = "89.jpg";
				color = "purple-text";
				break;
			case "Vortech Digital":
				icon = "89.jpg";
				color = "green-text";
				break;
			case "Ionlab Media":
				icon = "89.jpg";
				color = "purple-text";
				break;
			case "Quantum Media":
				icon = "89.jpg";
				color = "green-text";
				break;
		}

		if (framework) {
			let data = { 'framework': framework };
			$.ajax({
				url: 'contents/view_data.php?p=polling',
				type: 'post',
				dataType: 'json',
				data: data,
				success: function (response) {
					if (response) {
						$('#view-data').load('contents/view_data.php').fadeIn(1000);
						Swal.fire({
							position: 'bottom-left',
							title: response,
							html: "Brand yang kamu pilih : <b class='" + color + "'>" + response + "</b>",
							imageUrl: location.href + '/assets/images/' + icon,
							imageHeight: 150,
							imageWidth: 130,
							imageAlt: response,
							showCancelButton: false,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Yeah, go it!'
						}).then((result) => {
							if (result.value) {
								$('input[name=framework]').prop("checked", false);
								setTimeout(function () {
									location.reload();
								}, 1000);
							} else {
								$('input[name=framework]').prop('checked', false);
								setTimeout(function () {
									location.reload();
								}, 500);
							}
						});

					} else {
						swal.fire("Nothing framework selected");
						e.preventDefault();
					}

				}
			})
		}

		if (value >= 99) {
			$.ajax({
				url: 'contents/view_data.php?p=reset',
				type: 'post',
				data: 'framework=' + framework,
				success: function (response) {
					if (response) {
						$('#view-data').load('contents/view_data.php').fadeIn(1000);
						Swal.fire({
							position: 'bottom-left',
							title: response,
							html: "<h4 class='" + color + "'>" + response + " is winner</h4>",
							imageUrl: location.href + '/assets/images/' + icon,
							imageHeight: 150,
							imageWidth: 130,
							imageAlt: response,
							showCancelButton: false,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Yeah, go it!'
						}).then((result) => {
							if (result.value) {
								$('input[name=framework]').prop('checked', false);
								setTimeout(function () {
									location.reload();
								}, 1000);
							} else {
								$('input[name=framework]').prop('checked', false);
								setTimeout(function () {
									location.reload();
								}, 500);
							}
						});
					}
				}
			})
		}

	})
})