$(document).ready(function() {
	
	$("#formAddCategory").validate({
		rules: {
			name: {
				required: true,
				minlenght: 4,
			},
			description: {
				required: true,
				minlenght: 8,
			},
		},
		messages: {
			name: {
				required: "Category's name is not empty",
				minlenght: "Category's name must have at least 4 characters",
			},
			description: {
				required: "Description is not empty",
				minlenght: "Description must have at least 8 characters",
			},
		},
		submitHandler: function () {
			alert('aaddddd');
		}
	})
	
})
