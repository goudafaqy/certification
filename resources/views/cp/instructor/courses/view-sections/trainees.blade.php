
<div class="outer-container">
    @if(!isset($trainees))
    <div class="row justify-content-center">
        <div class="col-12" style="color: #FFF;">
            <div class="alert alert-info">
                لا يوجد متدربين لهذه الدورة <i class="fa fa-exclamation-circle"></i>
            </div>
        </div>
    </div>
    @else
  <button type="button" id="SendEmailButton" data-toggle="modal" data-target="#SendEmail" style="display:none"></button>
    <form id="generatecertifacte" action="{{route('generate_certificates')}}" method="post">
    @csrf
    <input type="hidden" value="{{$course->id}}" name="course">
    <div class="row justify-content-center">
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
            <table id="dtBasicExample" class="table course-table" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">اسم الطالب</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <input type="hidden" value="{{$course->id}}" name="course" >
                    @foreach ($trainees as $trainee)
                    <tr>
                        <td class="text-center">{{ $trainee->id }}</td>
                        <td class="priority text-center">{{ $trainee->name_ar }}</td>
                    </tr>
                    @endforeach
                    
                   
                </tbody>
            </table>
        </div>
    </div>
    </form>
    @endif

    
</div>



<script>
@if(isset($trainees))
    $(document).ready(function () {
        setTimeout(function(){ $('.alert').hide(); }, 5000);
        document.title = "{{$course->title}}:المتدربين";
         var table= $('#dtBasicExample').DataTable({
            "searching": true ,
            "language": {
                "lengthMenu": "عرض _MENU_ طالب في الصفحة الواحدة",
                "zeroRecords": "لا يوجد طلاب",
                "info": "الصفحة رقم _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد",
                "infoFiltered": "(نتيجة البحث من _MAX_ طالب)",
                "search": "بحث  ",
                "paginate": {
                    "next": "التالي",
                    "previous": "السابق",
                }
            },
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
                        exportOptions: {
                                      modifier: {
                                          page: 'current'
                                       }}
                       },
                       {
                       text: 'أرسل بريد',
                       action: function ( e, dt, node, config ) {
                           $('#SendEmailButton').trigger('click');
                       }},
                       {
                       text: 'أعتماد الشهادات',
                       action: function ( e, dt, node, config ) {
                           $('#generatecertifacte').submit();
                        }}
                     ],
        });
        $('.dataTables_length').addClass('bs-select');



 $('form#generatecertifacte').on('submit', function(event){
     //event.preventDefault();
      var form = this;
      var rows_selected = table.column(0).checkboxes.selected();
      if(rows_selected.length==0){
       alert("لابد من اختيار الطلاب");
        return false;
      }
        else{ 
            $.each(rows_selected, function(index, rowId){
                $(form).append( $('<input>').attr('type', 'hidden').attr('name', 'ids[]').val(rowId));
            });
            //alert($(this).serialize());
            return true;
        }
         
   });





    });
  @endif  
</script>
