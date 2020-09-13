@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'courses-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">قائمة الدورات </h3>
                                <a href="{{route('courses-add')}}" > <img src="{{ asset('images/add.png') }}" style="width: 20px;"> إضافة دورة جديدة </a>

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
                                                <th class="th-sm text-center">المقاعد</th>
                                                <th class="th-sm text-center">الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">{{ $course->code }}</td>
                                                <td class="text-center">{{ $course->title_ar }}</td>
                                                <td class="text-center">
                                                    @if($course->type == 'recorded')
                                                        دورات مسجلة
                                                    @elseif($course->type == 'face_to_face')
                                                        التدريب حضورياً  
                                                    @elseif($course->type == 'live')
                                                        التدريب عن بعد   
                                                    @else
                                                        تعليم مدمج
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $course->instructor->name_ar }}</td>
                                                <td class="text-center">{{ $course->category->title_ar }}</td>
                                                <td class="text-center">{{ $course->classification->title_ar }}</td>
                                                <td class="text-center">{{ $course->seats }}</td>
                                                <td class="text-center courses-actions">
                                                    <a class="btn btn-primary actions-btns" href="{{route('sections-list',['course_id' => $course->id])}}" data-toggle="tooltip" data-placement="top"  title="المخطط"><i style="position: relative; top: -4px; right: -4px" class="fa fa-building"></i></a>
                                                    <a class="btn btn-primary actions-btns" href="{{route('materials-list',['course_id' => $course->id])}}" data-toggle="tooltip" data-placement="top" title="الملفات"><i style="position: relative; top: -4px; right: -4px" class="fa fa-file"></i></a>
                                                    @if($course->type == 'face_to_face' || $course->type == 'live'||$course->type == 'blended')
                                                    <a class="btn btn-primary actions-btns" href="/courses/appointments/<?php echo $course->id; ?>" data-toggle="tooltip" data-placement="top" title="المواعيد"><i style="position: relative; top: -4px; right: -4px" class="fa fa-clock"></i></a>
                                                    @endif
                                                    @if($Current_date < $course->reg_start_date)
                                                    <a class="btn btn-primary actions-btns" href="/courses/update/<?php echo $course->id; ?>" data-toggle="tooltip" data-placement="top" title="تعديل"><i style="position: relative; top: -4px; right: -4px" class="fa fa-edit"></i></a>
                                                    @endif

                                                    @if($course->type != 'recorded')
                                                    <button data-toggle="modal" data-target="#duplicate_{{$course->id}}" class="btn btn-primary actions-btns" data-toggle="tooltip" data-placement="top" title="إعادة تشغيل"><i style="position: relative; top: -4px; right: -4px" class="fa fa-copy"></i></button>
                                                    @endif
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="duplicate_{{$course->id}}" tabindex="-1" role="dialog" aria-labelledby="duplicate{{$course->id}}" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <form id="add-course-dates-{{$course->id}}" action="{{ route('courses-duplicate') }}" method="POST">
                                                                    @csrf
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="duplicate{{$course->id}}">تحديد موعد التسجيل الجديد</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" style="font-size: 1.3em;">
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <label for="start_date" style="font-size:11px">تاريخ بدء التسجيل</label>
                                                                                <div class="form-group input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text icon-dates" id="basic-addon1"><i class="fas fa-calendar-week"></i></span> 
                                                                                    </div>
                                                                                    <input class="form-control" type="date" onfocus="(this.type = 'date')" name="reg_start_date" id="date" style=" padding-right:50px !important; ">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <label for="start_date" style="font-size:11px">تاريخ نهاية التسجيل</label>
                                                                                <div class="form-group input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <span class="input-group-text icon-dates" id="basic-addon1"><i class="fas fa-calendar-week"></i></span> 
                                                                                    </div>
                                                                                    <input class="form-control" name="reg_end_date" type="date" onfocus="(this.type = 'date')" id="date" style=" padding-right:50px !important; ">
                                                                                    <input class="form-control" name="course_id" type="hidden" value="{{$course->id}}">
                                                                                    <input class="form-control" name="code" type="hidden" value="{{$course->code}}">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button onclick="submit(<?php echo $course->id; ?>)" style="width: 100%; padding-bottom: 30px;" type="submit" class="btn btn-primary">إعادة تشغيل الدورة</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($Current_date < $course->reg_start_date)
                                                    <a id="delete" href="/courses/delete-course/<?php echo $course->id; ?>" class="btn btn-primary actions-btns" data-toggle="tooltip" data-placement="top" title="حذف"><i style="position: relative; top: -2px; right: -2px" class="fa fa-times"></i></a>
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

    function submit(id){
        $('#add-course-dates-'+id).submit();
    }
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip()
        $('#dtBasicExample').DataTable({
            "searching": true ,
            "select":true,
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
            },
            
                       

            initComplete: function( settings, json ) {
             auto_search(this);
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
