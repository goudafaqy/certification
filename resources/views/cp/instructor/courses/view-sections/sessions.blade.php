<div class="outer-container">
    <div class="row">
        <div class="col-12" style="color:#283045;">
          <button type="button" id="AddNewSessionButton" data-toggle="modal" data-target="#AddNewSession" style="display:none;"></button>
          <button type="button" id="AddNewZoomSessionButton" data-toggle="modal" data-target="#AddNewZoomSession" style="display:none;"></button>          
        </div>
    </div>

    @if(!isset($sessions))
    <div class="row">
        <div class="col-12" style="color:#283045;">
            <div class="alert alert-info">
                لا يوجد محاضرات لهذه الدورة <i class="fa fa-exclamation-circle"></i>
            </div>
        </div>
    </div>
    @else
           
    <div class="card-body" style="padding: 0 15px">
        <div class="row justify-content-center">
            <div class="col-md-12">             
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
            <table id="dtBasicExample" class="table course-table" width="100%">
                <thead>
                    <tr class="odd">
                        <th class="th-sm text-center">#</th>
                        <!-- <th class="text-center">اسم الدورة</th> -->
                        <th class="th-sm text-center">اليوم</th>
                        <th class="th-sm text-center">التاريخ </th>
                        <th class="th-sm text-center">وقت البداية </th>
                        <th class="th-sm text-center">وقت النهاية </th>
                        <th class="th-sm text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sessions as $session)
                    <tr class="odd" style="color:#283045;line-height:3.5rem;  
                         @if ($session->date==date('Y-m-d'))
                            background-color:#1db51d;color:#fff;
                        @endif">
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
                            @if(App\Http\Controllers\CourseAppointmentController::isSessionStillValid($session->date,$session->from_time,$session->to_time))
                               @if($session->hasZoom==0) <!--normal session-->
                                 <a class='session_icon allowattand' data-placement="top"  data-original-title="أتاحة الحضور" data-toggle="modal" data-target="#allowattandance_{{$session->id}}" href="#"><i class="fa fa-desktop"></i></a>
                               @elseif($session->hasZoom==2)
                                   <?php
                                   $OrgmaxSessionId=$maxSessionId;
                                   $lastsessionid=($maxSessionId==0)?0:--$maxSessionId; 
                                   ?>
                                   @if(App\Http\Helpers\BBBHelper::IsMeetingRunning($course->code.":".$course->id.":".$session->id.":".$lastsessionid))
                                   
                                        <a class='session_icongreen' data-toggle="tooltip" data-placement="top" title="" data-original-title="أعادة دخول" href="{{url('instructor/courses/session/'.$session->id.'/'.$lastsessionid.'/StartBBBSession')}}" target="_blank">
                                        أعادة دخول الجلسة النشطة<i style="position: relative; top: -2px; right: -2px" class="fa fa-share"></i></a>
                                        <a id="delete" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="أنهاء " href="{{url('instructor/courses/session/'.$session->id.'/'.$lastsessionid.'/EndBBBSession')}}" >أنهاء الجلسة<i style="position: relative; top: -2px; right: -2px" class="fa fa-times"></i></a>
                                   @else
                                        <a class='session_icongreen' id="startNewSessionevent" data-toggle="tooltip" data-placement="top" title="" data-original-title="بدء " href="{{url('instructor/courses/session/'.$session->id.'/'.$OrgmaxSessionId.'/StartBBBSession')}}" target="_blank">
                                            @if ($OrgmaxSessionId==0)
                                            بدء الجلسة الاولى
                                            @elseif ($OrgmaxSessionId==1)
                                            بدء الجلسة التانية
                                            @elseif ($OrgmaxSessionId==2)
                                            بدء الجلسة الثالثة
                                            @elseif ($OrgmaxSessionId==3)
                                            بدء الجلسة الرابعة
                                            @elseif ($OrgmaxSessionId==4)
                                            بدء الجلسة الخامسة
                                            @elseif ($OrgmaxSessionId==5)
                                            بدء الجلسة السادسة
                                            @elseif ($OrgmaxSessionId==6)
                                            بدء الجلسة السابعة
                                            @elseif ($OrgmaxSessionId==7)
                                            بدء الجلسة الثامنة
                                            @elseif ($OrgmaxSessionId==8)
                                            بدء الجلسة التاسعة
                                            @elseif ($OrgmaxSessionId==9)
                                            بدء الجلسة العاشرة
                                            @elseif ($OrgmaxSessionId>=10)
                                            بدء الجلسة  {{++$OrgmaxSessionId}}
                                            @endif
                                        
                                        <i class="far fa-play-circle"></i></a>
                                   @endif
                               @endif
                            @endif

                            @if(strtotime($session->date)<=strtotime(date('Y-m-d')))  
                               <a class='session_icon' data-toggle="tooltip" data-placement="top" title="" data-original-title="قائمة الحضور"   href="
                                @if($session->hasZoom==0)
                                   {{url('instructor/courses/session/'.$session->id.'/attendance')}}
                                @else 
                                   @if($session->hasZoom==2)
                                    {{url('instructor/courses/session/'.$session->id.'/attendance')}}
                                   @else 
                                     '#'
                                   @endif
                                @endif
                            " target="_blanck"><i class="fa fa-list"></i></a>
                            @endif 
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    @endif
</div>



<script>
    function submit(id){
        $('#add-course-dates-'+id).submit();
    }
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
        setTimeout(function(){ $('.alert').hide(); }, 5000);
        $('#dtBasicExample').DataTable({
            "searching": false ,
            "language": {
                "lengthMenu": "عرض _MENU_ دورة في الصفحة الواحدة",
                "zeroRecords": "لا يوجد دورات",
                "info": "الصفحة رقم _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد", 
                "infoFiltered": "(نتيجة البحث من _MAX_  دورات)",
                "search": "بحث  ",
                "paginate": {
                    "next": "التالي",
                    "previous": "السابق",
                },},
                "order": [[ 2, "asc" ]],
                 dom: 'B<"clear">lfrtip',
                 buttons: true,
                 buttons: [
                        @if($course->type == 'live')
                           {text: 'قائمة الحضور الكلى', action: function ( e, dt, node, config ) {window.open("{{url('instructor/courses/'.$course->id.'/attendance')}}", '_blank').focus();}},
                           {text: 'أضافة جلسة اون لاين', action: function ( e, dt, node, config ) { $("form#add-Appointment-form #hasZoom").val("2");$('#AddNewSessionButton').trigger('click');}},
                        @elseif($course->type == 'face_to_face')
                           {text: 'قائمة الحضور الكلى', action: function ( e, dt, node, config ) {window.open("{{url('instructor/courses/'.$course->id.'/attendance')}}", '_blank').focus();}},
                           {text: 'اضافة يوم جديد', action: function ( e, dt, node, config ) { $("form#add-Appointment-form #hasZoom").val("0");$('#AddNewSessionButton').trigger('click');}},
                        @elseif($course->type == 'blended')
                           {text: 'قائمة الحضور الكلى', action: function ( e, dt, node, config ) {window.open("{{url('instructor/courses/'.$course->id.'/attendance')}}", '_blank').focus();}},
                           {text: 'أضافة جلسة اون لاين', action: function ( e, dt, node, config ) { $("form#add-Appointment-form #hasZoom").val("2"); $('#AddNewSessionButton').trigger('click');}},
                           {text: 'اضافة يوم جديد', action: function ( e, dt, node, config ) { $("form#add-Appointment-form #hasZoom").val("0");$('#AddNewSessionButton').trigger('click');}},
                        @endif
                        ],
            
        });
        $('.dataTables_length').addClass('bs-select');
    })

    $(document).on('click', 'a#delete', function(e) {
        e.preventDefault(); 
        Swal.fire({
        title: 'هل أنت متأكد ؟',
        text: "لن تتمكن من التراجع عن هذا!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'نعم',
        cancelButtonText: 'إلغاء'
        }).then((result) => {
            if (result.value) {
                window.location = $(this).attr('href');
            }
        })
    });

    $(document).on('click', '#startNewSessionevent', function(e) {
            $("div.spanner").removeClass("hide");
            $("div.spanner").addClass("show");
            $.ajax({
                    data: {"_token": "{{ csrf_token() }}"},
                    type: 'GET',
                    url:$(this).attr('href'),
                    success: function(result) {
                            window.open(result, "_blank"); 
                            setTimeout(function(){
                            location.reload();
                            }, 9000);
                    }
            });
        return false;
        });

</script>
