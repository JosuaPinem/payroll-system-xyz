/** @format */

/* Active Hover */
$(".sidebar ul li").on("click", function () {
	$(".sidebar ul li.active").removeClass("active");
	$(this).addClass("active");
});

/* Toggle Sidebar */
$(".toggle").on("click", function () {
	$(".sidebar").toggleClass("minimize");
});

/* Greetings */
var today = new Date();
var curHr = today.getHours();

if (curHr < 12) {
	$(".greetings").text("Good Morning");
}

if (curHr >= 12 && curHr < 18) {
	$(".greetings").text("Good Afternoon");
}

if (curHr >= 18) {
	$(".greetings").text("Good Evening");
}
