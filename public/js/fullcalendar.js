document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: [
            { id: '1', title: 'Event 1', start: '2021-12-01', resourceId: 'a' }
        ]
    });
    calendar.render();
});