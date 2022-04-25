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
            height: 'auto',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
            },
            events : objdata
        }) 
        calendar.render();
    });
});