(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/backend/features/features"],{

/***/ "./resources/js/backend/features/features.js":
/*!***************************************************!*\
  !*** ./resources/js/backend/features/features.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var reset = false;
  $('.custom-control-input').on('click', function (event) {
    if (reset) {
      reset = false;
    } else {
      event.preventDefault();

      try {
        var route = $(this).data('url');
        var csrf_token = $('#featureTableCSRF').val();
        var button = $(this);
        $.ajax({
          /* the route pointing to the post function */
          url: route,
          type: 'POST',

          /* send the csrf-token and the input to the controller */
          data: {
            _token: csrf_token
          },
          dataType: 'JSON',

          /* remind that 'data' is the response of the AjaxController */
          success: function success(data) {
            reset = true;
            button.click();
            var html = '<div class="alert alert-success" role="alert">' + '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' + '            <span aria-hidden="true">&times;</span>' + '        </button>' + '' + data['message'] + '    </div>';
            $('#mainContainer').prepend(html);
            window.setTimeout(function () {
              $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
              });
            }, 4000);
          },
          error: function error(err) {
            var html = '<div class="alert alert-danger" role="alert">' + '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' + '            <span aria-hidden="true">&times;</span>' + '        </button>' + '' + err['responseJSON']['message'] + '    </div>';
            $('#mainContainer').prepend(html);
            window.setTimeout(function () {
              $(".alert").fadeTo(500, 0).slideUp(500, function () {
                $(this).remove();
              });
            }, 4000);
          }
        });
      } catch (err) {
        var html = '<div class="alert alert-danger" role="alert">' + '        <button type="button" class="close" data-dismiss="alert" aria-label="Close">' + '            <span aria-hidden="true">&times;</span>' + '        </button>' + ' Oops! Something went wrong on our end.' + '    </div>';
        $('#mainContainer').prepend(html);
      }
    }
  });
});

/***/ }),

/***/ 1:
/*!*********************************************************!*\
  !*** multi ./resources/js/backend/features/features.js ***!
  \*********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/gregorysteenhagen/Desktop/Projects/wodboss/resources/js/backend/features/features.js */"./resources/js/backend/features/features.js");


/***/ })

},[[1,"/js/manifest"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYmFja2VuZC9mZWF0dXJlcy9mZWF0dXJlcy5qcyJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsInJlc2V0Iiwib24iLCJldmVudCIsInByZXZlbnREZWZhdWx0Iiwicm91dGUiLCJkYXRhIiwiY3NyZl90b2tlbiIsInZhbCIsImJ1dHRvbiIsImFqYXgiLCJ1cmwiLCJ0eXBlIiwiX3Rva2VuIiwiZGF0YVR5cGUiLCJzdWNjZXNzIiwiY2xpY2siLCJodG1sIiwicHJlcGVuZCIsIndpbmRvdyIsInNldFRpbWVvdXQiLCJmYWRlVG8iLCJzbGlkZVVwIiwicmVtb3ZlIiwiZXJyb3IiLCJlcnIiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUFBQSxDQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVc7QUFDekIsTUFBSUMsS0FBSyxHQUFHLEtBQVo7QUFDQUgsR0FBQyxDQUFDLHVCQUFELENBQUQsQ0FBMkJJLEVBQTNCLENBQThCLE9BQTlCLEVBQXVDLFVBQVNDLEtBQVQsRUFBZ0I7QUFDbkQsUUFBR0YsS0FBSCxFQUFTO0FBQ0xBLFdBQUssR0FBRyxLQUFSO0FBQ0gsS0FGRCxNQUVLO0FBQ0RFLFdBQUssQ0FBQ0MsY0FBTjs7QUFDQSxVQUFJO0FBQ0EsWUFBSUMsS0FBSyxHQUFHUCxDQUFDLENBQUMsSUFBRCxDQUFELENBQVFRLElBQVIsQ0FBYSxLQUFiLENBQVo7QUFDQSxZQUFJQyxVQUFVLEdBQUdULENBQUMsQ0FBQyxtQkFBRCxDQUFELENBQXVCVSxHQUF2QixFQUFqQjtBQUNBLFlBQUlDLE1BQU0sR0FBR1gsQ0FBQyxDQUFDLElBQUQsQ0FBZDtBQUNBQSxTQUFDLENBQUNZLElBQUYsQ0FBTztBQUNIO0FBQ0FDLGFBQUcsRUFBRU4sS0FGRjtBQUdITyxjQUFJLEVBQUUsTUFISDs7QUFJSDtBQUNBTixjQUFJLEVBQUU7QUFBQ08sa0JBQU0sRUFBRU47QUFBVCxXQUxIO0FBTUhPLGtCQUFRLEVBQUUsTUFOUDs7QUFPSDtBQUNBQyxpQkFBTyxFQUFFLGlCQUFVVCxJQUFWLEVBQWdCO0FBQ3JCTCxpQkFBSyxHQUFHLElBQVI7QUFDQVEsa0JBQU0sQ0FBQ08sS0FBUDtBQUNBLGdCQUFJQyxJQUFJLEdBQUcsbURBQ1Asc0ZBRE8sR0FFUCxxREFGTyxHQUdQLG1CQUhPLEdBSVAsRUFKTyxHQUlGWCxJQUFJLENBQUMsU0FBRCxDQUpGLEdBS1AsWUFMSjtBQU9BUixhQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQm9CLE9BQXBCLENBQTRCRCxJQUE1QjtBQUVBRSxrQkFBTSxDQUFDQyxVQUFQLENBQWtCLFlBQVk7QUFDMUJ0QixlQUFDLENBQUMsUUFBRCxDQUFELENBQVl1QixNQUFaLENBQW1CLEdBQW5CLEVBQXdCLENBQXhCLEVBQTJCQyxPQUEzQixDQUFtQyxHQUFuQyxFQUF3QyxZQUFZO0FBQ2hEeEIsaUJBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUXlCLE1BQVI7QUFDSCxlQUZEO0FBR0gsYUFKRCxFQUlHLElBSkg7QUFLSCxXQXpCRTtBQTBCSEMsZUFBSyxFQUFFLGVBQVVDLEdBQVYsRUFBZTtBQUNsQixnQkFBSVIsSUFBSSxHQUFHLGtEQUNQLHNGQURPLEdBRVAscURBRk8sR0FHUCxtQkFITyxHQUlQLEVBSk8sR0FJRlEsR0FBRyxDQUFDLGNBQUQsQ0FBSCxDQUFvQixTQUFwQixDQUpFLEdBS1AsWUFMSjtBQU1BM0IsYUFBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0JvQixPQUFwQixDQUE0QkQsSUFBNUI7QUFFQUUsa0JBQU0sQ0FBQ0MsVUFBUCxDQUFrQixZQUFZO0FBQzFCdEIsZUFBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZdUIsTUFBWixDQUFtQixHQUFuQixFQUF3QixDQUF4QixFQUEyQkMsT0FBM0IsQ0FBbUMsR0FBbkMsRUFBd0MsWUFBWTtBQUNoRHhCLGlCQUFDLENBQUMsSUFBRCxDQUFELENBQVF5QixNQUFSO0FBQ0gsZUFGRDtBQUdILGFBSkQsRUFJRyxJQUpIO0FBS0g7QUF4Q0UsU0FBUDtBQTBDSCxPQTlDRCxDQThDRSxPQUFPRSxHQUFQLEVBQVk7QUFDVixZQUFJUixJQUFJLEdBQUcsa0RBQ1Asc0ZBRE8sR0FFUCxxREFGTyxHQUdQLG1CQUhPLEdBSVAseUNBSk8sR0FLUCxZQUxKO0FBTUFuQixTQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQm9CLE9BQXBCLENBQTRCRCxJQUE1QjtBQUNIO0FBQ0o7QUFDSixHQTdERDtBQThESCxDQWhFRCxFIiwiZmlsZSI6Ii9qcy9iYWNrZW5kL2ZlYXR1cmVzL2ZlYXR1cmVzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XG4gICAgdmFyIHJlc2V0ID0gZmFsc2U7XG4gICAgJCgnLmN1c3RvbS1jb250cm9sLWlucHV0Jykub24oJ2NsaWNrJywgZnVuY3Rpb24oZXZlbnQpIHtcbiAgICAgICAgaWYocmVzZXQpe1xuICAgICAgICAgICAgcmVzZXQgPSBmYWxzZTtcbiAgICAgICAgfWVsc2V7XG4gICAgICAgICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgICAgICB2YXIgcm91dGUgPSAkKHRoaXMpLmRhdGEoJ3VybCcpO1xuICAgICAgICAgICAgICAgIHZhciBjc3JmX3Rva2VuID0gJCgnI2ZlYXR1cmVUYWJsZUNTUkYnKS52YWwoKTtcbiAgICAgICAgICAgICAgICB2YXIgYnV0dG9uID0gJCh0aGlzKTtcbiAgICAgICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgICAgICAvKiB0aGUgcm91dGUgcG9pbnRpbmcgdG8gdGhlIHBvc3QgZnVuY3Rpb24gKi9cbiAgICAgICAgICAgICAgICAgICAgdXJsOiByb3V0ZSxcbiAgICAgICAgICAgICAgICAgICAgdHlwZTogJ1BPU1QnLFxuICAgICAgICAgICAgICAgICAgICAvKiBzZW5kIHRoZSBjc3JmLXRva2VuIGFuZCB0aGUgaW5wdXQgdG8gdGhlIGNvbnRyb2xsZXIgKi9cbiAgICAgICAgICAgICAgICAgICAgZGF0YToge190b2tlbjogY3NyZl90b2tlbn0sXG4gICAgICAgICAgICAgICAgICAgIGRhdGFUeXBlOiAnSlNPTicsXG4gICAgICAgICAgICAgICAgICAgIC8qIHJlbWluZCB0aGF0ICdkYXRhJyBpcyB0aGUgcmVzcG9uc2Ugb2YgdGhlIEFqYXhDb250cm9sbGVyICovXG4gICAgICAgICAgICAgICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICByZXNldCA9IHRydWU7XG4gICAgICAgICAgICAgICAgICAgICAgICBidXR0b24uY2xpY2soKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciBodG1sID0gJzxkaXYgY2xhc3M9XCJhbGVydCBhbGVydC1zdWNjZXNzXCIgcm9sZT1cImFsZXJ0XCI+JyArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjbG9zZVwiIGRhdGEtZGlzbWlzcz1cImFsZXJ0XCIgYXJpYS1sYWJlbD1cIkNsb3NlXCI+JyArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgICAgIDxzcGFuIGFyaWEtaGlkZGVuPVwidHJ1ZVwiPiZ0aW1lczs8L3NwYW4+JyArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgPC9idXR0b24+JyArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJycgKyBkYXRhWydtZXNzYWdlJ10gK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgPC9kaXY+JztcblxuICAgICAgICAgICAgICAgICAgICAgICAgJCgnI21haW5Db250YWluZXInKS5wcmVwZW5kKGh0bWwpO1xuXG4gICAgICAgICAgICAgICAgICAgICAgICB3aW5kb3cuc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJChcIi5hbGVydFwiKS5mYWRlVG8oNTAwLCAwKS5zbGlkZVVwKDUwMCwgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLnJlbW92ZSgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICAgICAgfSwgNDAwMCk7XG4gICAgICAgICAgICAgICAgICAgIH0sXG4gICAgICAgICAgICAgICAgICAgIGVycm9yOiBmdW5jdGlvbiAoZXJyKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICB2YXIgaHRtbCA9ICc8ZGl2IGNsYXNzPVwiYWxlcnQgYWxlcnQtZGFuZ2VyXCIgcm9sZT1cImFsZXJ0XCI+JyArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjbG9zZVwiIGRhdGEtZGlzbWlzcz1cImFsZXJ0XCIgYXJpYS1sYWJlbD1cIkNsb3NlXCI+JyArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgICAgIDxzcGFuIGFyaWEtaGlkZGVuPVwidHJ1ZVwiPiZ0aW1lczs8L3NwYW4+JyArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgPC9idXR0b24+JyArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJycgKyBlcnJbJ3Jlc3BvbnNlSlNPTiddWydtZXNzYWdlJ10gK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgPC9kaXY+JztcbiAgICAgICAgICAgICAgICAgICAgICAgICQoJyNtYWluQ29udGFpbmVyJykucHJlcGVuZChodG1sKTtcblxuICAgICAgICAgICAgICAgICAgICAgICAgd2luZG93LnNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICQoXCIuYWxlcnRcIikuZmFkZVRvKDUwMCwgMCkuc2xpZGVVcCg1MDAsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5yZW1vdmUoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH0sIDQwMDApO1xuICAgICAgICAgICAgICAgICAgICB9XG4gICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgICAgICAgICAgICB2YXIgaHRtbCA9ICc8ZGl2IGNsYXNzPVwiYWxlcnQgYWxlcnQtZGFuZ2VyXCIgcm9sZT1cImFsZXJ0XCI+JyArXG4gICAgICAgICAgICAgICAgICAgICcgICAgICAgIDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiY2xvc2VcIiBkYXRhLWRpc21pc3M9XCJhbGVydFwiIGFyaWEtbGFiZWw9XCJDbG9zZVwiPicgK1xuICAgICAgICAgICAgICAgICAgICAnICAgICAgICAgICAgPHNwYW4gYXJpYS1oaWRkZW49XCJ0cnVlXCI+JnRpbWVzOzwvc3Bhbj4nICtcbiAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgPC9idXR0b24+JyArXG4gICAgICAgICAgICAgICAgICAgICcgT29wcyEgU29tZXRoaW5nIHdlbnQgd3Jvbmcgb24gb3VyIGVuZC4nICtcbiAgICAgICAgICAgICAgICAgICAgJyAgICA8L2Rpdj4nO1xuICAgICAgICAgICAgICAgICQoJyNtYWluQ29udGFpbmVyJykucHJlcGVuZChodG1sKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgIH0pO1xufSk7XG4iXSwic291cmNlUm9vdCI6IiJ9