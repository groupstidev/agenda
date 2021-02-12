document.addEventListener('DOMContentLoaded', function () {
    var calendarEl = document.getElementById('calendar');
    //$('#aviso').modal('show');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        locale: 'pt-br',
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'listDay,listWeek,dayGridMonth'
        },

        // customize the button names,
        // otherwise they'd all just say "list"
        views: {
            listDay: {
                buttonText: 'Dia'
            },
            listWeek: {
                buttonText: 'Semana'
            }
        },
        defaultView: 'listWeek',
        timeZone: 'local',
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: 'list_eventos.php',
        extraParams: function () {
            return {
                cachebuster: new Date().valueOf(),
            };


        },
        eventClick: function (info) {

            info.jsEvent.preventDefault(); // don't let the browser navigate

            $('#visualizar #id').text(info.event.id);
            $('#visualizar #id').val(info.event.id);
            $('#visualizar #solicitante').text(info.event.extendedProps.solicitante);
            $('#visualizar #solicitante').val(info.event.extendedProps.solicitante);
            $('#visualizar #title').text(info.event.title);
            $('#visualizar #title').val(info.event.title);
            $('#visualizar #conexao').text(info.event.extendedProps.conexao);
            $('#visualizar #conexao').val(info.event.extendedProps.conexao);

            $('#visualizar #gatekeeper').text(info.event.extendedProps.gatekeeper);
            $('#visualizar #gatekeeper').val(info.event.extendedProps.gatekeeper);
            $('#visualizar #link').text(info.event.extendedProps.link);
            $('#visualizar #link').val(info.event.extendedProps.link);
            $('#visualizar #sala').text(info.event.extendedProps.sala);
            $('#visualizar #sala').val(info.event.extendedProps.sala);

            $('#visualizar #start').text(info.event.start.toLocaleString('pt-br'));
            $('#visualizar #start').val(info.event.start.toLocaleString('pt-br'));
            $('#visualizar #end').text(info.event.end.toLocaleString('pt-br'));
            $('#visualizar #end').val(info.event.end.toLocaleString('pt-br'));
            $('#visualizar #color').val(info.event.backgroundColor);

            $('#visualizar').modal('show');
        },
        selectable: true,
        select: function (info) {
            $('#cadastrar #start').val(info.start.toLocaleString('pt-br'));
            $('#cadastrar #end').val(info.end.toLocaleString('pt-br'));

            $('#cadastrar').modal('show');
        },
    });

    calendar.render();
});