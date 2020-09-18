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
                         <td class="priority text-center">
                            @if(App\Http\Controllers\CourseAppointmentController::isSessionStillValid($session->date,$session->from_time,$session->to_time))
                               @if($session->hasZoom==0) <!--normal session-->
                                 <a class='session_icon allowattand' data-placement="top"  data-original-title="تحضير" data-toggle="modal" data-target="#attand_{{$session->id}}" href="#"><i class="fa fa-desktop"></i> تحضير  </a>
                               @else
                                 <a class='session_icon' data-toggle="tooltip" data-placement="top" title="" data-original-title="زوم" href="{{isset($session->webinar)?$session->webinar->start_url:'#'}}" target="_blanck"><i class="far fa-play-circle"></i></a>
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
