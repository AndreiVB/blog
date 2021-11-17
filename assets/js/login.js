"use strict";

const formLogin = document.getElementById("form-login");
const usernameLogin = document.getElementById("username-login");
const passwordLogin = document.getElementById("password-login");
const loginInputs = formLogin.querySelectorAll(["input"]);

formLogin.addEventListener("submit", (e) => {
	e.preventDefault();
	validateInputs();
});

function validateInputs() {
	let valid = true;
	if (usernameLogin.value === "") {
		valid = false;
		setErrorFor(usernameLogin);
	} else {
		setSuccesFor(usernameLogin);
	}

	if (passwordLogin.value === "") {
		valid = false;
		setErrorFor(passwordLogin);
	} else {
		setSuccesFor(passwordLogin);
	}
	console.log("inseamna ca merge", valid);

	if (valid) {
		formLogin.submit();
	}
}

function setErrorFor(input) {
	const formControl = input.parentElement;
	formControl.className = "form-control-login error";
}

function setSuccesFor(input) {
	const formControl = input.parentElement;
	formControl.className = "form-control-login success";
}

function setBorderInherit(input) {
	const formControl = input.parentElement;
	formControl.className = "form-control-login inherit";
}
