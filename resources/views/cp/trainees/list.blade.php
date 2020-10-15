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

                            <h3 class="widget-title"> المتدربون فى دورة <strong>{{$course->name}} </strong></h3>
                            <a href="{{ $route }}" class="menu-item">  <img src="{{ asset('images/add.png') }}" style="width: 20px"> إضافة متدرب جديد </a>
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
                                                <th class="th-sm text-center">الاسم</th>
                                                <th class="th-sm text-center">البريد الالكترونى</th>
                                                <th class="th-sm text-center">رقم الهوية</th>
                                                <th class="th-sm text-center">الجنس </th>
                                                <th class="th-sm text-center">معاينة الشهادة </th>
                                                <th class="th-sm text-center">الاعدادت</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($items as  $item)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">{{ $item->name }}</td>
                                                <td class="text-center">{{ $item->email }}</td>
                                                <td class="text-center">{{ $item->national_id }}</td>
                                                <td class="text-center">@if($item->sex==0)أنثى @else ذكر  @endif</td>
                                                <td class="text-center">    
                                                       <select name="TraineeCourses" class="TraineeCourses">
                                                            @foreach($item->courses as $course)
                                                                <option value="{{$course->id}}:{{ $item->national_id }}">{{$course->name}}</option>
                                                            @endforeach    
                                                        <select>
                                                </td>
                                                <td class="text-center">
                                                    <!--http://jtc-certificate.com/public/view/1107474890/16-->
                                                  
                                                    <a class="btn btn-info" href="{{route('trainees-update',['course' => $item->course ,'id' => $item->id])}}" data-toggle="tooltip" data-placement="top" title="تعديل"><i style="position: relative; top: -2px; right: -4px" class="fa fa-edit"></i></a>
                                                    <a id="delete" href="{{route('delete-trainees',['course' => $item->course ,'id' => $item->id])}}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="حذف"><i style="position: relative; top: -2px; right: -2px" class="fa fa-times"></i></a>
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

    $('.TraineeCourses').change(function(){
        var data=$(this).val();
        var data=data.split(':');
        var course_id=data[0];
        var nationa_id=data[1];
        var cert_url="http://jtc-certificate.com/public/view/"+nationa_id+"/"+course_id;
        window.open(cert_url,'_blank');
    });



        $('[data-toggle="tooltip"]').tooltip()
        $('#dtBasicExample').DataTable({
            "searching": false ,
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
