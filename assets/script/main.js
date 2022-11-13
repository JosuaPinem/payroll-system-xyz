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
