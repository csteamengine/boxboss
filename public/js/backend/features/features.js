(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/backend/features/features"],{

/***/ "./resources/js/backend/features/features.js":
/*!***************************************************!*\
  !*** ./resources/js/backend/features/features.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#featuresTable').DataTable();
  var reset = false;
  $('.switch-input').on('click', function (event) {
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYmFja2VuZC9mZWF0dXJlcy9mZWF0dXJlcy5qcyJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIkRhdGFUYWJsZSIsInJlc2V0Iiwib24iLCJldmVudCIsInByZXZlbnREZWZhdWx0Iiwicm91dGUiLCJkYXRhIiwiY3NyZl90b2tlbiIsInZhbCIsImJ1dHRvbiIsImFqYXgiLCJ1cmwiLCJ0eXBlIiwiX3Rva2VuIiwiZGF0YVR5cGUiLCJzdWNjZXNzIiwiY2xpY2siLCJodG1sIiwicHJlcGVuZCIsIndpbmRvdyIsInNldFRpbWVvdXQiLCJmYWRlVG8iLCJzbGlkZVVwIiwicmVtb3ZlIiwiZXJyb3IiLCJlcnIiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUFBQSxDQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVk7QUFDMUJGLEdBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CRyxTQUFwQjtBQUNBLE1BQUlDLEtBQUssR0FBRyxLQUFaO0FBQ0FKLEdBQUMsQ0FBQyxlQUFELENBQUQsQ0FBbUJLLEVBQW5CLENBQXNCLE9BQXRCLEVBQStCLFVBQVVDLEtBQVYsRUFBaUI7QUFDNUMsUUFBSUYsS0FBSixFQUFXO0FBQ1BBLFdBQUssR0FBRyxLQUFSO0FBQ0gsS0FGRCxNQUVPO0FBQ0hFLFdBQUssQ0FBQ0MsY0FBTjs7QUFDQSxVQUFJO0FBQ0EsWUFBSUMsS0FBSyxHQUFHUixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFTLElBQVIsQ0FBYSxLQUFiLENBQVo7QUFDQSxZQUFJQyxVQUFVLEdBQUdWLENBQUMsQ0FBQyxtQkFBRCxDQUFELENBQXVCVyxHQUF2QixFQUFqQjtBQUVBLFlBQUlDLE1BQU0sR0FBR1osQ0FBQyxDQUFDLElBQUQsQ0FBZDtBQUNBQSxTQUFDLENBQUNhLElBQUYsQ0FBTztBQUNIO0FBQ0FDLGFBQUcsRUFBRU4sS0FGRjtBQUdITyxjQUFJLEVBQUUsTUFISDs7QUFJSDtBQUNBTixjQUFJLEVBQUU7QUFBQ08sa0JBQU0sRUFBRU47QUFBVCxXQUxIO0FBTUhPLGtCQUFRLEVBQUUsTUFOUDs7QUFPSDtBQUNBQyxpQkFBTyxFQUFFLGlCQUFVVCxJQUFWLEVBQWdCO0FBQ3JCTCxpQkFBSyxHQUFHLElBQVI7QUFDQVEsa0JBQU0sQ0FBQ08sS0FBUDtBQUNBLGdCQUFJQyxJQUFJLEdBQUcsbURBQ1Asc0ZBRE8sR0FFUCxxREFGTyxHQUdQLG1CQUhPLEdBSVAsRUFKTyxHQUlGWCxJQUFJLENBQUMsU0FBRCxDQUpGLEdBS1AsWUFMSjtBQU9BVCxhQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQnFCLE9BQXBCLENBQTRCRCxJQUE1QjtBQUVBRSxrQkFBTSxDQUFDQyxVQUFQLENBQWtCLFlBQVk7QUFDMUJ2QixlQUFDLENBQUMsUUFBRCxDQUFELENBQVl3QixNQUFaLENBQW1CLEdBQW5CLEVBQXdCLENBQXhCLEVBQTJCQyxPQUEzQixDQUFtQyxHQUFuQyxFQUF3QyxZQUFZO0FBQ2hEekIsaUJBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUTBCLE1BQVI7QUFDSCxlQUZEO0FBR0gsYUFKRCxFQUlHLElBSkg7QUFLSCxXQXpCRTtBQTBCSEMsZUFBSyxFQUFFLGVBQVVDLEdBQVYsRUFBZTtBQUNsQixnQkFBSVIsSUFBSSxHQUFHLGtEQUNQLHNGQURPLEdBRVAscURBRk8sR0FHUCxtQkFITyxHQUlQLEVBSk8sR0FJRlEsR0FBRyxDQUFDLGNBQUQsQ0FBSCxDQUFvQixTQUFwQixDQUpFLEdBS1AsWUFMSjtBQU1BNUIsYUFBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0JxQixPQUFwQixDQUE0QkQsSUFBNUI7QUFFQUUsa0JBQU0sQ0FBQ0MsVUFBUCxDQUFrQixZQUFZO0FBQzFCdkIsZUFBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZd0IsTUFBWixDQUFtQixHQUFuQixFQUF3QixDQUF4QixFQUEyQkMsT0FBM0IsQ0FBbUMsR0FBbkMsRUFBd0MsWUFBWTtBQUNoRHpCLGlCQUFDLENBQUMsSUFBRCxDQUFELENBQVEwQixNQUFSO0FBQ0gsZUFGRDtBQUdILGFBSkQsRUFJRyxJQUpIO0FBS0g7QUF4Q0UsU0FBUDtBQTBDSCxPQS9DRCxDQStDRSxPQUFPRSxHQUFQLEVBQVk7QUFDVixZQUFJUixJQUFJLEdBQUcsa0RBQ1Asc0ZBRE8sR0FFUCxxREFGTyxHQUdQLG1CQUhPLEdBSVAseUNBSk8sR0FLUCxZQUxKO0FBTUFwQixTQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQnFCLE9BQXBCLENBQTRCRCxJQUE1QjtBQUNIO0FBQ0o7QUFDSixHQTlERDtBQStESCxDQWxFRCxFIiwiZmlsZSI6Ii9qcy9iYWNrZW5kL2ZlYXR1cmVzL2ZlYXR1cmVzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuICAgICQoJyNmZWF0dXJlc1RhYmxlJykuRGF0YVRhYmxlKCk7XG4gICAgdmFyIHJlc2V0ID0gZmFsc2U7XG4gICAgJCgnLnN3aXRjaC1pbnB1dCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChldmVudCkge1xuICAgICAgICBpZiAocmVzZXQpIHtcbiAgICAgICAgICAgIHJlc2V0ID0gZmFsc2U7XG4gICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICBldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuICAgICAgICAgICAgdHJ5IHtcbiAgICAgICAgICAgICAgICB2YXIgcm91dGUgPSAkKHRoaXMpLmRhdGEoJ3VybCcpO1xuICAgICAgICAgICAgICAgIHZhciBjc3JmX3Rva2VuID0gJCgnI2ZlYXR1cmVUYWJsZUNTUkYnKS52YWwoKTtcblxuICAgICAgICAgICAgICAgIHZhciBidXR0b24gPSAkKHRoaXMpO1xuICAgICAgICAgICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICAgICAgICAgIC8qIHRoZSByb3V0ZSBwb2ludGluZyB0byB0aGUgcG9zdCBmdW5jdGlvbiAqL1xuICAgICAgICAgICAgICAgICAgICB1cmw6IHJvdXRlLFxuICAgICAgICAgICAgICAgICAgICB0eXBlOiAnUE9TVCcsXG4gICAgICAgICAgICAgICAgICAgIC8qIHNlbmQgdGhlIGNzcmYtdG9rZW4gYW5kIHRoZSBpbnB1dCB0byB0aGUgY29udHJvbGxlciAqL1xuICAgICAgICAgICAgICAgICAgICBkYXRhOiB7X3Rva2VuOiBjc3JmX3Rva2VufSxcbiAgICAgICAgICAgICAgICAgICAgZGF0YVR5cGU6ICdKU09OJyxcbiAgICAgICAgICAgICAgICAgICAgLyogcmVtaW5kIHRoYXQgJ2RhdGEnIGlzIHRoZSByZXNwb25zZSBvZiB0aGUgQWpheENvbnRyb2xsZXIgKi9cbiAgICAgICAgICAgICAgICAgICAgc3VjY2VzczogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHJlc2V0ID0gdHJ1ZTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGJ1dHRvbi5jbGljaygpO1xuICAgICAgICAgICAgICAgICAgICAgICAgdmFyIGh0bWwgPSAnPGRpdiBjbGFzcz1cImFsZXJ0IGFsZXJ0LXN1Y2Nlc3NcIiByb2xlPVwiYWxlcnRcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImNsb3NlXCIgZGF0YS1kaXNtaXNzPVwiYWxlcnRcIiBhcmlhLWxhYmVsPVwiQ2xvc2VcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICAgICAgPHNwYW4gYXJpYS1oaWRkZW49XCJ0cnVlXCI+JnRpbWVzOzwvc3Bhbj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8L2J1dHRvbj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnJyArIGRhdGFbJ21lc3NhZ2UnXSArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJyAgICA8L2Rpdj4nO1xuXG4gICAgICAgICAgICAgICAgICAgICAgICAkKCcjbWFpbkNvbnRhaW5lcicpLnByZXBlbmQoaHRtbCk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIHdpbmRvdy5zZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKFwiLmFsZXJ0XCIpLmZhZGVUbyg1MDAsIDApLnNsaWRlVXAoNTAwLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICQodGhpcykucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9LCA0MDAwKTtcbiAgICAgICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICAgICAgZXJyb3I6IGZ1bmN0aW9uIChlcnIpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciBodG1sID0gJzxkaXYgY2xhc3M9XCJhbGVydCBhbGVydC1kYW5nZXJcIiByb2xlPVwiYWxlcnRcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImNsb3NlXCIgZGF0YS1kaXNtaXNzPVwiYWxlcnRcIiBhcmlhLWxhYmVsPVwiQ2xvc2VcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICAgICAgPHNwYW4gYXJpYS1oaWRkZW49XCJ0cnVlXCI+JnRpbWVzOzwvc3Bhbj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8L2J1dHRvbj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnJyArIGVyclsncmVzcG9uc2VKU09OJ11bJ21lc3NhZ2UnXSArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJyAgICA8L2Rpdj4nO1xuICAgICAgICAgICAgICAgICAgICAgICAgJCgnI21haW5Db250YWluZXInKS5wcmVwZW5kKGh0bWwpO1xuXG4gICAgICAgICAgICAgICAgICAgICAgICB3aW5kb3cuc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJChcIi5hbGVydFwiKS5mYWRlVG8oNTAwLCAwKS5zbGlkZVVwKDUwMCwgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLnJlbW92ZSgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICAgICAgfSwgNDAwMCk7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgICAgICAgIHZhciBodG1sID0gJzxkaXYgY2xhc3M9XCJhbGVydCBhbGVydC1kYW5nZXJcIiByb2xlPVwiYWxlcnRcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjbG9zZVwiIGRhdGEtZGlzbWlzcz1cImFsZXJ0XCIgYXJpYS1sYWJlbD1cIkNsb3NlXCI+JyArXG4gICAgICAgICAgICAgICAgICAgICcgICAgICAgICAgICA8c3BhbiBhcmlhLWhpZGRlbj1cInRydWVcIj4mdGltZXM7PC9zcGFuPicgK1xuICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8L2J1dHRvbj4nICtcbiAgICAgICAgICAgICAgICAgICAgJyBPb3BzISBTb21ldGhpbmcgd2VudCB3cm9uZyBvbiBvdXIgZW5kLicgK1xuICAgICAgICAgICAgICAgICAgICAnICAgIDwvZGl2Pic7XG4gICAgICAgICAgICAgICAgJCgnI21haW5Db250YWluZXInKS5wcmVwZW5kKGh0bWwpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfSk7XG59KTtcbiJdLCJzb3VyY2VSb290IjoiIn0=