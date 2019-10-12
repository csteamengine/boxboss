(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/backend/boxes/manage"],{

/***/ "./resources/js/backend/boxes/manage.js":
/*!**********************************************!*\
  !*** ./resources/js/backend/boxes/manage.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

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
  }); // var reset = false;
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

/***/ }),

/***/ 3:
/*!****************************************************!*\
  !*** multi ./resources/js/backend/boxes/manage.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/gregorysteenhagen/Desktop/Projects/wodboss/resources/js/backend/boxes/manage.js */"./resources/js/backend/boxes/manage.js");


/***/ })

},[[3,"/js/manifest"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYmFja2VuZC9ib3hlcy9tYW5hZ2UuanMiXSwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCJEYXRhVGFibGUiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUFBQSxDQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQVk7QUFDMUJGLEdBQUMsQ0FBQyxlQUFELENBQUQsQ0FBbUJHLFNBQW5CLENBQTZCO0FBQ3pCLGdCQUFZO0FBQ1Isb0JBQWM7QUFETjtBQURhLEdBQTdCO0FBS0FILEdBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJHLFNBQWpCLENBQTJCO0FBQ3ZCLGdCQUFZO0FBQ1Isb0JBQWM7QUFETjtBQURXLEdBQTNCO0FBS0FILEdBQUMsQ0FBQyxlQUFELENBQUQsQ0FBbUJHLFNBQW5CLENBQTZCO0FBQ3pCLGdCQUFZO0FBQ1Isb0JBQWM7QUFETjtBQURhLEdBQTdCO0FBS0FILEdBQUMsQ0FBQyxrQkFBRCxDQUFELENBQXNCRyxTQUF0QixDQUFnQztBQUM1QixnQkFBWTtBQUNSLG9CQUFjO0FBRE47QUFEZ0IsR0FBaEMsRUFoQjBCLENBcUIxQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNILENBckZELEUiLCJmaWxlIjoiL2pzL2JhY2tlbmQvYm94ZXMvbWFuYWdlLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xuICAgICQoJyNtZW1iZXJzVGFibGUnKS5EYXRhVGFibGUoe1xuICAgICAgICBcImxhbmd1YWdlXCI6IHtcbiAgICAgICAgICAgIFwiZW1wdHlUYWJsZVwiOiBcIllvdXIgQm94IGRvZXNuJ3QgaGF2ZSBhbnkgbWVtYmVycyB5ZXQuXCJcbiAgICAgICAgfVxuICAgIH0pO1xuICAgICQoJyNzdGFmZlRhYmxlJykuRGF0YVRhYmxlKHtcbiAgICAgICAgXCJsYW5ndWFnZVwiOiB7XG4gICAgICAgICAgICBcImVtcHR5VGFibGVcIjogXCJZb3VyIEJveCBkb2Vzbid0IGhhdmUgYW55IHN0YWZmIHlldC5cIlxuICAgICAgICB9XG4gICAgfSk7XG4gICAgJCgnI2ludml0ZXNUYWJsZScpLkRhdGFUYWJsZSh7XG4gICAgICAgIFwibGFuZ3VhZ2VcIjoge1xuICAgICAgICAgICAgXCJlbXB0eVRhYmxlXCI6IFwiWW91IGRvbid0IGhhdmUgYW55IGFjdGl2ZSBpbnZpdGVzIGF0IHRoZSBtb21lbnQuXCJcbiAgICAgICAgfVxuICAgIH0pO1xuICAgICQoJyNtZW1iZXJzaGlwVGFibGUnKS5EYXRhVGFibGUoe1xuICAgICAgICBcImxhbmd1YWdlXCI6IHtcbiAgICAgICAgICAgIFwiZW1wdHlUYWJsZVwiOiBcIllvdSBkb24ndCBoYXZlIGFueSBhY3RpdmUgbWVtYmVyc2hpcCByZXF1ZXN0cyBhdCB0aGUgbW9tZW50LlwiXG4gICAgICAgIH1cbiAgICB9KTtcbiAgICAvLyB2YXIgcmVzZXQgPSBmYWxzZTtcbiAgICAvLyAkKCcuc3dpdGNoLWlucHV0Jykub24oJ2NsaWNrJywgZnVuY3Rpb24gKGV2ZW50KSB7XG4gICAgLy8gICAgIGlmIChyZXNldCkge1xuICAgIC8vICAgICAgICAgcmVzZXQgPSBmYWxzZTtcbiAgICAvLyAgICAgfSBlbHNlIHtcbiAgICAvLyAgICAgICAgIGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG4gICAgLy8gICAgICAgICB0cnkge1xuICAgIC8vICAgICAgICAgICAgIHZhciByb3V0ZSA9ICQodGhpcykuZGF0YSgndXJsJyk7XG4gICAgLy8gICAgICAgICAgICAgdmFyIGNzcmZfdG9rZW4gPSAkKCcjYm94VGFibGVDU1JGJykudmFsKCk7XG4gICAgLy9cbiAgICAvLyAgICAgICAgICAgICB2YXIgYnV0dG9uID0gJCh0aGlzKTtcbiAgICAvLyAgICAgICAgICAgICAkLmFqYXgoe1xuICAgIC8vICAgICAgICAgICAgICAgICAvKiB0aGUgcm91dGUgcG9pbnRpbmcgdG8gdGhlIHBvc3QgZnVuY3Rpb24gKi9cbiAgICAvLyAgICAgICAgICAgICAgICAgdXJsOiByb3V0ZSxcbiAgICAvLyAgICAgICAgICAgICAgICAgdHlwZTogJ1BPU1QnLFxuICAgIC8vICAgICAgICAgICAgICAgICAvKiBzZW5kIHRoZSBjc3JmLXRva2VuIGFuZCB0aGUgaW5wdXQgdG8gdGhlIGNvbnRyb2xsZXIgKi9cbiAgICAvLyAgICAgICAgICAgICAgICAgZGF0YToge190b2tlbjogY3NyZl90b2tlbn0sXG4gICAgLy8gICAgICAgICAgICAgICAgIGRhdGFUeXBlOiAnSlNPTicsXG4gICAgLy8gICAgICAgICAgICAgICAgIC8qIHJlbWluZCB0aGF0ICdkYXRhJyBpcyB0aGUgcmVzcG9uc2Ugb2YgdGhlIEFqYXhDb250cm9sbGVyICovXG4gICAgLy8gICAgICAgICAgICAgICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uIChkYXRhKSB7XG4gICAgLy8gICAgICAgICAgICAgICAgICAgICByZXNldCA9IHRydWU7XG4gICAgLy8gICAgICAgICAgICAgICAgICAgICBidXR0b24uY2xpY2soKTtcbiAgICAvLyAgICAgICAgICAgICAgICAgICAgIHZhciBodG1sID0gJzxkaXYgY2xhc3M9XCJhbGVydCBhbGVydC1zdWNjZXNzXCIgcm9sZT1cImFsZXJ0XCI+JyArXG4gICAgLy8gICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjbG9zZVwiIGRhdGEtZGlzbWlzcz1cImFsZXJ0XCIgYXJpYS1sYWJlbD1cIkNsb3NlXCI+JyArXG4gICAgLy8gICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgICAgIDxzcGFuIGFyaWEtaGlkZGVuPVwidHJ1ZVwiPiZ0aW1lczs8L3NwYW4+JyArXG4gICAgLy8gICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgPC9idXR0b24+JyArXG4gICAgLy8gICAgICAgICAgICAgICAgICAgICAgICAgJycgKyBkYXRhWydtZXNzYWdlJ10gK1xuICAgIC8vICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgPC9kaXY+JztcbiAgICAvL1xuICAgIC8vICAgICAgICAgICAgICAgICAgICAgJCgnI21haW5Db250YWluZXInKS5wcmVwZW5kKGh0bWwpO1xuICAgIC8vXG4gICAgLy8gICAgICAgICAgICAgICAgICAgICB3aW5kb3cuc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgLy8gICAgICAgICAgICAgICAgICAgICAgICAgJChcIi5hbGVydFwiKS5mYWRlVG8oNTAwLCAwKS5zbGlkZVVwKDUwMCwgZnVuY3Rpb24gKCkge1xuICAgIC8vICAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLnJlbW92ZSgpO1xuICAgIC8vICAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgIC8vICAgICAgICAgICAgICAgICAgICAgfSwgNDAwMCk7XG4gICAgLy8gICAgICAgICAgICAgICAgIH0sXG4gICAgLy8gICAgICAgICAgICAgICAgIGVycm9yOiBmdW5jdGlvbiAoZXJyKSB7XG4gICAgLy8gICAgICAgICAgICAgICAgICAgICB2YXIgaHRtbCA9ICc8ZGl2IGNsYXNzPVwiYWxlcnQgYWxlcnQtZGFuZ2VyXCIgcm9sZT1cImFsZXJ0XCI+JyArXG4gICAgLy8gICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjbG9zZVwiIGRhdGEtZGlzbWlzcz1cImFsZXJ0XCIgYXJpYS1sYWJlbD1cIkNsb3NlXCI+JyArXG4gICAgLy8gICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgICAgIDxzcGFuIGFyaWEtaGlkZGVuPVwidHJ1ZVwiPiZ0aW1lczs8L3NwYW4+JyArXG4gICAgLy8gICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgPC9idXR0b24+JyArXG4gICAgLy8gICAgICAgICAgICAgICAgICAgICAgICAgJycgKyBlcnJbJ3Jlc3BvbnNlSlNPTiddWydtZXNzYWdlJ10gK1xuICAgIC8vICAgICAgICAgICAgICAgICAgICAgICAgICcgICAgPC9kaXY+JztcbiAgICAvLyAgICAgICAgICAgICAgICAgICAgICQoJyNtYWluQ29udGFpbmVyJykucHJlcGVuZChodG1sKTtcbiAgICAvL1xuICAgIC8vICAgICAgICAgICAgICAgICAgICAgd2luZG93LnNldFRpbWVvdXQoZnVuY3Rpb24gKCkge1xuICAgIC8vICAgICAgICAgICAgICAgICAgICAgICAgICQoXCIuYWxlcnRcIikuZmFkZVRvKDUwMCwgMCkuc2xpZGVVcCg1MDAsIGZ1bmN0aW9uICgpIHtcbiAgICAvLyAgICAgICAgICAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5yZW1vdmUoKTtcbiAgICAvLyAgICAgICAgICAgICAgICAgICAgICAgICB9KTtcbiAgICAvLyAgICAgICAgICAgICAgICAgICAgIH0sIDQwMDApO1xuICAgIC8vICAgICAgICAgICAgICAgICB9XG4gICAgLy8gICAgICAgICAgICAgfSk7XG4gICAgLy8gICAgICAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAvLyAgICAgICAgICAgICB2YXIgaHRtbCA9ICc8ZGl2IGNsYXNzPVwiYWxlcnQgYWxlcnQtZGFuZ2VyXCIgcm9sZT1cImFsZXJ0XCI+JyArXG4gICAgLy8gICAgICAgICAgICAgICAgICcgICAgICAgIDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiY2xvc2VcIiBkYXRhLWRpc21pc3M9XCJhbGVydFwiIGFyaWEtbGFiZWw9XCJDbG9zZVwiPicgK1xuICAgIC8vICAgICAgICAgICAgICAgICAnICAgICAgICAgICAgPHNwYW4gYXJpYS1oaWRkZW49XCJ0cnVlXCI+JnRpbWVzOzwvc3Bhbj4nICtcbiAgICAvLyAgICAgICAgICAgICAgICAgJyAgICAgICAgPC9idXR0b24+JyArXG4gICAgLy8gICAgICAgICAgICAgICAgICcgT29wcyEgU29tZXRoaW5nIHdlbnQgd3Jvbmcgb24gb3VyIGVuZC4nICtcbiAgICAvLyAgICAgICAgICAgICAgICAgJyAgICA8L2Rpdj4nO1xuICAgIC8vICAgICAgICAgICAgICQoJyNtYWluQ29udGFpbmVyJykucHJlcGVuZChodG1sKTtcbiAgICAvLyAgICAgICAgIH1cbiAgICAvLyAgICAgfVxuICAgIC8vIH0pO1xufSk7XG4iXSwic291cmNlUm9vdCI6IiJ9