


<div class="outer-container">
    @if(!isset($sessions))
    <div class="row">
        <div class="col-12" style="color:#283045;">
            <div class="alert alert-info">
                لا يوجد محاضرات لهذه الدورة <i class="fa fa-exclamation-circle"></i>
            </div>
        </div>
    </div>
    @else

    <div class="card-body" style="padding: 0 15px">
        <div class="row justify-content-center">
            <div class="col-md-12">
         
            <table id="dtBasicExample" class="table course-table" width="100%">
                <thead>
                    <tr class="odd">
                        <th class="th-sm text-center">#</th>
                        <!-- <th class="text-center">اسم الدورة</th> -->
                        <th class="th-sm text-center">اليوم</th>
                        <th class="th-sm text-center">تاريخ المحاضرة</th>
                        <th class="th-sm text-center">وقت بداية المحاضرة</th>
                        <th class="th-sm text-center">وقت نهاية المحاضرة</th>
                        <th class="th-sm text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sessions as $session)
                    <tr class="odd" style="color:#283045;line-height:3.5rem">
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <!-- <td class="priority text-center">{{ $session->title }}</td> -->
                        <td class="text-center">{{ $session->day }}</td>
                        <td class="text-center">{{ $session->date }}</td>
                        <td class="text-center">{{ explode(" ", $session->from_time)[0] }} @if(explode(" ", $session->from_time)[1] == 'AM') مساءً @else صباحاً @endif</td>
                        <td class="text-center">{{ explode(" ", $session->to_time)[0] }} @if(explode(" ", $session->to_time)[1] == 'AM') مساءً @else صباحاً @endif</td>
                        <td class="text-center">
                            <a style="padding: 10px 13px;background:#639fd3;color: #fff;border-radius:5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="زوم"   href="{{isset($session->webinar)?$session->webinar->start_url:'#'}}" target="_blanck"><i class="far fa-play-circle"></i></a>
                            <a style="padding: 10px 13px;background:#28304585;color: #fff;border-radius:5px;" data-toggle="tooltip" data-placement="top" title="" data-original-title="ملفات" style="padding:8px;background:#2dce89;border-radius:5px;"  href="{{isset($session->webinar)?url('instructor/courses/webinar/'.$session->webinar->id.'/attendance'):'#'}}" target="_blanck"><i class="fa fa-list"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div>
    @endif
</div>



<script>

    function submit(id){
        $('#add-course-dates-'+id).submit();
    }
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
