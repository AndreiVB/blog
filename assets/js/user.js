"use strict";
// show hide divs user account page
const btnAccount = document.getElementById("btn-acc-settings");
const btnPosts = document.getElementById("btn-my-posts");
const AccountSettings = document.getElementById("user-account-settings");
const UserPosts = document.getElementById("user-posts");

// AccountSettings.classList.remove("hide");
UserPosts.classList.add("hide");

btnAccount.addEventListener("click", function () {
	AccountSettings.classList.remove("hide");
	UserPosts.classList.add("hide");
	btnAccount.classList.add("btn-active");
	btnPosts.classList.remove("btn-active");
});

btnPosts.addEventListener("click", function () {
	AccountSettings.classList.add("hide");
	UserPosts.classList.remove("hide");
	btnAccount.classList.remove("btn-active");
	btnPosts.classList.add("btn-active");
});
