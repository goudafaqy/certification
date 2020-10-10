@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'categories-add'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        
                       
                        <div class="card-body" style="padding: 0 15px">

            <form action="{{ route('import') }}" method="POST" id="createform" enctype="multipart/form-data">
                @csrf
                <div class="row justify-content-right " >
                <div class="col-md-12" >
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="form"> اختر النموذج</label>
                            <select  class="form-control" id="form" placeholder="اختر نموذج الشهادة" required name="form">
							   <option value="0">اختر النموذج</value>
							   <option value="1">نموذج شهادة الدورة التدريبية لليوم الواحد</value>
							   <option value="2">نموذج شهادة الدورة التدريبية من عدة أيام </value>
							</select>
                        </div>
                    </div>
					
                   

                    <div class="col-md-6" >
                            <div class="form-group" style="margin-top: 20px;">
                                <label for="course">عنوان الدورة</label>
                                <input type="text" class="form-control" id="course"  placeholder="" name="course" >
                            </div>
                    </div>        
                </div>
				
              <div class="row justify-content-center" >

                   
                   <div class="col-md-6 1">
                        <div class="form-group" style="margin-top: 20px;">
                            <label for="date">تاريخ انعقاد الدورة بالهجرى</label>
                            <input type="text" class="form-control" id="date"  name="date"W>
                        </div>
                    </div>
                     
                    <div class="col-md-6 2" >
                            <div class="form-group" >
                                <label for="fromDate">تاريخ بداية الدورة بالهجرى</label>
                                <input type="text" class="form-control" id="fromDate"   name="fromDate">
                            </div>
                    </div>    
                   <div class="col-md-6 2" >
                            <div class="form-group" >
                                <label for="toDate">تاريخ نهاية الدورة بالهجرى</label>
                                <input type="text" class="form-control" id="toDate"  name="toDate">
                            </div>
                    </div> 
   					
                </div>

                <div class="row justify-content-center" >
                <div class="col-md-2 2">
                        <div class="form-group" style="margin-top: 20px;">
                        <label for="hourse">مدة الدورة (الايام)</label>
                        <input type="number" class="form-control @error('days') is-invalid @enderror" id="days"  placeholder="" name="days"  value="">
                        </div>
                    </div>   
					<div class="col-md-4">
                        <div class="form-group" style="margin-top: 20px;">
                        <label for="hourse">عدد ساعات الدورة</label>
                        <input type="text" class="form-control @error('hourse') is-invalid @enderror" id="hours"  placeholder="" name="hours" required value="">
                        </div>
                    </div> 
                   <div class="col-md-4" >
                        <div class="form-group" style="margin-top: 20px;">
                        <label for="title_en">ملف  اسماء المتدربيبن </label>
                        <input type="file" name="file" class="form-control" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required>
                        </div>
                    </div>

                </div>
				</div>
                <div class="row justify-content-center" >
                <div class="col-md-2">
                <button class="btn btn-success" style="text-align:center;float:right" >حمل البيانات</button
				</div>
				</div>
               
            </form>
        </div>
    </div>
</div>
   
   <script>
   function hide(){
	    $('div.1').hide();
	   	$('div.2').hide();
	    $('div.1 input').removeAttr("required"); 
	    $('div.2 input').removeAttr("required"); 
   }
   $( document ).ready(function() { hide();
	
	var validateRulesForForm1={
		        form: "required",
				course: "required",
				file:"required",
		        hours:{required:true},
				date:{required:true}
	}	
   var validationMessagesForFomr1= {
				form: "اختر النموذج",
				course: "أدخل عنوان الدورة التدريبية",
				file:"حمل ملف المتدربين",
				hours:{required:"أدخل عدد ساعات الدورة"},
				date:{required:"أدخل تاريخ انعقاد الدورة"},		
	}	
	var validateRulesForForm2={
		        form: "required",
				course: "required",
				file:"required",
		        hours:"required",
				days:"required",
				fromDate:"required",
				toDate:"required"
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
		 var form=$(this).val();
		 if(form==0)
			 alert("يرجى أختيار نموذج الشهادة");
		 else {
		   $('div.'+form).show();
		  // $('div.'+form+' input').attr("required"); 
		  if(form==2) {
			  $('#hours').attr("type","number"); 
			  validationRules=validateRulesForForm2;
			  validationMessages=validationMessagesForFomr2;
		  }
		  if(form==1) {
			  $('#hours').attr("type","text"); 
			  validationRules=validateRulesForForm1;
			  validationMessages=validationMessagesForFomr1;
		  }
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
</body>
</html>