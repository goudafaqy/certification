@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => ''])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                             
                            <h3 class="widget-title">اضافة دورة</h3>

                            </div>

                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <form id="add-classification-form" action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="row justify-content-center" >

                                <div class="col-md-6" >
                                        <div class="form-group" style="margin-top: 20px;">
                                        <label for="form"> اختر النموذج</label>
                                        <select  class="form-control" id="form" placeholder="اختر نموذج الشهادة" required name="form">
                                            <option value="0">اختر النموذج</value>
                                            <option value="1">نموذج شهادة الدورة التدريبية لليوم الواحد</value>
                                            <option value="2">نموذج شهادة الدورة التدريبية من عدة أيام </value>
                                        </select>
                                        </div>
                                        @error('form')
                                            <span class="text-danger err-msg-form" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                </div>        
                                <div class="col-md-6" >
                                    <div class="form-group" style="margin-top: 20px;">
                                        <label for="course">عنوان الدورة</label>
                                        <input type="text" class="form-control @error('course') is-invalid @enderror" id="course" placeholder="" name="course" value="{{$item->course??''}}">
                                    </div>
                                </div>
                                </div>
                                <div class="row justify-content-center" >
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="date">تاريخ انعقاد الدورة بالهجرى</label>
                                            <input type="text" class="form-control" id="date"  name="date"W>
                                        </div>
                                       
                                    </div>


                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label for="toDate">تاريخ نهاية الدورة بالهجرى</label>
                                            <input type="text" class="form-control" id="toDate"  name="toDate">
                                        </div>
                                       
                                    </div>
                                   

                                  
                                    
                                    </div>
                                    <div class="row justify-content-center" >
                <div class="col-md-4 2">
                        <div class="form-group" >
                        <label for="hourse">مدة الدورة (الايام)</label>
                        <input type="number" class="form-control @error('days') is-invalid @enderror" id="days"  placeholder="" name="days"  value="">
                        </div>
                    </div>   
					<div class="col-md-4">
                        <div class="form-group" >
                        <label for="hourse">عدد ساعات الدورة</label>
                        <input type="text" class="form-control @error('hourse') is-invalid @enderror" id="hours"  placeholder="" name="hours" required value="">
                        </div>
                    </div> 
                   

                    <div class="col-md-4" >
                        <div class="form-group">
                            <label for="file">ملف  اسماء المتدربيبن </label>
                            <input type="file" class="form-control-file" id="true-image" name="file">
                            <button class="btn btn-success" type="button" id="fake-image">{{__('app.Upload Source')}}</button>
                        </div>
                    </div>

                </div>
                                

                                       
                                       
                                        <button style="width: 25%; margin-bottom: 50px; margin-top: 50px;" type="submit" class="btn btn-primary">{{__('app.Save & Send')}}</button>

                                    </div>

                                    
                                </div>
                            </form>
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
