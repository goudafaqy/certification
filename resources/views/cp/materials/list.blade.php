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

                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('courses-update',['id' => $course_id])}}">{{$course->title_ar}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{__('app.Materials')}}</li>

                            </ol>
                            <a href="{{route('materials-add',['course_id' => $course_id])}}" > <img src="{{ asset('images/add.png') }}" style="width: 20px;"> {{__('app.New Material')}} </a>

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
                                                <th class="th-sm text-center">{{__('app.English Title')}}</th>
                                                <th class="th-sm text-center"> {{__('app.Material Type')}}</th>
                                                <th class="th-sm text-center">{{__('app.Actions')}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($materials as  $material)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">{{ $material->name_ar }}</td>
                                                <td class="text-center">{{ $material->name_en }}</td>
                                                <td class="text-center">{{ $material->type }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-info" href="{{route('materials-update',['course_id' => $material->course_id ,'id' => $material->id])}}" data-toggle="tooltip" data-placement="top" title="تعديل"><i style="position: relative; top: -2px; right: -4px" class="fa fa-edit"></i></a>
                                                    <a id="delete" href="{{route('delete-materials',['course_id' => $material->course_id ,'id' => $material->id])}}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="حذف"><i style="position: relative; top: -2px; right: -2px" class="fa fa-times"></i></a>
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
