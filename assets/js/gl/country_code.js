var inputField = document.querySelector("#telephone");
var btnUSA = document.querySelector("#btn-usa");
var btnUK = document.querySelector("#btn-uk");
var btnIndia = document.querySelector("#btn-india");
var btnCanada = document.querySelector("#btn-canada");

var iti = window.intlTelInput(inputField, {
	separateDialCode: true,
	initialCountry: "in",
	utilsScript:
		"https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/utils.js",
});


// Button click event handlers
btnUSA.addEventListener("click", function () {
	iti.setCountry("us");
	// setFlagIcon("us");
});

btnUK.addEventListener("click", function () {
	iti.setCountry("gb");
	// setFlagIcon("gb");
});

btnIndia.addEventListener("click", function () {
	iti.setCountry("in");
	// setFlagIcon("in");
});

btnCanada.addEventListener("click", function () {
	iti.setCountry("ca");
	// setFlagIcon("ca");
});