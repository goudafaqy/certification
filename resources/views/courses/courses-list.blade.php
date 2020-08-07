@include('common.dashboard-header')
@include('common.sidebar', ['active' => 'courses-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">قائمة الدورات المتاحة</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 5px">
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
                                                <th class="th-sm text-center">رمز الدورة</th>
                                                <th class="th-sm text-center">العنوان</th>
                                                <th class="th-sm text-center">النوع</th>
                                                <th class="th-sm text-center">المدرب</th>
                                                <th class="th-sm text-center">الفئة</th>
                                                <th class="th-sm text-center">التصنيف</th>
                                                <th class="th-sm text-center">السعر</th>
                                                <th class="th-sm text-center">الخصم</th>
                                                <th class="th-sm text-center">صورة</th>
                                                <th class="th-sm text-center">الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">{{ $course->code }}</td>
                                                <td class="text-center">{{ $course->title_ar }}</td>
                                                <td class="text-center">{{ $course->type }}</td>
                                                <td class="text-center">{{ $course->instructor }}</td>
                                                <td class="text-center">{{ $course->category }}</td>
                                                <td class="text-center">{{ $course->classification }}</td>
                                                <td class="text-center">{{ $course->price }} ريال</td>
                                                <td class="text-center">{{ $course->discount }} %</td>
                                                <td class="text-center">
                                                    <a href="{{$course->image}}" class="btn btn-default" target="_blanck"><i class="fa fa-link"></i></a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-warning" href="/courses/materials/<?php echo $course->id; ?>" data-toggle="tooltip" data-placement="top" title="الملفات"><i style="position: relative; top: -2px; right: -4px" class="fa fa-file"></i></a>
                                                    <a class="btn btn-warning" href="/courses/appointments/<?php echo $course->id; ?>" data-toggle="tooltip" data-placement="top" title="المواعيد"><i style="position: relative; top: -2px; right: -2px" class="fa fa-clock"></i></a>
                                                    <a class="btn btn-info" href="/courses/update/<?php echo $course->id; ?>" data-toggle="tooltip" data-placement="top" title="تعديل"><i style="position: relative; top: -2px; right: -4px" class="fa fa-edit"></i></a>
                                                    <a id="delete" href="/courses/delete-course/<?php echo $course->id; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="حذف"><i style="position: relative; top: -2px; right: -2px" class="fa fa-times"></i></a>
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
@include('common.dashboard-footer')

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('#dtBasicExample').DataTable({
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
