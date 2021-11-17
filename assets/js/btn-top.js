"use strict";

const btnToTop = document.getElementById("btn-to-top");

const refreshBtnToTopVisibility = function () {
	if (document.documentElement.scrollTop <= 500) {
		btnToTop.style.display = "none";
	} else {
		btnToTop.style.display = "block";
	}
};

refreshBtnToTopVisibility();

btnToTop.addEventListener("click", function () {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
});

document.addEventListener("scroll", function () {
	refreshBtnToTopVisibility();
});
