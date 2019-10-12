(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["/js/features/features"], {

    /***/ "./resources/js/backend/features/features.js":
    /*!***************************************************!*\
      !*** ./resources/js/backend/features/boxes.js ***!
      \***************************************************/
    /*! no static exports found */
    /***/ (function (module, exports) {

        $(document).ready(function () {
            $('.custom-control-input').change(function () {
                try {
                    var route = $(this).data('url');
                    var csrf_token = $('#featureTableCSRF').val();
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
            });
        });

        /***/
    }),

    /***/ 1:
    /*!*********************************************************!*\
      !*** multi ./resources/js/backend/features/boxes.js ***!
      \*********************************************************/
    /*! no static exports found */
    /***/ (function (module, exports, __webpack_require__) {

        module.exports = __webpack_require__(/*! /Users/gregorysteenhagen/Desktop/Projects/wodboss/resources/js/backend/features/boxes.js */"./resources/js/backend/features/features.js");


        /***/
    })

}, [[1, "/js/manifest"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYmFja2VuZC9mZWF0dXJlcy9mZWF0dXJlcy5qcyJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsImNoYW5nZSIsInJvdXRlIiwiZGF0YSIsImNzcmZfdG9rZW4iLCJ2YWwiLCJhamF4IiwidXJsIiwidHlwZSIsIl90b2tlbiIsImRhdGFUeXBlIiwic3VjY2VzcyIsImh0bWwiLCJwcmVwZW5kIiwid2luZG93Iiwic2V0VGltZW91dCIsImZhZGVUbyIsInNsaWRlVXAiLCJyZW1vdmUiLCJlcnJvciIsImVyciJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVztBQUN6QkYsR0FBQyxDQUFDLHVCQUFELENBQUQsQ0FBMkJHLE1BQTNCLENBQWtDLFlBQVc7QUFDekMsUUFBSTtBQUNBLFVBQUlDLEtBQUssR0FBR0osQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRSyxJQUFSLENBQWEsS0FBYixDQUFaO0FBQ0EsVUFBSUMsVUFBVSxHQUFHTixDQUFDLENBQUMsbUJBQUQsQ0FBRCxDQUF1Qk8sR0FBdkIsRUFBakI7QUFFQVAsT0FBQyxDQUFDUSxJQUFGLENBQU87QUFDSDtBQUNBQyxXQUFHLEVBQUVMLEtBRkY7QUFHSE0sWUFBSSxFQUFFLE1BSEg7O0FBSUg7QUFDQUwsWUFBSSxFQUFFO0FBQUNNLGdCQUFNLEVBQUVMO0FBQVQsU0FMSDtBQU1ITSxnQkFBUSxFQUFFLE1BTlA7O0FBT0g7QUFDQUMsZUFBTyxFQUFFLGlCQUFVUixJQUFWLEVBQWdCO0FBQ3JCLGNBQUlTLElBQUksR0FBRyxtREFDUCxzRkFETyxHQUVQLHFEQUZPLEdBR1AsbUJBSE8sR0FJUCxFQUpPLEdBSUZULElBQUksQ0FBQyxTQUFELENBSkYsR0FLUCxZQUxKO0FBT0FMLFdBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CZSxPQUFwQixDQUE0QkQsSUFBNUI7QUFFQUUsZ0JBQU0sQ0FBQ0MsVUFBUCxDQUFrQixZQUFZO0FBQzFCakIsYUFBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZa0IsTUFBWixDQUFtQixHQUFuQixFQUF3QixDQUF4QixFQUEyQkMsT0FBM0IsQ0FBbUMsR0FBbkMsRUFBd0MsWUFBWTtBQUNoRG5CLGVBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUW9CLE1BQVI7QUFDSCxhQUZEO0FBR0gsV0FKRCxFQUlHLElBSkg7QUFLSCxTQXZCRTtBQXdCSEMsYUFBSyxFQUFFLGVBQVVDLEdBQVYsRUFBZTtBQUNsQixjQUFJUixJQUFJLEdBQUcsa0RBQ1Asc0ZBRE8sR0FFUCxxREFGTyxHQUdQLG1CQUhPLEdBSVAsRUFKTyxHQUlGUSxHQUFHLENBQUMsY0FBRCxDQUFILENBQW9CLFNBQXBCLENBSkUsR0FLUCxZQUxKO0FBTUF0QixXQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQmUsT0FBcEIsQ0FBNEJELElBQTVCO0FBRUFFLGdCQUFNLENBQUNDLFVBQVAsQ0FBa0IsWUFBWTtBQUMxQmpCLGFBQUMsQ0FBQyxRQUFELENBQUQsQ0FBWWtCLE1BQVosQ0FBbUIsR0FBbkIsRUFBd0IsQ0FBeEIsRUFBMkJDLE9BQTNCLENBQW1DLEdBQW5DLEVBQXdDLFlBQVk7QUFDaERuQixlQUFDLENBQUMsSUFBRCxDQUFELENBQVFvQixNQUFSO0FBQ0gsYUFGRDtBQUdILFdBSkQsRUFJRyxJQUpIO0FBS0g7QUF0Q0UsT0FBUDtBQXdDSCxLQTVDRCxDQTRDRSxPQUFPRSxHQUFQLEVBQVk7QUFDVixVQUFJUixJQUFJLEdBQUcsa0RBQ1Asc0ZBRE8sR0FFUCxxREFGTyxHQUdQLG1CQUhPLEdBSVAseUNBSk8sR0FLUCxZQUxKO0FBTUFkLE9BQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CZSxPQUFwQixDQUE0QkQsSUFBNUI7QUFDSDtBQUNKLEdBdEREO0FBdURILENBeERELEUiLCJmaWxlIjoiL2pzL2ZlYXR1cmVzL2ZlYXR1cmVzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKSB7XG4gICAgJCgnLmN1c3RvbS1jb250cm9sLWlucHV0JykuY2hhbmdlKGZ1bmN0aW9uKCkge1xuICAgICAgICB0cnkge1xuICAgICAgICAgICAgdmFyIHJvdXRlID0gJCh0aGlzKS5kYXRhKCd1cmwnKTtcbiAgICAgICAgICAgIHZhciBjc3JmX3Rva2VuID0gJCgnI2ZlYXR1cmVUYWJsZUNTUkYnKS52YWwoKVxuXG4gICAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgICAgIC8qIHRoZSByb3V0ZSBwb2ludGluZyB0byB0aGUgcG9zdCBmdW5jdGlvbiAqL1xuICAgICAgICAgICAgICAgIHVybDogcm91dGUsXG4gICAgICAgICAgICAgICAgdHlwZTogJ1BPU1QnLFxuICAgICAgICAgICAgICAgIC8qIHNlbmQgdGhlIGNzcmYtdG9rZW4gYW5kIHRoZSBpbnB1dCB0byB0aGUgY29udHJvbGxlciAqL1xuICAgICAgICAgICAgICAgIGRhdGE6IHtfdG9rZW46IGNzcmZfdG9rZW59LFxuICAgICAgICAgICAgICAgIGRhdGFUeXBlOiAnSlNPTicsXG4gICAgICAgICAgICAgICAgLyogcmVtaW5kIHRoYXQgJ2RhdGEnIGlzIHRoZSByZXNwb25zZSBvZiB0aGUgQWpheENvbnRyb2xsZXIgKi9cbiAgICAgICAgICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoZGF0YSkge1xuICAgICAgICAgICAgICAgICAgICB2YXIgaHRtbCA9ICc8ZGl2IGNsYXNzPVwiYWxlcnQgYWxlcnQtc3VjY2Vzc1wiIHJvbGU9XCJhbGVydFwiPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgPGJ1dHRvbiB0eXBlPVwiYnV0dG9uXCIgY2xhc3M9XCJjbG9zZVwiIGRhdGEtZGlzbWlzcz1cImFsZXJ0XCIgYXJpYS1sYWJlbD1cIkNsb3NlXCI+JyArXG4gICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICAgICAgPHNwYW4gYXJpYS1oaWRkZW49XCJ0cnVlXCI+JnRpbWVzOzwvc3Bhbj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgIDwvYnV0dG9uPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgJycgKyBkYXRhWydtZXNzYWdlJ10gK1xuICAgICAgICAgICAgICAgICAgICAgICAgJyAgICA8L2Rpdj4nO1xuXG4gICAgICAgICAgICAgICAgICAgICQoJyNtYWluQ29udGFpbmVyJykucHJlcGVuZChodG1sKTtcblxuICAgICAgICAgICAgICAgICAgICB3aW5kb3cuc2V0VGltZW91dChmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAkKFwiLmFsZXJ0XCIpLmZhZGVUbyg1MDAsIDApLnNsaWRlVXAoNTAwLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgJCh0aGlzKS5yZW1vdmUoKTtcbiAgICAgICAgICAgICAgICAgICAgICAgIH0pO1xuICAgICAgICAgICAgICAgICAgICB9LCA0MDAwKTtcbiAgICAgICAgICAgICAgICB9LFxuICAgICAgICAgICAgICAgIGVycm9yOiBmdW5jdGlvbiAoZXJyKSB7XG4gICAgICAgICAgICAgICAgICAgIHZhciBodG1sID0gJzxkaXYgY2xhc3M9XCJhbGVydCBhbGVydC1kYW5nZXJcIiByb2xlPVwiYWxlcnRcIj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICcgICAgICAgIDxidXR0b24gdHlwZT1cImJ1dHRvblwiIGNsYXNzPVwiY2xvc2VcIiBkYXRhLWRpc21pc3M9XCJhbGVydFwiIGFyaWEtbGFiZWw9XCJDbG9zZVwiPicgK1xuICAgICAgICAgICAgICAgICAgICAgICAgJyAgICAgICAgICAgIDxzcGFuIGFyaWEtaGlkZGVuPVwidHJ1ZVwiPiZ0aW1lczs8L3NwYW4+JyArXG4gICAgICAgICAgICAgICAgICAgICAgICAnICAgICAgICA8L2J1dHRvbj4nICtcbiAgICAgICAgICAgICAgICAgICAgICAgICcnICsgZXJyWydyZXNwb25zZUpTT04nXVsnbWVzc2FnZSddICtcbiAgICAgICAgICAgICAgICAgICAgICAgICcgICAgPC9kaXY+JztcbiAgICAgICAgICAgICAgICAgICAgJCgnI21haW5Db250YWluZXInKS5wcmVwZW5kKGh0bWwpO1xuXG4gICAgICAgICAgICAgICAgICAgIHdpbmRvdy5zZXRUaW1lb3V0KGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICQoXCIuYWxlcnRcIikuZmFkZVRvKDUwMCwgMCkuc2xpZGVVcCg1MDAsIGZ1bmN0aW9uICgpIHtcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICAkKHRoaXMpLnJlbW92ZSgpO1xuICAgICAgICAgICAgICAgICAgICAgICAgfSk7XG4gICAgICAgICAgICAgICAgICAgIH0sIDQwMDApO1xuICAgICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0pO1xuICAgICAgICB9IGNhdGNoIChlcnIpIHtcbiAgICAgICAgICAgIHZhciBodG1sID0gJzxkaXYgY2xhc3M9XCJhbGVydCBhbGVydC1kYW5nZXJcIiByb2xlPVwiYWxlcnRcIj4nICtcbiAgICAgICAgICAgICAgICAnICAgICAgICA8YnV0dG9uIHR5cGU9XCJidXR0b25cIiBjbGFzcz1cImNsb3NlXCIgZGF0YS1kaXNtaXNzPVwiYWxlcnRcIiBhcmlhLWxhYmVsPVwiQ2xvc2VcIj4nICtcbiAgICAgICAgICAgICAgICAnICAgICAgICAgICAgPHNwYW4gYXJpYS1oaWRkZW49XCJ0cnVlXCI+JnRpbWVzOzwvc3Bhbj4nICtcbiAgICAgICAgICAgICAgICAnICAgICAgICA8L2J1dHRvbj4nICtcbiAgICAgICAgICAgICAgICAnIE9vcHMhIFNvbWV0aGluZyB3ZW50IHdyb25nIG9uIG91ciBlbmQuJyArXG4gICAgICAgICAgICAgICAgJyAgICA8L2Rpdj4nO1xuICAgICAgICAgICAgJCgnI21haW5Db250YWluZXInKS5wcmVwZW5kKGh0bWwpO1xuICAgICAgICB9XG4gICAgfSk7XG59KTtcbiJdLCJzb3VyY2VSb290IjoiIn0=
