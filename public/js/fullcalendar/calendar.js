$(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var calendar = $('#calendar').fullCalendar({
        events: "fetchEvents",
        displayEventTime: false,
        firstDay: 1,
        locale: 'ro',
        buttonText: {
            today:    'Astazi',
            /*month:    'Luna',
            week:     'Săptămâna',
            day:      'Ziua',
            list:     'Lista'*/
        },
        eventRender: function (event, element, view) {
            event.allDay = event.allDay === 'true';
        },
        selectable: true,
        selectHelper: true,
        select: function (start, end, allDay) {
            var title = prompt('Înscrieți orele lucrate:');

            if (title) {

                //if (!/^(2[0-3]|[0-1]?[\d]):[0-5][\d]$/.test(title)) {  -- 24 hours HH:ii
                if (!/^(1[0-2]|[0]?[\d]):[0-5][\d]$/.test(title)) {
                    alert('Format de ore incorect!'); return;
                }

                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");

                $.ajax({
                    url: 'addEvent',
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                        $('#calendar').fullCalendar('refetchEvents');
                        var msg = 'Orele au fost adăugate cu succes!';
                        if (data === 'edited') {
                            msg = 'Orele au fost editate cu succes!';
                        }
                        displayMessage(msg);
                    }
                });
            }
            calendar.fullCalendar('unselect');
        },

        editable: true,
        eventClick: function (event) {
            var deleteMsg = confirm("Confirmați ștergerea!");
            if (deleteMsg) {
                $.ajax({
                    type: "POST",
                    url: "removeEvent",
                    data: "&id=" + event.id,
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', event.id);
                            displayMessage("Orele au fost eliminate cu succes!");
                        }
                    }
                });
            }
        }

    });
});

function displayMessage(message) {
    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
