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
                        <td class="priority text-center">
                            @if(App\Http\Controllers\CourseAppointmentController::isSessionStillValid($session->date,$session->from_time,$session->to_time))
                               @if($session->hasZoom==0) <!--normal session-->
                                 <a class='session_icon allowattand' data-placement="top"  data-original-title="أتاحة الحضور" data-toggle="modal" data-target="#allowattandance_{{$session->id}}" href="#"><i class="fa fa-desktop"></i></a>
                               @else
                                 <a class='session_icon' data-toggle="tooltip" data-placement="top" title="" data-original-title="زوم" href="{{isset($session->webinar)?$session->webinar->start_url:'#'}}" target="_blanck"><i class="far fa-play-circle"></i></a>
                               @endif
                            @endif

                            @if(strtotime($session->date)<=strtotime(date('Y-m-d')))  
                               <a class='session_icon' data-toggle="tooltip" data-placement="top" title="" data-original-title="ملفات الحضور"   href="
                                @if($session->hasZoom==0)
                                   {{url('instructor/courses/session/'.$session->id.'/attendance')}}
                                @else
                                   @if(isset($session->webinar))
                                     {{url('instructor/courses/webinar/'.$session->webinar->id.'/attendance')}}
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
        $('[data-toggle="tooltip"]').tooltip()
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
                           {text: 'أضافة زووم', action: function ( e, dt, node, config ) { $('#AddNewZoomSessionButton').trigger('click');}},
                        @elseif($course->type == 'face_to_face')
                           {text: 'اضافة يوم جديد', action: function ( e, dt, node, config ) { $('#AddNewSessionButton').trigger('click');}},
                        @elseif($course->type == 'blended')
                           {text: 'اضافة زووم ', action: function ( e, dt, node, config ) { $('#AddNewZoomSessionButton').trigger('click');}},
                           {text: 'اضافة يوم جديد', action: function ( e, dt, node, config ) { $('#AddNewSessionButton').trigger('click');}},
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
</script>
