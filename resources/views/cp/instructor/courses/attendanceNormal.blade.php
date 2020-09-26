@include('cp.common.dashboard-header', ['role' => 2])
@include('cp.common.sidebar_instructor', ['active' => 'instructor-courses-current'])
<div class="main-content">
    <div class="container-fluid">  
    <div class="card-body" style="padding: 0 15px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                  <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">
                                قائمة حضور لدورة {{$details['Course_title']}} ليوم {{$details['Appointment_date']}}
                                </h3>
                                <a href="{{route('instructor-courses-view',['id' => $details['Course_id'], 'type' => 'current'])}}"> الرجوع الى الدورة</a>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <div class="row justify-content-center">
                                <div class="col-md-12 table-container">
                                    <form id="instructorAttandenceaction" action="{{route('attend_traineesbyInstructor')}}" method="post">
                                    <input type="hidden" name="attandstatus" id="attandstatus" value="">
                                    @csrf
                                        <table id="dtBasicExample" class="table course-table" width="100%">
                                            <thead>
                                                <tr class="odd">
                                                    <th class="text-center">#</th>
                                                    <th class="text-center">الاسم</th>
                                                    <th class="text-center">الجلسة</th>
                                                    <th class="text-center">وقت الدخول</th>
                                                    <th class="text-center">حاضر/غائب</th>
                                                    <th class="text-center"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($attendances as $attendance)
                                                <tr >
                                                    <td class="text-center">{{$attendance['id']}}</td>
                                                    <td class="priority text-center">{{ $attendance['userName']}}</td>
                                                    <td class="priority text-center">
                                                    @if ($attendance['SessionID']==1)
                                                        الجلسة الاولى
                                                    @elseif ($attendance['SessionID']==2)
                                                        الجلسة الثانية
                                                    @elseif ($attendance['SessionID']==3)
                                                        الجلسة الثالثة
                                                    @elseif ($attendance['SessionID']==4)
                                                        الجلسة الرابعة
                                                    @elseif ($attendance['SessionID']==5)
                                                        الجلسة الخامسة
                                                    @elseif ($attendance['SessionID']==6)
                                                        الجلسة السادسة
                                                    @elseif ($attendance['SessionID']==7)
                                                    الجلسة السابعة
                                                    @elseif ($attendance['SessionID']==8)
                                                        الجلسة الثامنة
                                                    @elseif ($attendance['SessionID']==9)
                                                        الجلسة التاسعة
                                                    @elseif ($attendance['SessionID']==10)
                                                        الجلسة العاشرة
                                                    @elseif ($attendance['SessionID']>=11)
                                                        الجلسة {{$attendance['SessionID']}}
                                                    @endif
                                                    </td>
                                                    <td class="priority text-center">{{ $attendance['attand_time']}}</td>
                                                    <td class="priority text-center"><span id="attandstatusajax-{{$attendance['id']}}">{{ $attendance['attand'] == 1 ? "حاضر" : "غائب"}}</span></td>
                                                    <td class="priority text-center">
                                                        <div class="content-switch">
                                                            <label class="switch">
                                                                <input {{$attendance['attand'] == 1 ? "checked" : ""}}  type="checkbox"  sessionId="{{$attendance['id']}}" userId="{{$attendance['user_id']}}" id="attend-{{$attendance['id']}}">
                                                                <span class="slider round"></span>
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>
                                 </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@include('cp.common.dashboard-footer')

<script>
    $(document).ready(function() {
    document.title = "قائمة حضور دورة {{$details['Course_title']}} ليوم {{$details['Appointment_date']}}";
        $("input[id^='attend-']").on('change',function () {
            console.log(this.checked)
            var attend = 0;
            if (this.checked) {
                attend = 1;
            }
            
        });

      var table= $('#dtBasicExample').DataTable({
            "searching": true ,
            "language": {
                "lengthMenu": "عرض _MENU_ دورة في الصفحة الواحدة",
                "zeroRecords": "لا يوجد حضور",
                "info": "الصفحة رقم _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد", 
                "infoFiltered": "(نتيجة البحث من _MAX_  الطلاب)",
                "search": "بحث  ",
                "paginate": {
                    "next": "التالي",
                    "previous": "السابق",
                },},
                "order": [[ 1, "asc" ]],
                 rowGroup: {dataSrc: [ 1 ]},
                "select":true,'columnDefs': [ { 'targets': 0, 'checkboxes': {'selectRow': true}}],
                'select': {'style': 'multi'},
                dom: 'B<"clear">lfrtip',
                buttons: true,
                buttons: [{
                            extend: 'copy',
                            text: 'نسخ البيانات',
                            exportOptions: {
                                        modifier: {
                                            page: 'current'
                                        }}
                        },  
                        {
                            extend: 'excel',
                            text: 'تصدير ملف اكسيل',
                            exportOptions: {
                                        modifier: {
                                            page: 'current'
                                        }}
                        },
                        {
                            extend: 'print',
                            text: 'طباعة',
                            autoPrint: false,
                            messageTop: "قائمة حضور دورة {{$details['Course_title']}} ليوم {{$details['Appointment_date']}}",
                            exportOptions: {
                                        modifier: {
                                            page: 'current'
                                        }}
                        },{
                        text: 'حاضر',
                        action: function ( e, dt, node, config ) {
                            $('#attandstatus').val("1");
                            $('#instructorAttandenceaction').submit();
                        }},
                        {
                        text: 'غائب',
                        action: function ( e, dt, node, config ) {
                            $('#attandstatus').val("0");
                            $('#instructorAttandenceaction').submit();
                            }}
                        ],
                });
        $('.dataTables_length').addClass('bs-select');


        $('form#instructorAttandenceaction').on('submit', function(event){
            var form = this;
            var rows_selected = table.column(0).checkboxes.selected();
            $.each(rows_selected, function(index, rowId){
                $(form).append( $('<input>').attr('type', 'hidden').attr('name', 'ids[]').val(rowId));
            });
            event.preventDefault();
                $.ajax({
                    data: $(this).serialize(),
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    success: function(data) {
                       location.reload(); 
                    }
                });
                return false;  
        });
       
    $("input[id^='attend-']").on('change',function () {
        var form = $("form#instructorAttandenceaction");
        var status="";
        var sessionId=$(this).attr('sessionId');
        if (this.checked) {
            $(form).append( $('<input>').attr('type', 'hidden').attr('name', 'ids[]').val(sessionId));
            $(form).find('#attandstatus').val("1");
            status="حاضر";
        }
        else{
            $(form).append( $('<input>').attr('type', 'hidden').attr('name', 'ids[]').val(sessionId));
            $(form).find('#attandstatus').val("0");
            status="غائب";
        }
        $.ajax({
            data: $(form).serialize(),
            type: $(form).attr('method'),
            url: $(form).attr('action'),
            success: function(data) {
                $('#attandstatusajax-'+sessionId).text(status);
            }
        });
        });
    });
</script>
