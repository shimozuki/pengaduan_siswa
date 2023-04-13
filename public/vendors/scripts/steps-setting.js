$(".tab-wizard").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#</span> #title#',
	labels: {
		finish: "Submit"
	},
	onStepChanged: function (event, currentIndex, priorIndex) {
		$('.steps .current').prevAll().addClass('disabled');
	},
	onFinished: function (event, currentIndex) {
		$('#success-modal').modal('show');
	}
});
function validateRequired(index) {
	const form = document.getElementById("formRegister");
	const fields = form.querySelectorAll("input");
	let validate = 0;
	fields.forEach(field => {
		e = document.getElementById(field.name);
		if (index == 0) {
			if (field.value == "" && field.name != 'name' && field.name != 'telp') {
				e.innerHTML = field.name + " harus diisi";
				e.style.visibility = "visible";
			} else if (field.value != "" && field.name != '_token' && field.name != 'name' && field.name != 'telp') {
				e.style.visibility = "hidden";
				e.innerHTML = "";
				validate += 1;
			}
		} else if (index == 1) {
			if (field.value == "" && field.name == 'name') {
				console.log(field.name);
				e.innerHTML = field.name + " harus diisi";
				e.style.visibility = "visible";
			} else if (field.value == "" && field.name == 'telp') {
				e.innerHTML = field.name + " harus diisi";
				e.style.visibility = "visible";
			} else if (field.value != "" && field.name != '_token' && field.name != 'nik' && field.name != 'username' && field.name != 'password' && field.name != 'password_confirmation') {
				e.style.visibility = "hidden";
				e.innerHTML = "";
				validate += 1;
			}
		}
	});
	if (validate == 4 && index == 0) {
		return true;
	} else if (validate == 2 && index == 1) {
		return true
	} else {
		return false;
	}
}
$(".tab-wizard2").steps({
	headerTag: "h5",
	bodyTag: "section",
	transitionEffect: "fade",
	titleTemplate: '<span class="step">#index#</span> <span class="info">#title#</span>',
	labels: {
		finish: "Submit",
		next: "Next",
		previous: "Previous",
	},
	onStepChanging: function (event, currentIndex, priorIndex) {
		console.log(currentIndex);
		// $('.steps .current').prevAll().addClass('disabled');
		let x = document.forms["formRegister"]["nik"].value;
		let y = document.forms["formRegister"]["password"].value;
		let z = document.forms["formRegister"]["password_confirmation"].value;

		if (validateRequired(currentIndex)) {
			if (x.length != 16) {
				document.getElementById("nik").innerHTML = "nik harus berjumlah 16 karakter"
				document.getElementById("nik").style.visibility = "visible"
				return false;
			} else if (y != z) {
				document.getElementById("password_confirmation").innerHTML = "password tidak sama"
				document.getElementById("password_confirmation").style.visibility = "visible"
				return false;
			} else {
				document.getElementById("nik").style.visibility = "hidden"
				document.getElementById("password_confirmation").style.visibility = "hidden"
				return true;
			}
		};

		if (condition) {

		}
	},
	onFinished: function (event, currentIndex) {
		if (validateRequired(currentIndex)) {
			document.getElementById("formRegister").submit();
		} 
	}
},
);