<div class="outer-container">
    @if(!isset($sessions))
    <div class="row">
        <div class="col-12" style="color:#283045;">
            <div class="alert alert-info">
                لا يوجد محاضرات لهذه الدورة <i class="fa fa-exclamation-circle"></i>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-12">
            <table class="course-view-table" style="overflow-x:auto;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <!-- <th class="text-center">اسم الدورة</th> -->
                        <th class="text-center">اليوم</th>
                        <th class="text-center">تاريخ المحاضرة</th>
                        <th class="text-center">وقت بداية المحاضرة</th>
                        <th class="text-center">وقت نهاية المحاضرة</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sessions as $session)
                    <tr style="color:#283045;">
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <!-- <td class="priority text-center">{{ $session->title }}</td> -->
                        <td class="priority text-center">{{ $session->day }}</td>
                        <td class="priority text-center">{{ $session->date }}</td>
                        <td class="priority text-center">{{ explode(" ", $session->from_time)[0] }} @if(explode(" ", $session->from_time)[1] == 'AM') صباحاً @else مساءً @endif</td>
                        <td class="priority text-center">{{ explode(" ", $session->to_time)[0] }} @if(explode(" ", $session->to_time)[1] == 'AM') صباحاً @else مساءً @endif</td>
                        <td class="priority text-center">
                        @if($session->hasZoom==0)<!--session is face_to_face-->
                        @if(App\Http\Controllers\CourseAppointmentController::isSessionStillValid($session->date,$session->from_time,$session->to_time))
                                                  <button data-toggle="modal" data-target="#duplicate_{{$session->id}}" class="btn btn-primary actions-btns"  data-placement="top" title=" تحضير"><i class="fa fa-clock-o"></i>تحضير</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="duplicate_{{$session->id}}" tabindex="-1" role="dialog" aria-labelledby="duplicate_{{$session->id}}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                     <form id="add-course-dates-{{$course->id}}" action="{{ route('courses-duplicate') }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="duplicate{{$course->id}}">ادخل الرقم للتحضير</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" style="font-size: 1.3em;">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <label for="start_date" style="font-size:11px">Random Number</label>
                                                                               
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="form-group input-group">
                                                                                    
                                                                                    <input class="form-control" name="reg_end_date" type="text"  id="date" style=" padding-right:50px !important; ">
                                                                                    <input class="form-control" name="course_id" type="hidden" value="{{$course->id}}">
                                                                                    <input class="form-control" name="code" type="hidden" value="{{$course->code}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button onclick="submit(<?php echo $course->id; ?>)" style="width: 100%; padding-bottom: 30px;" type="submit" class="btn btn-primary">تحضير</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                        @else
                         لا تبدء بعد/حاضر /غائب
                        @endif 

                        @elseif($session->hasZoom==2) <!--session is live-->
                        @if(App\Http\Controllers\CourseAppointmentController::isSessionStillValid($session->date,$session->from_time,$session->to_time))
                            <a style="padding: 7px; border: solid 1px #A1825C;" href="{{isset($session->webinar)?$session->webinar->join_url:'#'}}" target="_blanck"><i class="far fa-play-circle"></i></a>
                            @else
                            <button style="padding: 7px; border: solid 1px #A1825C;" data-toggle="tooltip" data-placement="top" title="لا يمكن فتح المحاضرة في غير وقتها"><i class="far fa-play-circle"></i></button>
                            @endif
                        @elseif($session->hasZoom==1) <!--session not scheduled on zoom--> 
                        <button style="padding: 7px; border: solid 1px #A1825C;" data-toggle="tooltip" data-placement="top" title="جارى أنشاء المحاضرة على زووم"><i class="fa fa-hourglass-start"></i></button>
                        @endif
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
