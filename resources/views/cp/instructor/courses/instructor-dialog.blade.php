  <!-- SendEmail Dialog -->
  <div class="modal fade" id="SendEmail" tabindex="-1" role="dialog" aria-labelledby="SendEmailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style="padding:10px !important;">
          <h5 class="modal-title" id="SendEmailTitle">أرسال بريد الكترونى </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background: #34405a;">
         <div class="row justify-content-right" >
          <div class="col-md-12">
            <div class="ui-input-container">
                <h6>العنوان</h6>
                <div class="form-group input-group">                                                                            
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1" style="background:#34405a;"><img src="{{ asset('images/man.png') }}" class="img-fluid" style="width:20px !important;height:20px !important"></span>
                    </div>
                    <input id="email"   class="form-control" type="text">
                    </div>
                    <h6>الرسالة</h6>
                <label class="ui-form-input-container">
                    <textarea class="ui-form-input" id="word-count-input" rows="10"></textarea>
                        <span class="form-input-label"><img src="{{ asset('images/school.png') }}" style="width: 20px"></span>
                        </label>
                        <button type="button" class="btn btn-primary" style="margin:auto; display:table;width:120px">حفظ</button>
                    </div>                    
                </div>
         </div>
         </div>       
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
      </div>
      </div>      
    </div>
  </div>
  <!-- End SendEmail Dialog -->

  <!-- Add New Session Dialog -->
@if ($tab=='tab3')
<div class="modal fade" id="AddNewZoomSession" tabindex="-1" role="dialog" aria-labelledby="AddNewZoomSessionTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddNewZoomSessionTitle">أضافة زووم </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #34405a;">
          <div class="ui-input-container">
         @include('cp.zoom.webinar-add-dialog')
         </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="AddNewSession" tabindex="-1" role="dialog" aria-labelledby="AddNewSessionTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddNewSessionTitle">أضافة يوم جديد</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #34405a;">
          <div class="ui-input-container">
            @include('cp.appointments.appointment-dialog')
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
  </div>
</div>
  @endif
  <!-- End Add New Session Dialog --> 


  <!-- Add New Material Dialog -->
  @if ($tab=='tab2')
<div class="modal fade" id="AddNewMaterial" tabindex="-1" role="dialog" aria-labelledby="AddNewMaterialTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddNewMaterialTitle">أضافة ملف جديد</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #34405a;">
          <div class="ui-input-container">
           @include('cp.materials.form-dialog')
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
  </div>
</div>
  @endif
  <!-- End Add New File Dialog --> 


  <!-- Add Allow Attandance Dialog -->
  @if ($tab=='tab3')
  @foreach ($sessions as $session)
   @if(App\Http\Controllers\CourseAppointmentController::isSessionStillValid($session->date,$session->from_time,$session->to_time))
     @if($session->hasZoom==0)
<div class="modal fade bd-example-modal-lg" id="allowattandance_{{$session->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="allowattandance_{{$session->id}}Title" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="allowattandance_{{$session->id}}lTitle">أتاحة الحضور</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #34405a;">
          <div class="ui-input-container">
              <div class="row justify-content-center">
                 <div class="col-12">
                      <form id="StartNewSessionInsideAppointment" method="post" action="{{route('StartNewSession')}}">
                        <h1>المدة الزمنية المتاحة للتحضير بالدقائق</h1>
                        <div class="form-group input-group">                                                                            
                          <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-hourglass-start"></i></span></div>
                           <input id="Sessionduration" required="" name="duration" class="form-control" type="text">
                        </div>
                       <div class="form-group input-group">                                                                            
                       <button type="button" id="StartNewSessionInsideAppointmentButton" class="btn btn-primary">
                           @if ($maxSessionId==0)
                           بدء تحضير الجلسة الاولى
                           @elseif ($maxSessionId==1)
                           بدء تحضير الجلسة الثانية
                           @elseif ($maxSessionId==2)
                           بدء تحضير الجلسة الثالثة
                           @elseif ($maxSessionId==3)
                           بدء تحضير الجلسة الرابعة
                           @elseif ($maxSessionId==4)
                           بدء تحضير الجلسة الخامسة
                           @elseif ($maxSessionId==5)
                           بدء تحضير الجلسة السادسة
                           @elseif ($maxSessionId==6)
                          بدء تحضير الجلسة السابعة
                           @elseif ($maxSessionId==7)
                           بدء تحضير الجلسة الثامنة
                           @elseif ($maxSessionId==8)
                           بدء تحضير الجلسة التاسعة
                           @elseif ($maxSessionId==9)
                           بدء تحضير الجلسة العاشرة
                           @elseif ($maxSessionId>=10)
                           بدء تحضير الجلسة {{$maxSessionId}} 
                           @endif
                       </button>
                       <input type="hidden" name="appointment_id" value="{{$session->id}}">
                       <input type="hidden" name="maxSessionId" value="{{$maxSessionId}}">
                       </div>
                        @csrf
                      </form>
                 </div>
               </div>
              <div class="row justify-content-center">
                 <div class="col-12"><span id="sessionTimer"></span>        
                  <div id="SessionRandomCode"></div>
                 </div>
              </div>

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="closebutton" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
  </div>
</div>
 @push('scripts')
 <script>
 function isNumber(n) { return !isNaN(parseFloat(n)) && !isNaN(n - 0) }
  $(document).on("click", '#StartNewSessionInsideAppointmentButton', function () {
    $('#closebutton').text("أنهاء التحضير للجلسة");
    var duration = $('#Sessionduration').val() ;
      if(isNumber(duration)){
        $.ajax({
                data: $('#StartNewSessionInsideAppointment').serialize(),
                type: $('#StartNewSessionInsideAppointment').attr('method'),
                url:$('#StartNewSessionInsideAppointment').attr('action'),
                success: function(result) {
                  $("#StartNewSessionInsideAppointment").hide();
                    var the_interval = null;
                    $(document).ready(function () {
                        var dateToFinished = new Date(result.sessionTimer);
                        the_interval = setInterval(function () {
                            var now = new Date().getTime();
                            var distance = dateToFinished.getTime() - now;

                            if (distance <= 0) {
                                clearInterval(the_interval);
                                $('#allowattandance_{{$session->id}}').modal('toggle');
                                $('#sessionTimer').css('color', 'red').html('00:00');
                            } else {
                                if (distance <= 1000 * 60 * 5) { //5 minutes
                                    $('#sessionTimer').css('color', 'red');
                                }
                                distance = Math.floor(distance / 1000);
                                var seconds = Math.floor(distance % 60);

                                distance = Math.floor(distance / 60);
                                var minutes = Math.floor(distance % 60);

                                distance = Math.floor(distance / 60);
                                var hours = Math.floor(distance);

                                var txt = "";
                                if (hours > 0) {
                                    txt += hours < 10 ? '0' + hours.toString() : hours.toString();
                                    txt += ":"
                                }

                                txt += minutes < 10 ? '0' + minutes.toString() : minutes.toString();
                                txt += ":";
                                txt += seconds < 10 ? '0' + seconds.toString() : seconds.toString();

                                $('#sessionTimer').html(txt);
                            }
                        }, 1000)
                    });           

                   $('#SessionRandomCode').text(result.SessionCode);
                }
        });
      }else
      alert("ادخل عدد صحيح");
  });
  $(document).on('hide.bs.modal','#allowattandance_{{$session->id}}', function () {
        $.ajax({
                data: $('#StartNewSessionInsideAppointment').serialize(),
                type: $('#StartNewSessionInsideAppointment').attr('method'),
                url:"{{route('ExpireAttandSession')}}",
                success: function(result) {
                     location.reload();
                }
        });
  });
       </script>
    @endpush
     @endif
   @endif
  @endforeach
  @endif
  <!-- End Allow Attandance Dialog --> 
