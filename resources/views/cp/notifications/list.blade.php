@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'notify-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">

                            <h3 class="widget-title">{{__('app.Notifications')}}</h3>
                            </div>
                        </div>

                        <div class="card-body" style="padding: 0 15px">
                            <div class="row justify-content-center">
                                <div class="col-md-12 table-container">
                                    @if (session('added'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            {{ session('added') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if (session('deleted'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            {{ session('deleted') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    @if (session('updated'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            {{ session('updated') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif

                                    <table id="dtBasicExample" class="table" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="th-sm text-center">#</th>
                                                <th class="th-sm text-center">{{__('app.Arabic Title')}}</th>
                                                <th class="th-sm text-center">{{__('app.Sending_to')}}</th>
                                                <th class="th-sm text-center"> {{__('app.Type')}}</th>
                                                <th class="th-sm text-center">{{__('app.Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as  $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">{{ $item->title_ar }}</td>
                                                <td class="text-center">{{ $item->sending_to }}</td>
                                                <td class="text-center">{{ $item->type }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-info" href="{{route('notify-update',['id' => $item->id])}}" data-toggle="tooltip" data-placement="top" title="تعديل"><i style="position: relative; top: -2px; right: -4px" class="fa fa-edit"></i></a>
                                                    <a id="delete" href="{{route('delete-notify',['id' => $item->id])}}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="حذف"><i style="position: relative; top: -2px; right: -2px" class="fa fa-times"></i></a>
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
@include('cp.common.dashboard-footer')

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('#dtBasicExample').DataTable({
            "language": {
                "lengthMenu": "عرض _MENU_ تصنيف في الصفحة الواحدة",
                "zeroRecords": "لا يوجد مواد",
                "info": "الصفحة رقم _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد", 
                "infoFiltered": "(نتيجة البحث من _MAX_ تصنيفات)",
                "search": "بحث  ",
                "paginate": {
                    "next": "التالي",
                    "previous": "السابق",
                }
            }
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
