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
	$("#save-profile").removeClass("d-none");
	$("#save-profile").addClass("d-flex");
	$("#edit-profile").addClass("d-none");
});

/* Save Profile */
$("#save-profile").on("click", function () {
	$(".user-edit").addClass("profile-info").prop("readonly", true).change();
	$("#save-profile").addClass("d-none");
	$("#save-profile").removeClass("d-flex");
	$("#edit-profile").removeClass("d-none");
});
