
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
    <script src="{{ asset('js/slick.js') }}"></script>
    <script src="{{ asset('js/mukhtar.js') }}"></script>
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
              $('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});

            </script>

   <script>
 $(document).ready(function(){
  
  /* 1. Visualizing things on Hover - See next part for action on click */
  $('#stars li').on('mouseover', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
   
    // Now highlight all the stars that's not after the current hovered star
    $(this).parent().children('li.star').each(function(e){
      if (e < onStar) {
        $(this).addClass('hover');
      }
      else {
        $(this).removeClass('hover');
      }
    });
    
  }).on('mouseout', function(){
    $(this).parent().children('li.star').each(function(e){
      $(this).removeClass('hover');
    });
  });
  
  
  /* 2. Action to perform on click */
  $('#stars li').on('click', function(){
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');
    
    for (i = 0; i < stars.length; i++) {
      $(stars[i]).removeClass('selected');
    }
    
    for (i = 0; i < onStar; i++) {
      $(stars[i]).addClass('selected');
    }
    
    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    var msg = "";
    if (ratingValue > 1) {
        msg = "شكرا! لقد اختارت " + ratingValue + " نجمة.";
    }
    else {
        msg = "شكرا! لقد اختارت " + ratingValue + " نجمة.";
    }
    responseMessage(msg);
    
  });
  
  
});


function responseMessage(msg) {
  $('.success-box').fadeIn(200);  
  $('.success-box div.text-message').html("<span>" + msg + "</span>");
}
    </script>


            @stack('scripts')


            </body>

</html>
