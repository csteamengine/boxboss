(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/backend/boxes/boxes"],{

/***/ "./resources/js/backend/boxes/boxes.js":
/*!*********************************************!*\
  !*** ./resources/js/backend/boxes/boxes.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('#boxesTable').DataTable();
  var reset = false;
  $('.switch-input').on('click', function (event) {
    if (reset) {
      reset = false;
    } else {
      event.preventDefault();

      try {
        var route = $(this).data('url');
        var csrf_token = $('#boxTableCSRF').val();
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

/***/ 2:
/*!***************************************************!*\
  !*** multi ./resources/js/backend/boxes/boxes.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/gregorysteenhagen/Desktop/Projects/wodboss/resources/js/backend/boxes/boxes.js */"./resources/js/backend/boxes/boxes.js");


/***/ })

},[[2,"/js/manifest"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYmFja2VuZC9ib3hlcy9ib3hlcy5qcyJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIkRhdGFUYWJsZSIsInJlc2V0Iiwib24iLCJldmVudCIsInByZXZlbnREZWZhdWx0Iiwicm91dGUiLCJkYXRhIiwiY3NyZl90b2tlbiIsInZhbCIsImJ1dHRvbiIsImFqYXgiLCJ1cmwiLCJ0eXBlIiwiX3Rva2VuIiwiZGF0YVR5cGUiLCJzdWNjZXNzIiwiY2xpY2siLCJodG1sIiwicHJlcGVuZCIsIndpbmRvdyIsInNldFRpbWVvdXQiLCJmYWRlVG8iLCJzbGlkZVVwIiwicmVtb3ZlIiwiZXJyb3IiLCJlcnIiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUFBQSxDQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVc7QUFDekJGLEdBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJHLFNBQWpCO0FBQ0EsTUFBSUMsS0FBSyxHQUFHLEtBQVo7QUFDQUosR0FBQyxDQUFDLGVBQUQsQ0FBRCxDQUFtQkssRUFBbkIsQ0FBc0IsT0FBdEIsRUFBK0IsVUFBU0MsS0FBVCxFQUFnQjtBQUMzQyxRQUFHRixLQUFILEVBQVM7QUFDTEEsV0FBSyxHQUFHLEtBQVI7QUFDSCxLQUZELE1BRUs7QUFDREUsV0FBSyxDQUFDQyxjQUFOOztBQUNBLFVBQUk7QUFDQSxZQUFJQyxLQUFLLEdBQUdSLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVMsSUFBUixDQUFhLEtBQWIsQ0FBWjtBQUNBLFlBQUlDLFVBQVUsR0FBR1YsQ0FBQyxDQUFDLGVBQUQsQ0FBRCxDQUFtQlcsR0FBbkIsRUFBakI7QUFFQSxZQUFJQyxNQUFNLEdBQUdaLENBQUMsQ0FBQyxJQUFELENBQWQ7QUFDQUEsU0FBQyxDQUFDYSxJQUFGLENBQU87QUFDSDtBQUNBQyxhQUFHLEVBQUVOLEtBRkY7QUFHSE8sY0FBSSxFQUFFLE1BSEg7O0FBSUg7QUFDQU4sY0FBSSxFQUFFO0FBQUNPLGtCQUFNLEVBQUVOO0FBQVQsV0FMSDtBQU1ITyxrQkFBUSxFQUFFLE1BTlA7O0FBT0g7QUFDQUMsaUJBQU8sRUFBRSxpQkFBVVQsSUFBVixFQUFnQjtBQUNyQkwsaUJBQUssR0FBRyxJQUFSO0FBQ0FRLGtCQUFNLENBQUNPLEtBQVA7QUFDQSxnQkFBSUMsSUFBSSxHQUFHLG1EQUNQLHNGQURPLEdBRVAscURBRk8sR0FHUCxtQkFITyxHQUlQLEVBSk8sR0FJRlgsSUFBSSxDQUFDLFNBQUQsQ0FKRixHQUtQLFlBTEo7QUFPQVQsYUFBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0JxQixPQUFwQixDQUE0QkQsSUFBNUI7QUFFQUUsa0JBQU0sQ0FBQ0MsVUFBUCxDQUFrQixZQUFZO0FBQzFCdkIsZUFBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZd0IsTUFBWixDQUFtQixHQUFuQixFQUF3QixDQUF4QixFQUEyQkMsT0FBM0IsQ0FBbUMsR0FBbkMsRUFBd0MsWUFBWTtBQUNoRHpCLGlCQUFDLENBQUMsSUFBRCxDQUFELENBQVEwQixNQUFSO0FBQ0gsZUFGRDtBQUdILGFBSkQsRUFJRyxJQUpIO0FBS0gsV0F6QkU7QUEwQkhDLGVBQUssRUFBRSxlQUFVQyxHQUFWLEVBQWU7QUFDbEIsZ0JBQUlSLElBQUksR0FBRyxrREFDUCxzRkFETyxHQUVQLHFEQUZPLEdBR1AsbUJBSE8sR0FJUCxFQUpPLEdBSUZRLEdBQUcsQ0FBQyxjQUFELENBQUgsQ0FBb0IsU0FBcEIsQ0FKRSxHQUtQLFlBTEo7QUFNQTVCLGFBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CcUIsT0FBcEIsQ0FBNEJELElBQTVCO0FBRUFFLGtCQUFNLENBQUNDLFVBQVAsQ0FBa0IsWUFBWTtBQUMxQnZCLGVBQUMsQ0FBQyxRQUFELENBQUQsQ0FBWXdCLE1BQVosQ0FBbUIsR0FBbkIsRUFBd0IsQ0FBeEIsRUFBMkJDLE9BQTNCLENBQW1DLEdBQW5DLEVBQXdDLFlBQVk7QUFDaER6QixpQkFBQyxDQUFDLElBQUQsQ0FBRCxDQUFRMEIsTUFBUjtBQUNILGVBRkQ7QUFHSCxhQUpELEVBSUcsSUFKSDtBQUtIO0FBeENFLFNBQVA7QUEwQ0gsT0EvQ0QsQ0ErQ0UsT0FBT0UsR0FBUCxFQUFZO0FBQ1YsWUFBSVIsSUFBSSxHQUFHLGtEQUNQLHNGQURPLEdBRVAscURBRk8sR0FHUCxtQkFITyxHQUlQLHlDQUpPLEdBS1AsWUFMSjtBQU1BcEIsU0FBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0JxQixPQUFwQixDQUE0QkQsSUFBNUI7QUFDSDtBQUNKO0FBQ0osR0E5REQ7QUErREgsQ0FsRUQsRSIsImZpbGUiOiIvanMvYmFja2VuZC9ib3hlcy9ib3hlcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgICQoJyNib3hlc1RhYmxlJykuRGF0YVRhYmxlKCk7XG4gICAgdmFyIHJlc2V0ID0gZmFsc2U7XG4gICAgJCgnLnN3aXRjaC1pbnB1dCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uKGV2ZW50KSB7XG4gICAgICAgIGlmKHJlc2V0KXtcbiAgICAgICAgICAgIHJlc2V0ID0gZmFsc2U7XG4gICAgICAgIH1lbHNle1xuICAgICAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgIHRyeSB7XG4gICAgICAgICAgICAgICAgdmFyIHJvdXRlID0gJCh0aGlzKS5kYXRhKCd1cmwnKTtcbiAgICAgICAgICAgICAgICB2YXIgY3NyZl90b2tlbiA9ICQoJyNib3hUYWJsZUNTUkYnKS52YWwoKTtcblxuICAgICAgICAgICAgICAgIHZhciBidXR0b24gPSAkKHRoaXMpO1xuICAgICAgICAgICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICAgICAgICAgIC8qIHRoZSByb3V0ZSBwb2ludGluZyB0byB0aGUgcG9zdCBmdW5jdGlvbiAqL1xuICAgICAgICAgICAgICAgICAgICB1cmw6IHJvdXRlLFxuICAgICAgICAgICAgICAgICAgICB0eXBlOiAnUE9TVCcsXG4gICAgICAgICAgICAgICAgICAgIC8qIHNlbmQgdGhlIGNzcmYtdG9rZW4gYW5kIHRoZSBpbnB1dCB0byB0aGUgY29udHJvbGxlciAqL1xuICAgICAgICAgICAgICAgICAgICBkYXRhOiB7X3Rva2VuOiBjc3JmX3Rva2VufSxcbiAgICAgICAgICAgICAgICAgICAgZGF0YVR5cGU6ICdKU09OJyxcbiAgICAgICAgICAgICAgICAgICAgLyogcmVtaW5kIHRoYXQgJ2RhdGEnIGlzIHRoZSByZXNwb25zZSBvZiB0aGUgQWpheENvbnRyb2xsZXIgKi9cbiAgICAgICAgICAgICAgICAgICAgc3VjY2VzczogZnVuY3Rpb24gKGRhdGEpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHJlc2V0ID0gdHJ1ZTtcbiAgICAgICAgICAgICAgICAgICAgICAgIGJ1dHRvbi5jbGljaygpO1xuICAgICAgICAgICAgICAgICAgICAgICAgdmFyIGh0bWwgPSAnPGRpdiBjbGFzcz1cImFsZXJ0IGFsZXJ0LXN1Y2Nlc3NcIiByb2xlPVwiYWxlcnRcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImNsb3NlXCIgZGF0YS1kaXNtaXNzPVwiYWxlcnRcIiBhcmlhLWxhYmVsPVwiQ2xvc2VcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICAgICAgPHNwYW4gYXJpYS1oaWRkZW49XCJ0cnVlXCI+JnRpbWVzOzwvc3Bhbj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8L2J1dHRvbj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnJyArIGRhdGFbJ21lc3NhZ2UnXSArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJyAgICA8L2Rpdj4nO1xuXG4gICAgICAgICAgICAgICAgICAgICAgICAkKCcjbWFpbkNvbnRhaW5lcicpLnByZXBlbmQoaHRtbCk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIHdpbmRvdy5zZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKFwiLmFsZXJ0XCIpLmZhZGVUbyg1MDAsIDApLnNsaWRlVXAoNTAwLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICQodGhpcykucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9LCA0MDAwKTtcbiAgICAgICAgICAgICAgICAgICAgfSxcbiAgICAgICAgICAgICAgICAgICAgZXJyb3I6IGZ1bmN0aW9uIChlcnIpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgIHZhciBodG1sID0gJzxkaXYgY2xhc3M9XCJhbGVydCBhbGVydC1kYW5nZXJcIiByb2xlPVwiYWxlcnRcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImNsb3NlXCIgZGF0YS1kaXNtaXNzPVwiYWxlcnRcIiBhcmlhLWxhYmVsPVwiQ2xvc2VcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICAgICAgPHNwYW4gYXJpYS1oaWRkZW49XCJ0cnVlXCI+JnRpbWVzOzwvc3Bhbj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8L2J1dHRvbj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnJyArIGVyclsncmVzcG9uc2VKU09OJ11bJ21lc3NhZ2UnXSArXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJyAgICA8L2Rpdj4nO1xuICAgICAgICAgICAgICAgICAgICAgICAgJCgnI21haW5Db250YWluZXInKS5wcmVwZW5kKGh0bWwpO1xuXG4gICAgICAgICAgICAgICAgICAgICAgICB3aW5kb3cuc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJChcIi5hbGVydFwiKS5mYWRlVG8oNTAwLCAwKS5zbGlkZVVwKDUwMCwgZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLnJlbW92ZSgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICAgICAgfSwgNDAwMCk7XG4gICAgICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgIH0gY2F0Y2ggKGVycikge1xuICAgICAgICAgICAgICAgIHZhciBodG1sID0gJzxkaXYgY2xhc3M9XCJhbGVydCBhbGVydC1kYW5nZXJcIiByb2xlPVwiYWxlcnRcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjbG9zZVwiIGRhdGEtZGlzbWlzcz1cImFsZXJ0XCIgYXJpYS1sYWJlbD1cIkNsb3NlXCI+JyArXG4gICAgICAgICAgICAgICAgICAgICcgICAgICAgICAgICA8c3BhbiBhcmlhLWhpZGRlbj1cInRydWVcIj4mdGltZXM7PC9zcGFuPicgK1xuICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8L2J1dHRvbj4nICtcbiAgICAgICAgICAgICAgICAgICAgJyBPb3BzISBTb21ldGhpbmcgd2VudCB3cm9uZyBvbiBvdXIgZW5kLicgK1xuICAgICAgICAgICAgICAgICAgICAnICAgIDwvZGl2Pic7XG4gICAgICAgICAgICAgICAgJCgnI21haW5Db250YWluZXInKS5wcmVwZW5kKGh0bWwpO1xuICAgICAgICAgICAgfVxuICAgICAgICB9XG4gICAgfSk7XG59KTtcbiJdLCJzb3VyY2VSb290IjoiIn0=