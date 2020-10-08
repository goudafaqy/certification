@include('cp.common.dashboard-header-dialog', ['role' => 2])

<div class="main-content">
    <div class="container-fluid">  
    <div class="card-body" style="padding: 0 15px">
        <div class="row justify-content-center">
            <div class="col-md-12">              
                <table  class="table course-table" width="100%">
                    <thead>
                        <tr>
                            <th class="text-center">عدد الايام </th>
                            <th class="text-center">عدد الجلسات  </th>
                            <th class="text-center"> الجلسات التى حضرها</th>
                            <th class="text-center"> الجلسات المتغيب عنها</th>
                            <th class="text-center">نسبة الحضور </th>
                            <th class="text-center">نسبة الغياب  </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="stat">
                            <td class="priority text-center">{{$attandceDetails['Sumdays']}}</td>
                            <td class="priority text-center">{{$attandceDetails['SessionCount']}}</td>
                            <td class="priority text-center">{{$attandceDetails['AttandCount']}}</td>
                            <td class="priority text-center">{{$attandceDetails['AbsantCount']}}</td>
                            <td class="priority text-center @if($attandceDetails['attanddencePercantage']>50) green @else red @endif">
                                {{$attandceDetails['attanddencePercantage']}}%
                            </td>
                            <td class="priority text-center">{{$attandceDetails['abcentePercantage']}}%</td>
                        </tr>                                            
                    </tbody>
                </table>  
            </div>
        </div>                       
        <div class="row justify-content-center">
                <div class="col-md-12">                 
                            <form id="instructorAttandenceaction" action="{{route('attend_traineesbyInstructor')}}" method="post">
                            <input type="hidden" name="attandstatus" id="attandstatus" value="">
                            @csrf
                                <table id="dtBasicExample" class="table course-table" width="100%">
                                    <thead>
                                        <tr class="odd">
                                            <th class="text-center">اليوم</th>
                                            <th class="text-center">الجلسة</th>
                                            <th class="text-center">حاضر/غائب</th>
                                            <th class="text-center"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($attendances as $attendance)
                                        <tr >
                                            <td class="priority text-center">{{ $attendance['Appointment_date']}}</td>                                            
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
@include('cp.common.dashboard-footer-dialog')
<style>
    .dataTables_length{ display:none;}
    .dataTables_filter { display: none;}
    .stat{background-color: azure;border: 1px solid #555;}
    .green{background-color: green;color: #fff;}
    .red{background-color: red;color: #fff;}
</style>
<script>
    $(document).ready(function() {
      var table= $('#dtBasicExample').DataTable({
            "language": {
                "lengthMenu": "عرض _MENU_ يوم في الصفحة الواحدة",
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
                 //rowGroup: {dataSrc: [ 1 ]},
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
