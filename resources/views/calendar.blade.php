<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'bootstrap5',
            initialView: 'dayGridMonth',
            locale: 'ja',
            height: 'auto',
            firstDay: 1,
            headerToolbar: {
                left: "dayGridMonth,listMonth,timeGridWeek",
                center: "title",
                right: "today prev,next"
            },
            buttonText: {
                today: '今月',
                month: '月',
                list: 'リスト',
                week: '週',
            },
            noEventsContent: '案件はありません',
            eventSources: [ // ←★追記
                {
                    url: "{{ route('getEvents') }}",
                },
            ],
            eventSourceFailure () { // ←★追記
                console.error('エラーが発生しました。');
            },
            eventMouseEnter (info) { // ←★追記
                $(info.el).popover({
                    title: info.event.title,
                    content: info.event.extendedProps.description,
                    trigger: 'hover',
                    placement: 'top',
                    container: 'body',
                    html: true
                });
            }
        });
        calendar.render();
    });
</script>