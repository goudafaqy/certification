@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'courses-list'])
<div class="main-content">
    <div class="container-fluid">
        @if(count($appointments) == 0)
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card" style="padding-bottom: 30px;">
                        <!-- <div class="overlay"></div> -->
                        <div class="spanner">
                            <div class="loader"></div>
                        </div>
                        <div class="widget-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">{{ $course->title_ar }}   (<a href="{{ route('courses-list') }}#{{$course->code}}"> <code style="font-weight: bold;">{{ $course->code }}</code> </a>)</h3>
                                <a style="font-size: 1.1em;" href="{{ route('courses-list') }}" class="widget-title">قائمة الدورات <i class="fa fa-arrow-left"></i></a>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">                           
                         <form id="form" action="{{ route('generate-appointment') }}" method="POST">
                                @csrf
                                <div class="row justify-content-center" style="padding: 20px 50px;">
                                    <div class="col-md-6">
                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                        <input type="hidden" name="title" value="{{ $course->title_ar }}">
                                        <label for="start_date" style="font-size:11px">تاريخ بداية الدورة</label>
                                        <div class="form-group input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text icon-dates" id="basic-addon1"><i class="fas fa-calendar-week"></i></span> 
                                            </div>
                                            <input min="{{ $course->reg_start_date }}" value="{{ old('start_date') }}" class="form-control @error('start_date') is-invalid @enderror" type="date" onfocus="(this.type = 'date')" name="start_date" id="date" style=" padding-right:50px !important; ">
                                            @error('start_date')
                                                <span class="text-danger err-msg-start_date" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="end_date">وقت بداية المحاضرة</label>
                                            <div class='input-group date1' id='datetimepicker3'>
                                                <input type='text' class="form-control" name="from_time" id="from_time" />
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="end_date">وقت نهاية المحاضرة</label>
                                            <div class='input-group date1' id='datetimepicker4'>
                                                <input type='text' class="form-control" name="to_time"  id="to_time"/>
                                                <span class="input-group-addon">
                                                    <span class="glyphicon glyphicon-time"></span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center" style="padding: 5px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="week_days">أيام الدورة</label>
                                            <select multiple title="لا يوجد" class="form-control selectpicker @error('week_days') is-invalid @enderror" id="week_days" name="week_days[]">
                                                <option value="6">السبت</option>
                                                <option value="0">الأحد</option>
                                                <option value="1">الإثنين</option>
                                                <option value="2">الثلاثاء</option>
                                                <option value="3">الأربعاء</option>
                                                <option value="4">الخميس</option>
                                                <option value="5">الجمعة</option>
                                            </select>
                                        </div>
                                        @error('week_days')
                                            <span class="text-danger err-msg-week_days" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="num_of_repeat">عدد مرات التكرار اسبوعياً</label>
                                            <input value="{{ old('num_of_repeat') }}" type="number" class="form-control @error('num_of_repeat') is-invalid @enderror" id="num_of_repeat" name="num_of_repeat">
                                        </div>
                                        @error('num_of_repeat')
                                            <span class="text-danger err-msg-num_of_repeat" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-3">
                                        <button style="width: 100%; margin-top: 20px;" type="button" id="generate" class="btn btn-primary">استخراج مواعيد الدورة</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">{{ $course->title_ar }}   ( <a href="{{ route('courses-list') }}#{{$course->code}}"> <code style="font-weight: bold;">{{ $course->code }}</code> </a> )</h3>
                              
                                @if($course->zoom == 0)
                                <a href="/courses/appointments/reset/<?php echo $course->id; ?>" style="color: #FFF; padding: 10px;" class="btn btn-primary">إعادة إستخراج مواعيد الدورة <i class="fa fa-sync-alt"></i></a>
                                @endif
                                @if($course->type == 'live' ||$course->type == 'blended') 
                                @if($course->zoom == 0)
                                <form id="secheduleOnZoom" action="{{ route('scheduleOnZoom-appointment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="course_id" value="<?php echo $course->id; ?>">
                                <button style="color: #FFF; padding: 10px;" type="submit" class="btn btn-primary">جدولة على زوم<i class="fa fa-calendar"></i></button>
                                </form>
                                @else
                                <div class="alert alert-success" style="padding: 10px 50px; border-radius: 3px;">
                                    <b>جارى جدولة الموعيد على زووم <i class="fa fa-check-circle"></i></b>
                                </div>
                                @endif
                                @endif
                                <a style="font-size: 1.1em;" href="{{ route('courses-list') }}" class="widget-title">قائمة الدورات <i class="fa fa-arrow-left"></i></a>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 30px 20px">
                            <div class="row" style="padding: 0 15px">
                                <div class="col-md-12">
                                    @if (session('deleted'))
                                        <div class="alert alert-success alert-dismissible fade show">
                                            {{ session('deleted') }}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    @endif
                                    <table id="dtBasicExample" class="table" width="100%">
                                        <thead>
                                            <tr>
                                                <th class="th-sm text-center">#</th>
                                                <th class="th-sm text-center">عنوان الدورة</th>
                                                <th class="th-sm text-center">التاريخ الفعلي</th>
                                                <th class="th-sm text-center">اليوم</th>
                                                <th class="th-sm text-center">وقت البداية</th>
                                                <th class="th-sm text-center">وقت النهاية</th>
                                                @if($course->zoom == 0)
                                                <th class="th-sm text-center">الإجراءات</th>
                                                @else
                                                <th class="th-sm text-center"> الجدولة؟</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($appointments as $appointment)
                                            <tr>
                                                <td class="text-center">
                                                @if($course->zoom == 0)
                                                {{ $appointment->id }}
                                                @else
                                                {{ $loop->index+1 }}
                                                @endif
                                                </td>
                                                <td class="text-center">{{ $appointment->title }}</td>
                                                <td class="text-center"> {{ $appointment->date }} </td>
                                                <td class="text-center">{{ $appointment->day }}</td>
                                                <td class="text-center">
                                                    @if(explode(" ", $appointment->from_time)[1] == 'PM')
                                                    {{ explode(" ", $appointment->from_time)[0] }} م
                                                    @else
                                                    {{ explode(" ", $appointment->from_time)[0] }} ص
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    @if(explode(" ", $appointment->to_time)[1] == 'PM')
                                                    {{ explode(" ", $appointment->to_time)[0] }} م
                                                    @else
                                                    {{ explode(" ", $appointment->to_time)[0] }} ص
                                                    @endif
                                                </td>
                                                @if($course->zoom == 0)
                                                <td class="text-center">
                                                    <a id="delete" href="/courses/appointments/delete/<?php echo $appointment->id; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="إلغاء الموعد"><i style="position: relative; top: -2px; right: -2px" class="fa fa-times"></i></a>
                                                </td>
                                                @else
                                                <td class="text-center">
                                                @if($appointment->hasZoom==0)
                                                <img src="{{ asset('images/face-to-face-meeting-icon.png') }}" width="35px">
                                                @endif
                                                @if($appointment->hasZoom==1)
                                                <img src="{{ asset('images/loading.gif') }}" width="28px">
                                                @endif
                                                @if($appointment->hasZoom==2)
                                                <img src="{{ asset('images/zoom-logo-transparent.png')}}" width="60px" >
                                                @endif

                                                </td>
                                                
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
</div>
@include('cp.common.dashboard-footer')
<script>

        $(document).on("click", '#generate', function () {
            $("div.spanner").removeClass("hide");
            $("div.spanner").addClass("show");
            $.ajax({
                    data: {"_token": "{{ csrf_token() }}","from_time":$('#from_time').val(),"to_time":$('#to_time').val()},
                    type: "POST",
                    url: "{{route('validate-appointment')}}",
                    success: function(result) {
                            if (result){
                            $.ajax({
                                data: $('#form').serialize(),
                                type: $('#form').attr('method'),
                                url: $('#form').attr('action'),
                                success: function(data) {
                                $("div.spanner").removeClass("show");
                                $("div.spanner").addClass("hide");
                                location.reload();
                                 }
                                });
                      } else{
                          alert("وقت النهاية لا يمكن ان يكون قبل وقت البداية");
                           $("div.spanner").removeClass("show");
                            $("div.spanner").addClass("hide");
                      }
                }
            });

       
    });

    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });

    $('#start_date').on('change', function(ev){
        $('.datepicker-inline').hide();
    });

    $('#end_date').on('change', function(ev){
        $('.datepicker-inline').hide();
    });

    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip();
         var table= $('#dtBasicExample').DataTable({
            "searching": true ,
            "language": {
                "lengthMenu": "عرض _MENU_ موعد في الصفحة الواحدة",
                "zeroRecords": "لا يوجد مواعيد",
                "info": "الصفحة رقم _PAGE_ من _PAGES_",
                "infoEmpty": "لا يوجد",
                "infoFiltered": "(نتيجة البحث من _MAX_ موعد)",
                "search": "بحث  ",
                "paginate": {
                    "next": "التالي",
                    "previous": "السابق",
                }
            },
            @if($course->type == 'blended' && $course->zoom == 0)
             "select":true,'columnDefs': [ { 'targets': 0, 'checkboxes': {'selectRow': true}}],'select': {'style': 'multi'}
            @endif
        });
        $('.dataTables_length').addClass('bs-select');


 // Handle form submission event
 $('form#secheduleOnZoom').on('submit', function(event){

      var form = this;
      var rows_selected = table.column(0).checkboxes.selected();
      // Iterate over all selected checkboxes
      $.each(rows_selected, function(index, rowId){
         $(form).append( $('<input>').attr('type', 'hidden').attr('name', 'id[]').val(rowId));
      });

     event.preventDefault();
            $.ajax({
                data: $(this).serialize(),
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                success: function(data) {
                    $(this).submit();
                    location.reload();
                }
            });
            return false;  
   });

    });

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
