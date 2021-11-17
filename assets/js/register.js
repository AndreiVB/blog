"use strict";

const form = document.getElementById("form-register");
const userName = document.getElementById("username-register");
const firstName = document.getElementById("firstname-register");
const lastName = document.getElementById("lastname-register");
const email = document.getElementById("email-register");
const password = document.getElementById("password-register");
const passwordCheck = document.getElementById("password-check-register");
const loginInputs = document.querySelectorAll(".form-control");

form.addEventListener("submit", (e) => {
	e.preventDefault();

	checkInputs();
});

function checkInputs() {
	let valid = true;
	if (userName.value === "") {
		valid = false;
		setErrorFor(userName, "Username cannot be blank");
	} else {
		setSuccesFor(userName);
	}

	if (firstName.value === "") {
		valid = false;
		setErrorFor(firstName, "First name cannot be blank");
	} else {
		setSuccesFor(firstName);
	}

	if (lastName.value === "") {
		valid = false;
		setErrorFor(lastName, "Last name cannot be blank");
	} else {
		setSuccesFor(lastName);
	}

	if (email.value === "") {
		valid = false;
		setErrorFor(email, "Email cannot be blank");
	} else if (!isEmail(email.value)) {
		valid = false;
		setErrorFor(email, "Not a valid email");
	} else {
		setSuccesFor(email);
	}

	if (password.value === "") {
		valid = false;
		setErrorFor(password, "Password cannot be blank");
	} else {
		setSuccesFor(password);
	}
	console.log("all good", valid);
	if (valid) {
		form.submit();
	}
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector("small");
	formControl.className = "form-control error";
	small.innerText = message;
}

function setSuccesFor(input) {
	const formControl = input.parentElement;
	formControl.className = "form-control success";
}

function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
		email
	);
}
