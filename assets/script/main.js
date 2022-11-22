/** @format */

onload = function () {
	if (localStorage.getItem("darkmode")) {
		localStorage.getItem("darkmode");
		$("body").addClass("dark");
		$("#dark-mode").prop("checked", true).change();
		localStorage.setItem("darkmode", true);
	}
	if (localStorage.getItem("maximized")) {
		localStorage.getItem("maximized");
		$(".sidebar").addClass("maximize");
		$(".toggle").addClass("maximize-on");
		localStorage.setItem("maximized", true);
	}
	$("body").toggleClass("d-none d-flex");
};
/* Toggle Sidebar */
$(".toggle").on("click", function () {
	$(".sidebar").toggleClass("maximize");
	$(".toggle").toggleClass("maximize-on");
	if (localStorage.getItem("maximized")) {
		localStorage.removeItem("maximized");
	} else {
		localStorage.setItem("maximized", true);
	}
});

/* Toggle Dark Mode */
$("#dark-mode").on("click", function () {
	$("body").toggleClass("dark");
	if (localStorage.getItem("darkmode")) {
		localStorage.removeItem("darkmode");
	} else {
		localStorage.setItem("darkmode", true);
	}
});

/* Edit Profile */
$("#edit-profile").on("click", function () {
	$(".user-edit").removeClass("profile-info").prop("readonly", false).change();
	$(".form-select").prop("disabled", false).change();
	$("#confirm-profile").toggleClass("d-none d-flex");
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
	$("#confirm-profile").toggleClass("d-flex d-none");
	$(".change-image").toggleClass("d-flex d-none");
	$("#edit-profile").toggleClass("d-none d-flex");
	$("#datepicker").datepicker("remove");
});

/* Cancel Profile */
$("#cancel-profile").on("click", function () {
	$(".user-edit").addClass("profile-info").prop("readonly", true).change();
	$(".form-select").prop("disabled", true).change();
	$("#confirm-profile").toggleClass("d-flex d-none");
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
