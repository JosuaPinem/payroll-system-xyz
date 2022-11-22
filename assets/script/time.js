/**
 * /* Date
 *
 * @format
 */

setInterval(function () {
	var time = new Date();
	let day = time.getDay();
	let month = time.getMonth();
	let date = time.getDate();
	let year = time.getFullYear();

	/* Day */
	if (day === 0) {
		day = "Minggu";
	} else if (day === 1) {
		day = "Senin";
	} else if (day === 2) {
		day = "Selasa";
	} else if (day === 3) {
		day = "Rabu";
	} else if (day === 4) {
		day = "Kamis";
	} else if (day === 5) {
		day = "Jumat";
	} else if (day === 6) {
		day = "Sabtu";
	}

	/* Month */
	if (month === 0) {
		month = "January";
	} else if (month === 1) {
		month = "February";
	} else if (month === 2) {
		month = "March";
	} else if (month === 3) {
		month = "April";
	} else if (month === 4) {
		month = "May";
	} else if (month === 5) {
		month = "June";
	} else if (month === 6) {
		month = "July";
	} else if (month === 7) {
		month = "August";
	} else if (month === 8) {
		month = "September";
	} else if (month === 9) {
		month = "October";
	} else if (month === 10) {
		month = "November";
	} else if (month === 11) {
		month = "December";
	}

	let currentDate = day + ", " + date + " " + month + " " + year;
	$("#date").html(currentDate);

	/* Time */

	// To Get current time/date

	//Make Variables to get hours, minute, and second
	var hours = time.getHours();
	var min = time.getMinutes();
	var sec = time.getSeconds();

	// AM, PM Setting
	var session = "AM";

	// Conditions for time behavior
	if (hours == 0) {
		hours = 12;
	}

	if (hours >= 12) {
		session = "PM";
	}

	if (hours > 12) {
		hours = hours - 12;
	}

	// Conditions for time behavior
	hours = hours < 10 ? "0" + hours : hours;
	min = min < 10 ? "0" + min : min;
	sec = sec < 10 ? "0" + sec : sec;

	// Set the variable to span
	$("#hours").text(hours);
	$("#minutes").text(min);
	$("#seconds").text(sec);
	$("#period").text(session);
}, 1);
