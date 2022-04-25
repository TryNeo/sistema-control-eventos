document.addEventListener('DOMContentLoaded', function() {
    $.ajax({
        type: 'GET',
        url: base_url+"eventos/getCalendario",
    }).then(function (data) {
        let objdata = JSON.parse(data);
        console.log(objdata);
        let calendarUI = document.getElementById("calendar");
        let calendar = new FullCalendar.Calendar(calendarUI,{
            locale: 'es',
            timeZone: 'America/Guayaquil',
            height: 'auto',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'prevYear,prev,next,nextYear'
            },
            events : objdata
        }) 
        calendar.render();
    });
});