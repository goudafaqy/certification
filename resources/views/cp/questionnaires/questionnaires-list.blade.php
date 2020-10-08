@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'classifications-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">قائمة الإستبيانات</h3>
                                <a href="{{ route('questionnaires-add') }}" class="menu-item "> <img
                                        src="{{ asset('images/add.png') }}" style="width: 20px"> إضافة إستبيان جديد </a>
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
                                            <th class="th-sm text-center">عنوان الإستبيان</th>
                                            <th class="th-sm text-center">تاريخ النشر</th>
                                            <th class="th-sm text-center">الإجراءات</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($questionnaires as $questionnaire)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">{{ $questionnaire->name }}</td>
                                                <td class="text-center">{{ $questionnaire->publish_date }}</td>
                                                <td class="text-center">
                                                    @if($questionnaire->publish_date < date("Y-m-d"))
                                                        <a class="btn btn-secondary"
                                                           href="{{route('questionnaires-show', ['id' => $questionnaire->id])}}"
                                                           data-toggle="tooltip" data-placement="top" title="تعديل">
                                                            <i style="position: relative; top: -2px; right: -4px"
                                                               class="fa fa-eye"></i>
                                                        </a>

                                                    @else
                                                        <a class="btn btn-info"
                                                           href="{{route('questionnaires-update', ['id' => $questionnaire->id])}}"
                                                           data-toggle="tooltip" data-placement="top" title="تعديل">
                                                            <i style="position: relative; top: -2px; right: -4px"
                                                               class="fa fa-edit"></i>
                                                        </a>

                                                        <a id="delete"
                                                           href="{{route('delete-questionnaires', ['id' => $questionnaire->id])}}"
                                                           class="btn btn-danger" data-toggle="tooltip"
                                                           data-placement="top" title="حذف">
                                                            <i style="position: relative; top: -2px; right: -2px"
                                                               class="fa fa-times"></i>
                                                        </a>

                                                    @endif
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
            "searching": false,
            "language": {
                "lengthMenu": "عرض _MENU_ إستبيان في الصفحة الواحدة",
                "zeroRecords": "لا يوجد إستبيانات",
                "info": "الصفحة رقم _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد",
                "infoFiltered": "(نتيجة البحث من _MAX_ إستبيانات)",
                "search": "بحث  ",
                "paginate": {
                    "next": "التالي",
                    "previous": "السابق",
                }
            }
        });
        $('.dataTables_length').addClass('bs-select');
    })

    $(document).on('click', 'a#delete', function (e) {
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