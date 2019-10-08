$(document).ready(function() {
    $('#featuresTable').DataTable();
    var reset = false;
    $('.custom-control-input').on('click', function(event) {
        if(reset){
            reset = false;
        }else{
            event.preventDefault();
            try {
                var route = $(this).data('url');
                var csrf_token = $('#featureTableCSRF').val();
                console.log(csrf_token);
                var button = $(this);
                $.ajax({
                    /* the route pointing to the post function */
                    url: route,
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: csrf_token},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        reset = true;
                        button.click();
                        var html = '<div class="alert alert-success" role="alert">' +
                            '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '            <span aria-hidden="true">&times;</span>' +
                            '        </button>' +
                            '' + data['message'] +
                            '    </div>';

                        $('#mainContainer').prepend(html);

                        window.setTimeout(function () {
                            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                                $(this).remove();
                            });
                        }, 4000);
                    },
                    error: function (err) {
                        var html = '<div class="alert alert-danger" role="alert">' +
                            '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '            <span aria-hidden="true">&times;</span>' +
                            '        </button>' +
                            '' + err['responseJSON']['message'] +
                            '    </div>';
                        $('#mainContainer').prepend(html);

                        window.setTimeout(function () {
                            $(".alert").fadeTo(500, 0).slideUp(500, function () {
                                $(this).remove();
                            });
                        }, 4000);
                    }
                });
            } catch (err) {
                var html = '<div class="alert alert-danger" role="alert">' +
                    '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                    '            <span aria-hidden="true">&times;</span>' +
                    '        </button>' +
                    ' Oops! Something went wrong on our end.' +
                    '    </div>';
                $('#mainContainer').prepend(html);
            }
        }
    });
});
