  <!-- Add Allow Attandance Dialog -->
  @if ($tab=='tab3')
  @foreach ($sessions as $session)
   @if(App\Http\Controllers\CourseAppointmentController::isSessionStillValid($session->date,$session->from_time,$session->to_time))
     @if($session->hasZoom==0)
<div class="modal fade" id="attand_{{$session->id}}" tabindex="-1" role="dialog" aria-labelledby="attand_{{$session->id}}Title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="attand_{{$session->id}}lTitle">التحضير</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="background: #34405a;">
          <div class="ui-input-container">
              <div class="row justify-content-center">
                 <div class="col-12">
                      @if (empty($ActiveSession))
                      <h1>لا يوجد جلسات نشطة</h1>
                      @elseif ($ActiveSession->attand)
                      <h1>
                          @if ($ActiveSession->SessionID==1)
                            تم تحضير الجلسة الاولى
                           @elseif ($ActiveSession->SessionID==2)
                            تم تحضير الجلسة الثانية
                           @elseif ($ActiveSession->SessionID==3)
                            تم تحضير الجلسة الثالثة
                           @elseif ($ActiveSession->SessionID==4)
                            تم تحضير الجلسة الرابعة
                           @elseif ($ActiveSession->SessionID==5)
                            تم تحضير الجلسة الخامسة
                           @elseif ($ActiveSession->SessionID==6)
                            تم تحضير الجلسة السادسة
                           @elseif ($ActiveSession->SessionID==7)
                           تم تحضير الجلسة السابعة
                           @elseif ($ActiveSession->SessionID==8)
                            تم تحضير الجلسة الثامنة
                           @elseif ($ActiveSession->SessionID==9)
                            تم تحضير الجلسة التاسعة
                           @elseif ($maxSeActiveSession->SessionIDssionId==10)
                            تم تحضير الجلسة العاشرة
                           @elseif ($ActiveSession->SessionID>=11)
                             تم تحضير الجلسة {{$ActiveSession->SessionID}}
                           @endif
                          </h1>
                      @else
                      <form id="AttandAppointmentButtonForm" method="post" action="{{route('AttandSession')}}">
                        <h1>
                          @if ($ActiveSession->SessionID==1)
                            أدخل الكود للتحضير للجلسة الاولى
                           @elseif ($ActiveSession->SessionID==2)
                            أدخل الكود للتحضير للجلسة الثانية
                           @elseif ($ActiveSession->SessionID==3)
                            أدخل الكود للتحضير للجلسة الثالثة
                           @elseif ($ActiveSession->SessionID==4)
                            أدخل الكود للتحضير للجلسة الرابعة
                           @elseif ($ActiveSession->SessionID==5)
                            أدخل الكود للتحضير للجلسة الخامسة
                           @elseif ($ActiveSession->SessionID==6)
                            أدخل الكود للتحضير للجلسة السادسة
                           @elseif ($ActiveSession->SessionID==7)
                           أدخل الكود للتحضير للجلسة السابعة
                           @elseif ($ActiveSession->SessionID==8)
                            أدخل الكود للتحضير للجلسة الثامنة
                           @elseif ($ActiveSession->SessionID==9)
                            أدخل الكود للتحضير للجلسة التاسعة
                           @elseif ($maxSeActiveSession->SessionIDssionId==10)
                            أدخل الكود للتحضير للجلسة العاشرة
                           @elseif ($ActiveSession->SessionID>=11)
                           أدخل الكود للتحضير للجلسة رقم {{$ActiveSession->SessionID}}
                           @endif
                        </h1>

                        <div class="form-group input-group">                                                                            
                          <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-hourglass-start"></i></span></div>
                           <input id="SessionCode" required="" name="SessionCode" class="form-control" type="text">
                        </div>
                       <div class="form-group input-group">                                                                            
                       <button type="button" id="AttandAppointmentButton" class="btn btn-primary">
                         تحضير
                       </button>
                       <input type="hidden" name="session_id" value="{{$ActiveSession->id}}">
                       </div>
                        @csrf
                      </form>
                      @endif
                 </div>
               </div>
              <div class="row justify-content-center">
                 <div class="col-12">        
                  <div id="SessionAttandResult"></div>
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
<script>

  $(document).on("click", '#AttandAppointmentButton', function () {
        $.ajax({
                data: $('#AttandAppointmentButtonForm').serialize(),
                type: $('#AttandAppointmentButtonForm').attr('method'),
                url:$('#AttandAppointmentButtonForm').attr('action'),
                success: function(result) {
                  if(result==1){
                    $("#AttandAppointmentButtonForm").hide(); 
                    $('#SessionAttandResult').addClass('alert alert-success');
                    $('#SessionAttandResult').text("تم التحضير");
                  }
                  else if(result==3){
                    $('#SessionAttandResult').addClass('alert alert-danger');
                    $('#SessionAttandResult').text("يرجى أدخال الكود الصحيح للتحضير");  
                  }
                  else if(result==2){
                    $('#SessionAttandResult').addClass('alert alert-danger');
                    $('#SessionAttandResult').text("نأسف انتهى وقت التحضير");  
                  }
                }
        });
  });
  $(document).on('hide.bs.modal','#attand_{{$session->id}}', function () {
     location.reload();
  });
</script>
 )    @endif
   @endif
  @endforeach
  @endif
  <!-- End Allow Attandance Dialog --> 
