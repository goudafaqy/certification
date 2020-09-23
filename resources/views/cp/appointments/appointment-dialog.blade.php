<div class="card-body" id="add-Appointment-formResult" style="padding: 0 15px">
    <form id="add-Appointment-form" action="{{route('AddNewAppointment')}}" method="POST">
    <input type="hidden" name="course_id" value="{{$course->id}}">
    <input type="hidden" name="course_title" value="{{$course->title}}">
    <input type="hidden" name="course_type" value="{{request()->get('type')}}">
    <input type="hidden" name="hasZoom" value="" id="hasZoom">
    
    @csrf
    <div class="row justify-content-right" >
        <div class="col-md-12">
        <div class="alert alert-danger" id="errormessagehere" style="display:none;">  </div>
      </div>
    </div>         
    <div class="row justify-content-right" >
        <div class="col-md-12">
            <div class="form-group">
                <label for="name_ar">التاريخ</label>
                <input  type="date" min="{{ $course->reg_start_date }}"  class="form-control"  onfocus="(this.type = 'date')" name="date" id="date" >
            </div>
        </div>
    </div>    
    <div class="row justify-content-right" >
        <div class="col-md-12">
            <div class="form-group">
                <label for="cat_id">وقت البداية</label>
                 <div class='input-group date1' id='datetimepicker3'>
                    <input type='text' class="form-control" name="from_time" id="from_time" />
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>
            </div>
        </div>
    </div>
            
    <div class="row justify-content-right">
        <div class="col-md-12">    
             <div class="form-group">
            <label for="end_date">وقت النهاية </label>
            <div class='input-group date1' id='datetimepicker4'>
                <input type='text' class="form-control" name="to_time"  id="to_time"/>
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-time"></span>
                </span>
            </div>
        </div>
        </div>
    </div>    
    <div class="row justify-content-center">
        <div class="col-md-12">               
         <button style="width: 25%;" type="submit"  class="btn btn-primary">أضافة</button>
        </div>
    </div>                  
    </form>
</div>

<script>
    $(function () {
        $('#datetimepicker3').datetimepicker({
            format: 'LT'
        });
        $('#datetimepicker4').datetimepicker({
            format: 'LT'
        });
    });

    
  $('form#add-Appointment-form').on('submit', function(event){
     event.preventDefault();
     $('#errormessagehere').hide();
     $.ajax({
            data: $('#add-Appointment-form').serialize(),
            type: $('#add-Appointment-form').attr('method'),
            url:$('#add-Appointment-form').attr('action'),
            success: function(result) {
                if(result=="1")
                  location.reload();                  
                else if(result=="3"){    
                 $('#errormessagehere').show();
                 $('#errormessagehere').text("هذا اليوم مسجل من قبل بالفعل اختر يوم أخر");   
                }else if(result=="2"){
                 $('#errormessagehere').show();
                 $('#errormessagehere').text("وقت النهاية لا يمكن ان يكون اقل من البداية");
                }   
            }
        });
        return false;
    });
</script>