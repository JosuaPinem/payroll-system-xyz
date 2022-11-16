/*
 *
 * @format
 */

/* Full Calendar */
var calendarEl = document.getElementById("calendar");
var calendar = new FullCalendar.Calendar(calendarEl, {
  themeSystem: "bootstrap5",
  initialView: "dayGridMonth",
  dayMaxEvents: true,
  contentHeight: 360,
  selectable: true,
  headerToolbar: {
    start: "title",
    end: "prev,next",
  },
  locale: "id",
  buttonText: {
    month: "Bulan",
    week: "Minggu",
    day: "Hari",
  },
});
calendar.render();
