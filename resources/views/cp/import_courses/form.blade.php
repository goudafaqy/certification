@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => ''])
<style>
    .error{
        color:red !important;
    }
    .form-group{
        font-size:16px;
    }
    form input[type="file"] {
        display: block !important;
    }
    </style>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">إضافة دورة</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 10 15px">
                            
        <form action="{{ route('import') }}" method="POST" id="createform" enctype="multipart/form-data">
            @csrf
            <div class="row justify-content-right " >
                 <div class="col-md-6" >
                    <div class="form-group" style="margin-top: 20px;">
                        <label for="form"> اختر النموذج</label>
                        <select  class="form-control" id="form" placeholder="اختر نموذج الشهادة" required name="form">
                           <option value="0">اختر النموذج</option>
                           <option value="1">نموذج شهادة دورة تدريبية عن بعد</option>
                           <option value="2">نموذج شهادة الدورة التدريبية من عدة أيام </option>
                           <option value="3">  نموذج شهادة الدورة التأهيلية</option>
                           <option value="4">  نموذج شهادة الدورة التعريفية</option>
                           <option value="5">  نموذج البرنامج التدريبى</option>
                           <option value="6">  نموذج مشهد إتمام برنامج التدريب التعاوني </option>
                           <option value="7"> شهادة الاجتياز </option>

                           
                        </select>
                    </div>
                    <div class="form-group 1 2 3 4 5 6" style="margin-top: 20px;">
                        <label for="course">عنوان الدورة</label>
                        <input type="text" class="form-control" id="course"  placeholder="" name="course" >
                    </div>
                    <div class="form-group 1 2" style="margin-top: 20px;">
                        <label for="certification_title">عنوان الشهادة</label>
                        <input type="text" class="form-control" id="certification_title"  placeholder="شهادة حضور / شهادة تدريب"  required  name="certification_title" >
                    </div>
                    <div class="form-group 1 2 5" style="margin-top: 20px;">
                        <label for="type">النوع </label>
                        <input type="text" class="form-control"  placeholder="  محاضرة /دورة /البرنامج التدريبى / مشهد إتمام  " required id="type" name="type">
                    </div>
                    <div class="form-group 1 2 5" style="margin-top: 20px;">
                        <label for="location">المقامة ب </label>
                        <input type="text" class="form-control" id="location"  placeholder="الرياض/ الدمام / مركز التدريب العدلى بالرياض" name="location" >
                    </div>
                    <div class="form-group 1 2 5" style="margin-top: 20px;">
                        <label for="year">   العام الدراسى</label>
                        <input type="text" class="form-control" id="year" placeholder="1442" name="year">
                    </div>
                    <div class="form-group 1" style="margin-top: 20px;">
                        <label for="date">تاريخ انعقاد الدورة بالهجرى</label>
                        <input type="text" class="form-control" id="date" placeholder="2 صفر 1442 هـ" name="date">
                    </div>
                    <div class="form-group 2 3 4 6 7" >
                        <label for="fromDate">تاريخ بداية الدورة بالهجرى</label>
                        <input type="text" class="form-control" id="fromDate"  placeholder="5 صفر 1442 هـ"  name="fromDate">
                    </div>

                    <div class="form-group 0 7" >
                        <label for="fromDate_en">تاريخ بداية الدورة باللغة الانجليزية</label>
                        <input type="text" class="form-control" id="fromDate_en"  placeholder="1442/5/15"  name="fromDate_en">
                    </div>
                    <div class="form-group 2 3 4 6" >
                        <label for="toDate">تاريخ نهاية الدورة بالهجرى</label>
                        <input type="text" class="form-control" id="toDate"  name="toDate">
                    </div>
                    <div class="form-group 1 2 4" style="margin-top: 20px;">
                        <label for="days">مدة الدورة (الايام)</label>
                        <input type="text" class="form-control @error('days') is-invalid @enderror" id="days"  placeholder="" name="days"  value="">
                    </div>
                    <div class="form-group 1 2 3 5" style="margin-top: 20px;">
                        <label for="hours">عدد ساعات الدورة</label>
                        <input type="text" class="form-control @error('hours') is-invalid @enderror" id="hours"  placeholder="" name="hours"  value="">
                    </div>

                    <!-- form 7  -->
                    <div class="form-group 7" style="margin-top: 20px;">
                        <label for="duration">مدة الدورة باللغة العربية</label>
                        <input type="text" class="form-control @error('duration') is-invalid @enderror" id="duration"  placeholder="ثلات سنوات" name="duration"  value="">
                    </div>
                    <div class="form-group 7" style="margin-top: 20px;">
                        <label for="duration_en">مدة الدورة باللغة الانجليزية</label>
                        <input type="text" class="form-control @error('duration_en') is-invalid @enderror" id="duration_en"  placeholder="Three years" name="duration_en"  value="">
                    </div>

                    <div class="">
                        <label for="file">ملف  اسماء المتدربيبن</label>
                        <input type="file"  name="file" class="btn btn-success"  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                     </div>
                </div>
                <div class="col-md-6" >
                    <div class="course-thumbnail">
                        <img src="" id="formimg" class="attachment-full size-full wp-post-image img-fluid" style=" border-radius: 8px;">
                    </div>
                </div>
                   
            </div>
            

       
            
        <div class="row justify-content-center submit">
            <div class="col-md-12" style="margin-top: 25px; text-align:center">
              <button class="btn btn-primary" style="background-color:green"  type="submit" >حمل البيانات</button>
            </div>
        </div>
           
        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('cp.common.dashboard-footer')

<script>
   function hide(){
	    $('div.1').hide();
        $('div.2').hide();
        $('div.7').hide();
	    $('div.1 input').removeAttr("required"); 
	    $('div.2 input').removeAttr("required"); 
        $('div.submit').hide();
   }
   $( document ).ready(function() { hide();
    
    
	var validateRulesForForm1={
		        form: "required",
				course: "required",
				file:"required",
                certification_title :"required",
		        hours:{required:true},
				date:{required:true}
	}	
   var validationMessagesForFomr1= {
				form: "اختر النموذج",
				course: "أدخل عنوان الدورة التدريبية",
				file:"حمل ملف المتدربين",
				hours:{required:"أدخل عدد ساعات الدورة"},
				date:{required:"أدخل تاريخ انعقاد الدورة"},	
                certification_title :{required:"أدخل عنوان الشهادة"},	
	}	
	var validateRulesForForm2={
		        form: "required",
				course: "required",
				file:"required",
		        hours:"required",
				days:"required",
				fromDate:"required",
				toDate:"required",
                certification_title :"required"
	}		
	
	 var validationMessagesForFomr2= {
				form: "اختر النموذج",
				course: "أدخل عنوان الدورة التدريبية",
				file:"حمل ملف المتدربين",
				hours:"أدخل عدد ساعات الدورة",
				days:"أدخل عدد الايام",
				fromDate:"أدخل تاريخ بداية الدورة",
				toDate:"أدخل تاريخ نهاية الدورة"		
			}   
     
	
     var validationRules= validateRulesForForm1;
	 var validationMessages= validationMessagesForFomr1;

     $('select#form').change(function(){
         
		   $('div.1').hide();
	   	   $('div.2').hide();
              $('div.7').hide();
              $('div.submit').show();
         var form=$(this).val();
         
         var imgname=form+".jpg";
         $('#formimg').attr('src',"{{asset('/')}}forms/"+imgname);
		 if(form==0)
			 alert("يرجى أختيار نموذج الشهادة");
		 else {
		   $('div.'+form).show(); 
		  // $('div.'+form+' input').attr("required"); 
		  if(form==2) {
			//  $('#hours').attr("type","number"); 
			  validationRules=validateRulesForForm2;
			  validationMessages=validationMessagesForFomr2;
		  }
		  if(form==1) {
			  //$('#hours').attr("type","text"); 
			  validationRules=validateRulesForForm1;
			  validationMessages=validationMessagesForFomr1;
		  }
          /*if(form==4){
            $('#days').attr("type","text"); 
          }
          */
		  console.log([validationRules,validationMessages]);
		 }		 
	 });
	 
	   $("form#createform").validate({
		  rules:validationRules,messages:validationMessages,
          submitHandler: function(form) {
            form.submit();
        }
      });
	 

 });
   </script>