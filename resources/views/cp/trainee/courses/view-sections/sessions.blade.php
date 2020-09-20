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
    <div class="row justify-content-center"">
        <div class="col-12">

          @if (\Session::has('success'))
            <div class="alert alert-success">
                <ul>
                    <li>{!! \Session::get('success') !!}</li>
                </ul>
            </div>
        @endif
        @if (\Session::has('error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{!! \Session::get('error') !!}</li>
                </ul>
            </div>
        @endif

            <table class="course-view-table" style="overflow-x:auto;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <!-- <th class="text-center">اسم الدورة</th> -->
                        <th class="text-center">اليوم</th>
                        <th class="text-center">التاريخ </th>
                        <th class="text-center">وقت البداية </th>
                        <th class="text-center">وقت النهاية </th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sessions as $session)
                    <tr style="color:#283045;
                        @if ($session->date==date('Y-m-d'))
                            background-color:#1db51d;color:#fff;
                        @endif"">
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <!-- <td class="priority text-center">{{ $session->title }}</td> -->
                        <td class="priority text-center">{{ $session->day }}</td>
                        <td class="priority text-center">
                        @if ($session->date==date('Y-m-d'))
                            {{ $session->date }} اليوم
                        @else
                            {{ $session->date }}
                        @endif </td>
                        <td class="priority text-center">{{ explode(" ", $session->from_time)[0] }} @if(explode(" ", $session->from_time)[1] == 'AM') صباحاً @else مساءً @endif</td>
                        <td class="priority text-center">{{ explode(" ", $session->to_time)[0] }} @if(explode(" ", $session->to_time)[1] == 'AM') صباحاً @else مساءً @endif</td>
                         <td class="priority text-center" style="@if ($session->date==date('Y-m-d')) background-color:#fff;color:#000;@endif">
                            <?php
                            $OrgmaxSessionId=$maxSessionId;
                            $lastsessionid=($maxSessionId==0)?0:--$maxSessionId; 
                            ?>   
                            @if(App\Http\Controllers\CourseAppointmentController::isSessionStillValid($session->date,$session->from_time,$session->to_time))
                               @if($session->hasZoom==0) <!--normal session-->
                                 <a class='session_icon allowattand' data-placement="top"  data-original-title="تحضير" data-toggle="modal" data-target="#attand_{{$session->id}}" href="#"><i class="fa fa-desktop"></i> تحضير  </a>
                               @elseif($session->hasZoom==2)
                                 @if(App\Http\Helpers\BBBHelper::IsMeetingRunning($course->code.":".$course->id.":".$session->id.":".$lastsessionid))
                                   <a class='session_icongreen' data-toggle="tooltip" data-placement="top" title="" data-original-title="دخول الجلسة " href="{{url('trainee/courses/session/'.$session->id.'/'.$lastsessionid.'/JoinBBBSession')}}" target="_blank">
                                          @if ($OrgmaxSessionId==1)
                                            دخول الجلسة الاولى
                                            @elseif ($OrgmaxSessionId==2)
                                            دخول الجلسة التانية
                                            @elseif ($OrgmaxSessionId==3)
                                            دخول الجلسة الثالثة
                                            @elseif ($OrgmaxSessionId==4)
                                            دخول الجلسة الرابعة
                                            @elseif ($OrgmaxSessionId==5)
                                            دخول الجلسة الخامسة
                                            @elseif ($OrgmaxSessionId==6)
                                            دخول الجلسة السادسة
                                            @elseif ($OrgmaxSessionId==7)
                                            دخول الجلسة السابعة
                                            @elseif ($OrgmaxSessionId==8)
                                            دخول الجلسة الثامنة
                                            @elseif ($OrgmaxSessionId==9)
                                            دخول الجلسة التاسعة
                                            @elseif ($OrgmaxSessionId==10)
                                            دخول الجلسة العاشرة
                                            @elseif ($OrgmaxSessionId>=11)
                                            دخول الجلسة {{$OrgmaxSessionId}} 
                                            @endif
                                   <i class="far fa-play-circle"></i></a>
                                 @else
                                   لا يوجد جلسات نشطة
                                 @endif    
                               @endif
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
