$(document).ready(function () {
    $('#membersTable').DataTable({
        "language": {
            "emptyTable": "Your Box doesn't have any members yet."
        }
    });
    $('#staffTable').DataTable({
        "language": {
            "emptyTable": "Your Box doesn't have any staff yet."
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
