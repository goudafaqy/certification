@include('cp.common.dashboard-header', ['role' => 2])
@include('cp.common.sidebar_instructor', ['active' => 'helpdesk'])
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
                                الدعم الفنى
                                </h3>
                                <a href="{{route('create-support-ticket')}}" > <img src="{{ asset('images/add.png') }}" style="width: 20px;"> إضافة تذكرة جديدة </a>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <div class="row justify-content-center">
                                <div class="col-md-12 table-container">
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
                                            <th class="text-center">العنوان</th>
                                            <th class="text-center">التاريخ</th>
                                            <th class="text-center">عدد التعليقات</th>
                                            <th class="text-center">الحالة</th>
                                            <th class="text-center">الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($tickets as $ticket)
                                            <tr class="odd" style="color:#283045;line-height:3.5rem">
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="priority text-center">{{ $ticket->subject }}</td>
                                                <td class="priority text-center">{{ $ticket->created_at }}</td>
                                                <td class="priority text-center">{{ count($ticket->comments) }}</td>
                                                <td class="priority text-center" style="color: {{$ticket->status->color}}">
                                                    {{ $ticket->status->name }}
                                                </td>
                                                <td class="text-center" style="text-align: center;">
                                                    <a href="{{route('support-show', ['ticketId' => $ticket->id])}}"
                                                       data-toggle="tooltip" data-placement="top" title="عرض" style="color: initial">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
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
    $(document).ready(function () {
        setTimeout(function(){ $('.alert').hide(); }, 5000);
        $('#dtBasicExample').DataTable({
            "searching": true ,
            "language": {
                "lengthMenu": "عرض _MENU_ تذكرة في الصفحة الواحدة",
                "zeroRecords": "لا يوجد تذاكر",
                "info": "الصفحة رقم _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد", 
                "infoFiltered": "(نتيجة البحث من _MAX_  تذاكر)",
                "search": "بحث  ",
                "paginate": {
                    "next": "التالي",
                    "previous": "السابق",
                },},
                "order": [[ 2, "asc" ]],
                 dom: 'B<"clear">lfrtip',
                 buttons: true,
                 buttons: [
                         
                        ],
            
        });
        $('.dataTables_length').addClass('bs-select');
    });
</script>