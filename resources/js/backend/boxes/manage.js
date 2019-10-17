import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';
import bootstrap from '@fullcalendar/bootstrap';



$(document).ready(function () {
    var calendarEl = document.getElementById('calendar');

    var calendar = new Calendar(calendarEl, {
        plugins: [
            dayGridPlugin,
            timeGridPlugin,
            listPlugin,
            bootstrap
        ],
        header: {
            left: 'dayGridMonth,timeGridWeek,timeGridDay',
            center: 'title',
            right: 'prevYear,prev,next,nextYear'
        },
        businessHours: {
            // days of week. an array of zero-based day of week integers (0=Sunday)
            daysOfWeek: [ 0, 1, 2, 3, 4, 5, 6], // Monday - Thursday

            startTime: '10:00', // a start time (10am in this example)
            endTime: '18:00', // an end time (6pm in this example)
        }
    });

    $('.nav-tabs a[href="#calendar"]').on('shown.bs.tab', function(e){
        calendar.render();
    });

    $('#membersTable').DataTable({
        "language": {
            "emptyTable": "Your Box doesn't have any members yet."
        }
    });
    $('#ownersTable').DataTable({
        "language": {
            "emptyTable": "You are the only owner for this box so far."
        }
    });
    $('#adminsTable').DataTable({
        "language": {
            "emptyTable": "Your Box doesn't have any admins yet."
        }
    });
    $('#coachesTable').DataTable({
        "language": {
            "emptyTable": "Your Box doesn't have any coaches yet."
        }
    });
    $('#invitesTable').DataTable({
        "language": {
            "emptyTable": "You don't have any active invites at the moment."
        }
    });
    $('#membershipTable').DataTable({
        "language": {
            "emptyTable": "You don't have any active membership requests at the moment."
        }
    });
    // var reset = false;
    // $('.switch-input').on('click', function (event) {
    //     if (reset) {
    //         reset = false;
    //     } else {
    //         event.preventDefault();
    //         try {
    //             var route = $(this).data('url');
    //             var csrf_token = $('#boxTableCSRF').val();
    //
    //             var button = $(this);
    //             $.ajax({
    //                 /* the route pointing to the post function */
    //                 url: route,
    //                 type: 'POST',
    //                 /* send the csrf-token and the input to the controller */
    //                 data: {_token: csrf_token},
    //                 dataType: 'JSON',
    //                 /* remind that 'data' is the response of the AjaxController */
    //                 success: function (data) {
    //                     reset = true;
    //                     button.click();
    //                     var html = '<div class="alert alert-success" role="alert">' +
    //                         '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
    //                         '            <span aria-hidden="true">&times;</span>' +
    //                         '        </button>' +
    //                         '' + data['message'] +
    //                         '    </div>';
    //
    //                     $('#mainContainer').prepend(html);
    //
    //                     window.setTimeout(function () {
    //                         $(".alert").fadeTo(500, 0).slideUp(500, function () {
    //                             $(this).remove();
    //                         });
    //                     }, 4000);
    //                 },
    //                 error: function (err) {
    //                     var html = '<div class="alert alert-danger" role="alert">' +
    //                         '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
    //                         '            <span aria-hidden="true">&times;</span>' +
    //                         '        </button>' +
    //                         '' + err['responseJSON']['message'] +
    //                         '    </div>';
    //                     $('#mainContainer').prepend(html);
    //
    //                     window.setTimeout(function () {
    //                         $(".alert").fadeTo(500, 0).slideUp(500, function () {
    //                             $(this).remove();
    //                         });
    //                     }, 4000);
    //                 }
    //             });
    //         } catch (err) {
    //             var html = '<div class="alert alert-danger" role="alert">' +
    //                 '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
    //                 '            <span aria-hidden="true">&times;</span>' +
    //                 '        </button>' +
    //                 ' Oops! Something went wrong on our end.' +
    //                 '    </div>';
    //             $('#mainContainer').prepend(html);
    //         }
    //     }
    // });
});
