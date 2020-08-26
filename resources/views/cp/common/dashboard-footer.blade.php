
            <footer class="footer" style="text-align: center; color:#fff">
                <div class="w-100 clearfix">
                    <span class="text-center;"> جميع الحقوق محفوظة © مركز التدريب العدلي 1441هـ | 2020 م </span>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/jquery.simple-calendar.js') }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.21/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
            <script>

                $('.repeater-default').repeater({
                    show: function () {
                        $(this).slideDown();
                    }

                });

            </script>
            <script>
                $(document).ready(function () {
                    $('.repeater').repeater({
                        // (Optional)
                        // start with an empty list of repeaters. Set your first (and only)
                        // "data-repeater-item" with style="display:none;" and pass the
                        // following configuration flag
                        initEmpty: false,
                        // (Optional)
                        // "defaultValues" sets the values of added items.  The keys of
                        // defaultValues refer to the value of the input's name attribute.
                        // If a default value is not specified for an input, then it will
                        // have its value cleared.
                        defaultValues: {
                            'text-input': 'foo'
                        },
                        // (Optional)
                        // "show" is called just after an item is added.  The item is hidden
                        // at this point.  If a show callback is not given the item will
                        // have $(this).show() called on it.
                        show: function () {
                            $(this).slideDown();
                        },
                        // (Optional)
                        // "hide" is called when a user clicks on a data-repeater-delete
                        // element.  The item is still visible.  "hide" is passed a function
                        // as its first argument which will properly remove the item.
                        // "hide" allows for a confirmation step, to send a delete request
                        // to the server, etc.  If a hide callback is not given the item
                        // will be deleted.
                        hide: function (deleteElement) {
                            // if(confirm('Are you sure you want to delete this element?')) {
                            //     $(this).slideUp(deleteElement);
                            // }
                        },
                        // (Optional)
                        // You can use this if you need to manually re-index the list
                        // for example if you are using a drag and drop library to reorder
                        // list items.
                        ready: function (setIndexes) {
                        },
                        // (Optional)
                        // Removes the delete button from the first list item,
                        // defaults to false.
                        isFirstItemUndeletable: true
                    })
                });
            </script>
    <script>
        $('.owl-carousell').owlCarousel({
  loop:true,
  margin:10,
  nav:true,
  autoplay:true,
  dots:true,
  nav:true,
 
  
  responsive:{
      0:{
          items:1
      },
      600:{
          items:1
      },
      1000:{
          items:1
      }
  }
})
    </script>
            </body>

</html>
