"use strict";

window.addEventListener("DOMContentLoaded", function () {
	// posts search + with jquery
	function loadData(query) {
		$.ajax({
			url: "api-posts.php",
			type: "POST",
			chache: false,
			data: { query: query },
			success: function (response) {
				$("#posts-section").html(response);
				$("#posts-section").addClass("js-visible");
			},
		});
	}

	$("#input-search-bar").keyup(function () {
		let search = $(this).val();
		if (search != "") {
			loadData(search);
		} else {
			loadData();
		}
	});

	// hide search bar dropdown when click outside
	const postsDropdown = document.getElementById("posts-section");
	window.addEventListener("click", function (e) {
		if (!postsDropdown.contains(e.target)) {
			postsDropdown.classList.remove("js-visible");
		}
	});

	//clear data from search bar
	const navSearchBar = document.getElementById("input-search-bar");
	const navBtnDelete = document.getElementById("btn-search-cancel");
	navBtnDelete.addEventListener("click", function () {
		navSearchBar.value = "";
	});
}); //end of dom
