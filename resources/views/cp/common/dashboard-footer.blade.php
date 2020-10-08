            
            
            <footer class="footer" style="text-align: center; color:#fff">
                <div class="w-100 clearfix">
                    <span class="text-center;"> جميع الحقوق محفوظة © مركز التدريب العدلي 1442هـ | 2020 م </span>
                </div>
            </footer>
           

            <?php $events=\Session::get('events'); ?>
            @if(isset($events))
            <aside class="right-sidebar">
                <div class="sidebar-chat" data-plugin="chat-sidebar"> 
                    <div class="sidebar-chat-info">
                    </div>
                    <div class="event-list">
                        @foreach ($events as $key => $event )
                            <a href="javascript:void(0)" class="">
                                <h4 class="event">
                                    <span class="date"><i class="far fa-clock"></i> {{$event['start']}}</span> 
                                    <span class="name"><i class="fas fa-award"></i>{{$event['title']}} </span> 
                                    <span class="desc"><i class="far fa-file-alt"></i>{{$event['title']}}</span> 
                                </h4>
                            </a>
                        @endforeach  
                    </div>
                </div>
            </aside>
            @endif

        </div>
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/carousel.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('site-assets/js/jquery.simple-calendar.js') }}"></script>
    <script src="{{ asset('site-assets/DataTables/datatables.min.js') }}">></script>
    <script src="{{ asset('site-assets/DataTables/Select-1.3.1/js/dataTables.select.js') }}">></script>
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
    <script src="{{ asset('site-assets/js/jquery.lineProgressbar.js') }}">></script>
            <script>
                $('.repeater-default').repeater({
                    show: function () {
                        $(this).slideDown();
                    }
                });
            </script>
            <script>
                $(document).ready(function () {
                    @if(isset($events))
                     $("#ُevenCalandar").simpleCalendar({
                     fixedStartDay: false,
                     disableEmptyDetails: true,
                     events: [
                               @foreach ($events as $key => $event)
                                  {
                                   startDate: new Date({{$event['start']}}).toDateString(),
                                   endDate: new Date({{$event['end']}}).toISOString(),
                                   summary: "{{$event['title']}}"
                                  },
                               @endforeach                 
                                ],
                    });
                    @endif

                    $("#notiDropdown").on('click',function(){
                        $.ajax({
                            type:'GET',
                            url: "<?php echo route('readNotifications') ?>",
                            data:'',
                            success:function(content){
                                if(content == true){
                                    $('#notiDropdownCount').text("");
                                }
                            }
                        });
                    });


                    $('.repeater').repeater({
                        initEmpty: false,
                        defaultValues: {
                            'text-input': 'foo'
                        },
                        show: function () {
                            $(this).slideDown();
                        },
                        isFirstItemUndeletable: true
                    });
                     
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


function auto_search($dt){
    var $api = $dt.api();
    $api.on( 'search.dt', function () {
        window.location.hash = $api.search();
    } );
    var search_str = window.location.hash.substring(1);
    if(search_str) {
        $api.search( search_str ).draw();
    }
}

    </script>


            @stack('scripts')


            </body>

</html>
