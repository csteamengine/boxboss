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
        console.log(csrf_token);
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYmFja2VuZC9mZWF0dXJlcy9mZWF0dXJlcy5qcyJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIkRhdGFUYWJsZSIsInJlc2V0Iiwib24iLCJldmVudCIsInByZXZlbnREZWZhdWx0Iiwicm91dGUiLCJkYXRhIiwiY3NyZl90b2tlbiIsInZhbCIsImNvbnNvbGUiLCJsb2ciLCJidXR0b24iLCJhamF4IiwidXJsIiwidHlwZSIsIl90b2tlbiIsImRhdGFUeXBlIiwic3VjY2VzcyIsImNsaWNrIiwiaHRtbCIsInByZXBlbmQiLCJ3aW5kb3ciLCJzZXRUaW1lb3V0IiwiZmFkZVRvIiwic2xpZGVVcCIsInJlbW92ZSIsImVycm9yIiwiZXJyIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7QUFBQUEsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFXO0FBQ3pCRixHQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQkcsU0FBcEI7QUFDQSxNQUFJQyxLQUFLLEdBQUcsS0FBWjtBQUNBSixHQUFDLENBQUMsZUFBRCxDQUFELENBQW1CSyxFQUFuQixDQUFzQixPQUF0QixFQUErQixVQUFTQyxLQUFULEVBQWdCO0FBQzNDLFFBQUdGLEtBQUgsRUFBUztBQUNMQSxXQUFLLEdBQUcsS0FBUjtBQUNILEtBRkQsTUFFSztBQUNERSxXQUFLLENBQUNDLGNBQU47O0FBQ0EsVUFBSTtBQUNBLFlBQUlDLEtBQUssR0FBR1IsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRUyxJQUFSLENBQWEsS0FBYixDQUFaO0FBQ0EsWUFBSUMsVUFBVSxHQUFHVixDQUFDLENBQUMsbUJBQUQsQ0FBRCxDQUF1QlcsR0FBdkIsRUFBakI7QUFDQUMsZUFBTyxDQUFDQyxHQUFSLENBQVlILFVBQVo7QUFDQSxZQUFJSSxNQUFNLEdBQUdkLENBQUMsQ0FBQyxJQUFELENBQWQ7QUFDQUEsU0FBQyxDQUFDZSxJQUFGLENBQU87QUFDSDtBQUNBQyxhQUFHLEVBQUVSLEtBRkY7QUFHSFMsY0FBSSxFQUFFLE1BSEg7O0FBSUg7QUFDQVIsY0FBSSxFQUFFO0FBQUNTLGtCQUFNLEVBQUVSO0FBQVQsV0FMSDtBQU1IUyxrQkFBUSxFQUFFLE1BTlA7O0FBT0g7QUFDQUMsaUJBQU8sRUFBRSxpQkFBVVgsSUFBVixFQUFnQjtBQUNyQkwsaUJBQUssR0FBRyxJQUFSO0FBQ0FVLGtCQUFNLENBQUNPLEtBQVA7QUFDQSxnQkFBSUMsSUFBSSxHQUFHLG1EQUNQLHNGQURPLEdBRVAscURBRk8sR0FHUCxtQkFITyxHQUlQLEVBSk8sR0FJRmIsSUFBSSxDQUFDLFNBQUQsQ0FKRixHQUtQLFlBTEo7QUFPQVQsYUFBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0J1QixPQUFwQixDQUE0QkQsSUFBNUI7QUFFQUUsa0JBQU0sQ0FBQ0MsVUFBUCxDQUFrQixZQUFZO0FBQzFCekIsZUFBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZMEIsTUFBWixDQUFtQixHQUFuQixFQUF3QixDQUF4QixFQUEyQkMsT0FBM0IsQ0FBbUMsR0FBbkMsRUFBd0MsWUFBWTtBQUNoRDNCLGlCQUFDLENBQUMsSUFBRCxDQUFELENBQVE0QixNQUFSO0FBQ0gsZUFGRDtBQUdILGFBSkQsRUFJRyxJQUpIO0FBS0gsV0F6QkU7QUEwQkhDLGVBQUssRUFBRSxlQUFVQyxHQUFWLEVBQWU7QUFDbEIsZ0JBQUlSLElBQUksR0FBRyxrREFDUCxzRkFETyxHQUVQLHFEQUZPLEdBR1AsbUJBSE8sR0FJUCxFQUpPLEdBSUZRLEdBQUcsQ0FBQyxjQUFELENBQUgsQ0FBb0IsU0FBcEIsQ0FKRSxHQUtQLFlBTEo7QUFNQTlCLGFBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CdUIsT0FBcEIsQ0FBNEJELElBQTVCO0FBRUFFLGtCQUFNLENBQUNDLFVBQVAsQ0FBa0IsWUFBWTtBQUMxQnpCLGVBQUMsQ0FBQyxRQUFELENBQUQsQ0FBWTBCLE1BQVosQ0FBbUIsR0FBbkIsRUFBd0IsQ0FBeEIsRUFBMkJDLE9BQTNCLENBQW1DLEdBQW5DLEVBQXdDLFlBQVk7QUFDaEQzQixpQkFBQyxDQUFDLElBQUQsQ0FBRCxDQUFRNEIsTUFBUjtBQUNILGVBRkQ7QUFHSCxhQUpELEVBSUcsSUFKSDtBQUtIO0FBeENFLFNBQVA7QUEwQ0gsT0EvQ0QsQ0ErQ0UsT0FBT0UsR0FBUCxFQUFZO0FBQ1YsWUFBSVIsSUFBSSxHQUFHLGtEQUNQLHNGQURPLEdBRVAscURBRk8sR0FHUCxtQkFITyxHQUlQLHlDQUpPLEdBS1AsWUFMSjtBQU1BdEIsU0FBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0J1QixPQUFwQixDQUE0QkQsSUFBNUI7QUFDSDtBQUNKO0FBQ0osR0E5REQ7QUErREgsQ0FsRUQsRSIsImZpbGUiOiIvanMvYmFja2VuZC9mZWF0dXJlcy9mZWF0dXJlcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCkge1xuICAgICQoJyNmZWF0dXJlc1RhYmxlJykuRGF0YVRhYmxlKCk7XG4gICAgdmFyIHJlc2V0ID0gZmFsc2U7XG4gICAgJCgnLnN3aXRjaC1pbnB1dCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uKGV2ZW50KSB7XG4gICAgICAgIGlmKHJlc2V0KXtcbiAgICAgICAgICAgIHJlc2V0ID0gZmFsc2U7XG4gICAgICAgIH1lbHNle1xuICAgICAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgIHRyeSB7XG4gICAgICAgICAgICAgICAgdmFyIHJvdXRlID0gJCh0aGlzKS5kYXRhKCd1cmwnKTtcbiAgICAgICAgICAgICAgICB2YXIgY3NyZl90b2tlbiA9ICQoJyNmZWF0dXJlVGFibGVDU1JGJykudmFsKCk7XG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coY3NyZl90b2tlbik7XG4gICAgICAgICAgICAgICAgdmFyIGJ1dHRvbiA9ICQodGhpcyk7XG4gICAgICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICAgICAgLyogdGhlIHJvdXRlIHBvaW50aW5nIHRvIHRoZSBwb3N0IGZ1bmN0aW9uICovXG4gICAgICAgICAgICAgICAgICAgIHVybDogcm91dGUsXG4gICAgICAgICAgICAgICAgICAgIHR5cGU6ICdQT1NUJyxcbiAgICAgICAgICAgICAgICAgICAgLyogc2VuZCB0aGUgY3NyZi10b2tlbiBhbmQgdGhlIGlucHV0IHRvIHRoZSBjb250cm9sbGVyICovXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IHtfdG9rZW46IGNzcmZfdG9rZW59LFxuICAgICAgICAgICAgICAgICAgICBkYXRhVHlwZTogJ0pTT04nLFxuICAgICAgICAgICAgICAgICAgICAvKiByZW1pbmQgdGhhdCAnZGF0YScgaXMgdGhlIHJlc3BvbnNlIG9mIHRoZSBBamF4Q29udHJvbGxlciAqL1xuICAgICAgICAgICAgICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgcmVzZXQgPSB0cnVlO1xuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uLmNsaWNrKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICB2YXIgaHRtbCA9ICc8ZGl2IGNsYXNzPVwiYWxlcnQgYWxlcnQtc3VjY2Vzc1wiIHJvbGU9XCJhbGVydFwiPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgIDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiY2xvc2VcIiBkYXRhLWRpc21pc3M9XCJhbGVydFwiIGFyaWEtbGFiZWw9XCJDbG9zZVwiPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgICAgICA8c3BhbiBhcmlhLWhpZGRlbj1cInRydWVcIj4mdGltZXM7PC9zcGFuPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgIDwvYnV0dG9uPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcnICsgZGF0YVsnbWVzc2FnZSddICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgIDwvZGl2Pic7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgICQoJyNtYWluQ29udGFpbmVyJykucHJlcGVuZChodG1sKTtcblxuICAgICAgICAgICAgICAgICAgICAgICAgd2luZG93LnNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICQoXCIuYWxlcnRcIikuZmFkZVRvKDUwMCwgMCkuc2xpZGVVcCg1MDAsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5yZW1vdmUoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH0sIDQwMDApO1xuICAgICAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgICAgICBlcnJvcjogZnVuY3Rpb24gKGVycikge1xuICAgICAgICAgICAgICAgICAgICAgICAgdmFyIGh0bWwgPSAnPGRpdiBjbGFzcz1cImFsZXJ0IGFsZXJ0LWRhbmdlclwiIHJvbGU9XCJhbGVydFwiPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgIDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiY2xvc2VcIiBkYXRhLWRpc21pc3M9XCJhbGVydFwiIGFyaWEtbGFiZWw9XCJDbG9zZVwiPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgICAgICA8c3BhbiBhcmlhLWhpZGRlbj1cInRydWVcIj4mdGltZXM7PC9zcGFuPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgIDwvYnV0dG9uPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcnICsgZXJyWydyZXNwb25zZUpTT04nXVsnbWVzc2FnZSddICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgIDwvZGl2Pic7XG4gICAgICAgICAgICAgICAgICAgICAgICAkKCcjbWFpbkNvbnRhaW5lcicpLnByZXBlbmQoaHRtbCk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIHdpbmRvdy5zZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKFwiLmFsZXJ0XCIpLmZhZGVUbyg1MDAsIDApLnNsaWRlVXAoNTAwLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICQodGhpcykucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9LCA0MDAwKTtcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfSBjYXRjaCAoZXJyKSB7XG4gICAgICAgICAgICAgICAgdmFyIGh0bWwgPSAnPGRpdiBjbGFzcz1cImFsZXJ0IGFsZXJ0LWRhbmdlclwiIHJvbGU9XCJhbGVydFwiPicgK1xuICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImNsb3NlXCIgZGF0YS1kaXNtaXNzPVwiYWxlcnRcIiBhcmlhLWxhYmVsPVwiQ2xvc2VcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgICAgIDxzcGFuIGFyaWEtaGlkZGVuPVwidHJ1ZVwiPiZ0aW1lczs8L3NwYW4+JyArXG4gICAgICAgICAgICAgICAgICAgICcgICAgICAgIDwvYnV0dG9uPicgK1xuICAgICAgICAgICAgICAgICAgICAnIE9vcHMhIFNvbWV0aGluZyB3ZW50IHdyb25nIG9uIG91ciBlbmQuJyArXG4gICAgICAgICAgICAgICAgICAgICcgICAgPC9kaXY+JztcbiAgICAgICAgICAgICAgICAkKCcjbWFpbkNvbnRhaW5lcicpLnByZXBlbmQoaHRtbCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9KTtcbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==