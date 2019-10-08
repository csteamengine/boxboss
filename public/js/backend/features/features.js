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
  $('.custom-control-input').on('click', function (event) {
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
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYmFja2VuZC9mZWF0dXJlcy9mZWF0dXJlcy5qcyJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIkRhdGFUYWJsZSIsInJlc2V0Iiwib24iLCJldmVudCIsInByZXZlbnREZWZhdWx0Iiwicm91dGUiLCJkYXRhIiwiY3NyZl90b2tlbiIsInZhbCIsImNvbnNvbGUiLCJsb2ciLCJidXR0b24iLCJhamF4IiwidXJsIiwidHlwZSIsIl90b2tlbiIsImRhdGFUeXBlIiwic3VjY2VzcyIsImNsaWNrIiwiaHRtbCIsInByZXBlbmQiLCJ3aW5kb3ciLCJzZXRUaW1lb3V0IiwiZmFkZVRvIiwic2xpZGVVcCIsInJlbW92ZSIsImVycm9yIiwiZXJyIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7QUFBQUEsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUFXO0FBQ3pCRixHQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQkcsU0FBcEI7QUFDQSxNQUFJQyxLQUFLLEdBQUcsS0FBWjtBQUNBSixHQUFDLENBQUMsdUJBQUQsQ0FBRCxDQUEyQkssRUFBM0IsQ0FBOEIsT0FBOUIsRUFBdUMsVUFBU0MsS0FBVCxFQUFnQjtBQUNuRCxRQUFHRixLQUFILEVBQVM7QUFDTEEsV0FBSyxHQUFHLEtBQVI7QUFDSCxLQUZELE1BRUs7QUFDREUsV0FBSyxDQUFDQyxjQUFOOztBQUNBLFVBQUk7QUFDQSxZQUFJQyxLQUFLLEdBQUdSLENBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUVMsSUFBUixDQUFhLEtBQWIsQ0FBWjtBQUNBLFlBQUlDLFVBQVUsR0FBR1YsQ0FBQyxDQUFDLG1CQUFELENBQUQsQ0FBdUJXLEdBQXZCLEVBQWpCO0FBQ0FDLGVBQU8sQ0FBQ0MsR0FBUixDQUFZSCxVQUFaO0FBQ0EsWUFBSUksTUFBTSxHQUFHZCxDQUFDLENBQUMsSUFBRCxDQUFkO0FBQ0FBLFNBQUMsQ0FBQ2UsSUFBRixDQUFPO0FBQ0g7QUFDQUMsYUFBRyxFQUFFUixLQUZGO0FBR0hTLGNBQUksRUFBRSxNQUhIOztBQUlIO0FBQ0FSLGNBQUksRUFBRTtBQUFDUyxrQkFBTSxFQUFFUjtBQUFULFdBTEg7QUFNSFMsa0JBQVEsRUFBRSxNQU5QOztBQU9IO0FBQ0FDLGlCQUFPLEVBQUUsaUJBQVVYLElBQVYsRUFBZ0I7QUFDckJMLGlCQUFLLEdBQUcsSUFBUjtBQUNBVSxrQkFBTSxDQUFDTyxLQUFQO0FBQ0EsZ0JBQUlDLElBQUksR0FBRyxtREFDUCxzRkFETyxHQUVQLHFEQUZPLEdBR1AsbUJBSE8sR0FJUCxFQUpPLEdBSUZiLElBQUksQ0FBQyxTQUFELENBSkYsR0FLUCxZQUxKO0FBT0FULGFBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CdUIsT0FBcEIsQ0FBNEJELElBQTVCO0FBRUFFLGtCQUFNLENBQUNDLFVBQVAsQ0FBa0IsWUFBWTtBQUMxQnpCLGVBQUMsQ0FBQyxRQUFELENBQUQsQ0FBWTBCLE1BQVosQ0FBbUIsR0FBbkIsRUFBd0IsQ0FBeEIsRUFBMkJDLE9BQTNCLENBQW1DLEdBQW5DLEVBQXdDLFlBQVk7QUFDaEQzQixpQkFBQyxDQUFDLElBQUQsQ0FBRCxDQUFRNEIsTUFBUjtBQUNILGVBRkQ7QUFHSCxhQUpELEVBSUcsSUFKSDtBQUtILFdBekJFO0FBMEJIQyxlQUFLLEVBQUUsZUFBVUMsR0FBVixFQUFlO0FBQ2xCLGdCQUFJUixJQUFJLEdBQUcsa0RBQ1Asc0ZBRE8sR0FFUCxxREFGTyxHQUdQLG1CQUhPLEdBSVAsRUFKTyxHQUlGUSxHQUFHLENBQUMsY0FBRCxDQUFILENBQW9CLFNBQXBCLENBSkUsR0FLUCxZQUxKO0FBTUE5QixhQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQnVCLE9BQXBCLENBQTRCRCxJQUE1QjtBQUVBRSxrQkFBTSxDQUFDQyxVQUFQLENBQWtCLFlBQVk7QUFDMUJ6QixlQUFDLENBQUMsUUFBRCxDQUFELENBQVkwQixNQUFaLENBQW1CLEdBQW5CLEVBQXdCLENBQXhCLEVBQTJCQyxPQUEzQixDQUFtQyxHQUFuQyxFQUF3QyxZQUFZO0FBQ2hEM0IsaUJBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUTRCLE1BQVI7QUFDSCxlQUZEO0FBR0gsYUFKRCxFQUlHLElBSkg7QUFLSDtBQXhDRSxTQUFQO0FBMENILE9BL0NELENBK0NFLE9BQU9FLEdBQVAsRUFBWTtBQUNWLFlBQUlSLElBQUksR0FBRyxrREFDUCxzRkFETyxHQUVQLHFEQUZPLEdBR1AsbUJBSE8sR0FJUCx5Q0FKTyxHQUtQLFlBTEo7QUFNQXRCLFNBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CdUIsT0FBcEIsQ0FBNEJELElBQTVCO0FBQ0g7QUFDSjtBQUNKLEdBOUREO0FBK0RILENBbEVELEUiLCJmaWxlIjoiL2pzL2JhY2tlbmQvZmVhdHVyZXMvZmVhdHVyZXMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbigpIHtcbiAgICAkKCcjZmVhdHVyZXNUYWJsZScpLkRhdGFUYWJsZSgpO1xuICAgIHZhciByZXNldCA9IGZhbHNlO1xuICAgICQoJy5jdXN0b20tY29udHJvbC1pbnB1dCcpLm9uKCdjbGljaycsIGZ1bmN0aW9uKGV2ZW50KSB7XG4gICAgICAgIGlmKHJlc2V0KXtcbiAgICAgICAgICAgIHJlc2V0ID0gZmFsc2U7XG4gICAgICAgIH1lbHNle1xuICAgICAgICAgICAgZXZlbnQucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgICAgIHRyeSB7XG4gICAgICAgICAgICAgICAgdmFyIHJvdXRlID0gJCh0aGlzKS5kYXRhKCd1cmwnKTtcbiAgICAgICAgICAgICAgICB2YXIgY3NyZl90b2tlbiA9ICQoJyNmZWF0dXJlVGFibGVDU1JGJykudmFsKCk7XG4gICAgICAgICAgICAgICAgY29uc29sZS5sb2coY3NyZl90b2tlbik7XG4gICAgICAgICAgICAgICAgdmFyIGJ1dHRvbiA9ICQodGhpcyk7XG4gICAgICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgICAgICAgLyogdGhlIHJvdXRlIHBvaW50aW5nIHRvIHRoZSBwb3N0IGZ1bmN0aW9uICovXG4gICAgICAgICAgICAgICAgICAgIHVybDogcm91dGUsXG4gICAgICAgICAgICAgICAgICAgIHR5cGU6ICdQT1NUJyxcbiAgICAgICAgICAgICAgICAgICAgLyogc2VuZCB0aGUgY3NyZi10b2tlbiBhbmQgdGhlIGlucHV0IHRvIHRoZSBjb250cm9sbGVyICovXG4gICAgICAgICAgICAgICAgICAgIGRhdGE6IHtfdG9rZW46IGNzcmZfdG9rZW59LFxuICAgICAgICAgICAgICAgICAgICBkYXRhVHlwZTogJ0pTT04nLFxuICAgICAgICAgICAgICAgICAgICAvKiByZW1pbmQgdGhhdCAnZGF0YScgaXMgdGhlIHJlc3BvbnNlIG9mIHRoZSBBamF4Q29udHJvbGxlciAqL1xuICAgICAgICAgICAgICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgICAgICAgICAgcmVzZXQgPSB0cnVlO1xuICAgICAgICAgICAgICAgICAgICAgICAgYnV0dG9uLmNsaWNrKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICB2YXIgaHRtbCA9ICc8ZGl2IGNsYXNzPVwiYWxlcnQgYWxlcnQtc3VjY2Vzc1wiIHJvbGU9XCJhbGVydFwiPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgIDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiY2xvc2VcIiBkYXRhLWRpc21pc3M9XCJhbGVydFwiIGFyaWEtbGFiZWw9XCJDbG9zZVwiPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgICAgICA8c3BhbiBhcmlhLWhpZGRlbj1cInRydWVcIj4mdGltZXM7PC9zcGFuPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgIDwvYnV0dG9uPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcnICsgZGF0YVsnbWVzc2FnZSddICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgIDwvZGl2Pic7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgICQoJyNtYWluQ29udGFpbmVyJykucHJlcGVuZChodG1sKTtcblxuICAgICAgICAgICAgICAgICAgICAgICAgd2luZG93LnNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICQoXCIuYWxlcnRcIikuZmFkZVRvKDUwMCwgMCkuc2xpZGVVcCg1MDAsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5yZW1vdmUoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH0sIDQwMDApO1xuICAgICAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgICAgICBlcnJvcjogZnVuY3Rpb24gKGVycikge1xuICAgICAgICAgICAgICAgICAgICAgICAgdmFyIGh0bWwgPSAnPGRpdiBjbGFzcz1cImFsZXJ0IGFsZXJ0LWRhbmdlclwiIHJvbGU9XCJhbGVydFwiPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgIDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiY2xvc2VcIiBkYXRhLWRpc21pc3M9XCJhbGVydFwiIGFyaWEtbGFiZWw9XCJDbG9zZVwiPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgICAgICA8c3BhbiBhcmlhLWhpZGRlbj1cInRydWVcIj4mdGltZXM7PC9zcGFuPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgIDwvYnV0dG9uPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgICAgICcnICsgZXJyWydyZXNwb25zZUpTT04nXVsnbWVzc2FnZSddICtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAnICAgIDwvZGl2Pic7XG4gICAgICAgICAgICAgICAgICAgICAgICAkKCcjbWFpbkNvbnRhaW5lcicpLnByZXBlbmQoaHRtbCk7XG5cbiAgICAgICAgICAgICAgICAgICAgICAgIHdpbmRvdy5zZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKFwiLmFsZXJ0XCIpLmZhZGVUbyg1MDAsIDApLnNsaWRlVXAoNTAwLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICQodGhpcykucmVtb3ZlKCk7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgICAgICB9LCA0MDAwKTtcbiAgICAgICAgICAgICAgICAgICAgfVxuICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgfSBjYXRjaCAoZXJyKSB7XG4gICAgICAgICAgICAgICAgdmFyIGh0bWwgPSAnPGRpdiBjbGFzcz1cImFsZXJ0IGFsZXJ0LWRhbmdlclwiIHJvbGU9XCJhbGVydFwiPicgK1xuICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImNsb3NlXCIgZGF0YS1kaXNtaXNzPVwiYWxlcnRcIiBhcmlhLWxhYmVsPVwiQ2xvc2VcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgICAgIDxzcGFuIGFyaWEtaGlkZGVuPVwidHJ1ZVwiPiZ0aW1lczs8L3NwYW4+JyArXG4gICAgICAgICAgICAgICAgICAgICcgICAgICAgIDwvYnV0dG9uPicgK1xuICAgICAgICAgICAgICAgICAgICAnIE9vcHMhIFNvbWV0aGluZyB3ZW50IHdyb25nIG9uIG91ciBlbmQuJyArXG4gICAgICAgICAgICAgICAgICAgICcgICAgPC9kaXY+JztcbiAgICAgICAgICAgICAgICAkKCcjbWFpbkNvbnRhaW5lcicpLnByZXBlbmQoaHRtbCk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICB9KTtcbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==