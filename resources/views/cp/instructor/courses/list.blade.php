@include('cp.common.dashboard-header', ['role' => 2])
@include('cp.common.sidebar_instructor', ['active' => 'instructor-courses-'.$type])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">قائمة الدورات {{$type=='current'? "الحالية" : "السابقة"}}</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 5px">
                            <div class="row justify-content-center">
                                <div class="col-md-12 table-container">
                                    <table id="dtBasicExample" class="table" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="th-sm text-center">#</th>
                                                <th class="th-sm text-center">رمز الدورة</th>
                                                <th class="th-sm text-center">العنوان</th>
                                                <th class="th-sm text-center">النوع</th>
                                                <th class="th-sm text-center">الفئة</th>
                                                <th class="th-sm text-center">التصنيف</th>
                                                <th class="th-sm text-center">المقاعد</th>
                                                <th class="th-sm text-center">الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($courses as $course)
                                            <tr class="odd">
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
                                                <td class="text-center">{{ $course->category->title_ar }}</td>
                                                <td class="text-center">{{ $course->classification->title_ar }}</td>
                                                <td class="text-center">{{ $course->seats }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-info" href="{{route('instructor-courses-view',['id' => $course->id, 'type' => $type])}}" data-toggle="tooltip" data-placement="top" title="تفاصيل الدورة"><i style="position: relative; top: -2px; right: -4px" class="fa fa-building"></i></a>
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
            "searching": false ,
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

</script>
