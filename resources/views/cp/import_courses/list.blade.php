@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'testmonials-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">

                            <h3 class="widget-title">الدورات التدريبة</h3>
                            <a href="{{ route('courses-add') }}" class="menu-item">  <img src="{{ asset('images/add.png') }}" style="width: 20px"> إضافة دورة جديد </a>
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
                                                <th class="th-sm text-center">اسم الدورة</th>
                                                <!--<th class="th-sm text-center">التاريخ</th>-->
                                                <th class="th-sm text-center">بواسطة</th>
                                                <th class="th-sm text-center">المتدربين</th>
                                                <th class="th-sm text-center" colspan="2">الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as  $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">{{ $item->name }}</td>
                                                <td class="text-center">{{ $item->date }}</td>
                                                <td class="text-center">{{ (!empty($item->getUser)) ? $item->getUser->name :'-' }}</td>
                                                <td class="text-center"><a href="{{ route('trainees-list',['course'=>$item->id])}}"><i style="position: relative; top: -2px; right: -4px" class="fa fa-users"></i></a></td>
                                                <td class="text-center"><a class="btn btn-danger" id="delete" href="{{ route('delete-course',['id'=>$item->id])}}">حذف<i style="position: relative; top: -2px; right: -4px" class="fa fa-times"></i></a></td>
                                                <td class="text-center"><a class="btn btn-info" href="{{ route('edit-course',['id'=>$item->id])}}">تعديل<i style="position: relative; top: -2px; right: -4px" class="fa fa-edit"></i></a></td>                             
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
            "searching": true ,
            "language": {
                "lengthMenu": "عرض _MENU_ دورة في الصفحة الواحدة",
                "zeroRecords": "لا يوجد مواد",
                "info": "الصفحة رقم _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد", 
                "infoFiltered": "(نتيجة البحث من _MAX_ دورات)",
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
