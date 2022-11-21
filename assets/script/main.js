/** @format */

/* Toggle Sidebar */
$(".toggle").on("click", function () {
	$(".sidebar").toggleClass("maximize");
	$(".toggle").toggleClass("maximize-on");
	if (sessionStorage.getItem("maximized")) {
		sessionStorage.removeItem("maximized");
	} else {
		sessionStorage.setItem("maximized", true);
	}
});

/* Toggle Dark Mode */

$("#dark-mode").on("click", function () {
	$("body").toggleClass("dark");
	if (sessionStorage.getItem("darkmode")) {
		sessionStorage.removeItem("darkmode");
	} else {
		sessionStorage.setItem("darkmode", true);
	}
});

onload = function () {
	if (sessionStorage.getItem("darkmode")) {
		sessionStorage.getItem("darkmode");
		$("body").addClass("dark");
		$("#dark-mode").prop("checked", true).change();
		sessionStorage.setItem("darkmode", true);
	}
	if (sessionStorage.getItem("maximized")) {
		sessionStorage.getItem("maximized");
		$(".sidebar").addClass("maximize");
		$(".toggle").addClass("maximize-on");
		sessionStorage.setItem("maximized", true);
	}
};

/* Edit Profile */
$("#edit-profile").on("click", function () {
	$(".user-edit").removeClass("profile-info").prop("readonly", false).change();
	$(".form-select").prop("disabled", false).change();
	$("#save-profile").toggleClass("d-none d-flex");
	$(".change-image").toggleClass("d-none d-flex");
	$("#edit-profile").toggleClass("d-flex d-none");
	/* Datepicker */
	$("#datepicker").datepicker({
		editableDateField: false,
		format: "dd/mm/yyyy",
		autoclose: true,
		todayHighlight: true,
		uiLibrary: "bootstrap4",
	});
});

/* Save Profile */
$("#save-profile").on("click", function () {
	$(".user-edit").addClass("profile-info").prop("readonly", true).change();
	$(".form-select").prop("disabled", true).change();
	$("#save-profile").toggleClass("d-flex d-none");
	$(".change-image").toggleClass("d-flex d-none");
	$("#edit-profile").toggleClass("d-none d-flex");
	$("#datepicker").datepicker("remove");
});

/* Permission */
$("#permission").on("click", function () {
	$(".permission").removeClass("d-none");
	$(".permission").addClass("d-flex");
});

$("#present").on("click", function () {
	$(".permission").addClass("d-none");
	$(".reason").prop("checked", false).change();
});

/* Edit Salary */
$("#edit-salary").on("click", function () {
	$(".salary").prop("readonly", false).change();
});



$.ajax({
	type: "GET",
	data: "",
	url: "../../php/detail.php",
	success: function (result) {
		console.log(result);
	}
})