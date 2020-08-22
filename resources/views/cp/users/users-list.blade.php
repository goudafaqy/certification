@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'users-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">قائمة المستخدمين</h3>
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
                                                <th class="th-sm text-center">الإسم بالعربي</th>
                                                <th class="th-sm text-center">الإسم بالإنجليزي</th>
                                                <th class="th-sm text-center">اسم المستخدم</th>
                                                <th class="th-sm text-center">البريد الإلكتروني</th>
                                                <th class="th-sm text-center">الدور الوظيفي</th>
                                                <th class="th-sm text-center">الفاعلية</th>
                                                <th class="th-sm text-center">الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                <td class="text-center">{{ $user->name_ar }}</td>
                                                <td class="text-center">{{ $user->name_en }}</td>
                                                <td class="text-center">{{ $user->username }}</td>
                                                <td class="text-center">{{ $user->email }}</td>
                                                <td class="text-center">
                                                    @if(count($user->roles) == 0)
                                                        لا يوجد
                                                    @else
                                                        @foreach($user->roles as $role)
                                                        <span class="role-label">{{$role->role}}</span>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if($user->active)
                                                        <i style="font-size: 1.3em;" class="fa fa-check-circle text-success"></i>
                                                    @else
                                                        <i style="font-size: 1.3em;" class="fa fa-times-circle text-danger"></i>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-info" href="/users/update/<?php echo $user->id; ?>" data-toggle="tooltip" data-placement="top" title="تعديل"><i style="position: relative; top: -2px; right: -4px" class="fa fa-edit"></i></a>
                                                    <a id="delete" href="/users/delete-user/<?php echo $user->id; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="حذف"><i style="position: relative; top: -2px; right: -2px" class="fa fa-times"></i></a>
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
                "lengthMenu": "عرض _MENU_ مستخدم في الصفحة الواحدة",
                "zeroRecords": "لا يوجد مستخدمين",
                "info": "الصفحة رقم _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد", 
                "infoFiltered": "(نتيجة البحث من _MAX_ مستخدمين)",
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
