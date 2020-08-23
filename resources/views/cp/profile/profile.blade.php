@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'dashboard'])

<div class="main-content">
                    <div class="container-fluid">
                  
                      <div class="box box-default">
                       
                        <!-- /.box-header -->
                       
                        <!-- /.box-body -->
                        
                        <div class="wrapper-box">
                          <div class="profile-card active">
                            <div class="card-header">
                             
                          </div>
                          <div class="profile-card-header">
                            <div class="circle">
                              <img class="profile-pic" src="images/Dr_Image.jpg">
                              <div class="p-image">
                                <i class="fa fa-camera upload-button"></i>
                                 <input class="file-upload" type="file" accept="image/*">
                              </div>
                            </div>
                          </div>
                            
                              <div class="profile-card-body">
                                

<div class="product-tabs">
<input checked="checked" id="tab1" type="radio" name="pct">
<input id="tab2" type="radio" name="pct">
<input id="tab3" type="radio" name="pct">
<input id="tab4" type="radio" name="pct">
<input id="tab5" type="radio" name="pct">
  <nav>
    <ul>
      <li class="tab1">
        <label for="tab1"> <img src="images/man.png" style="width: 22px"> الملف الشخصي</label>
      </li>
      <li class="tab2">
        <label for="tab2"> <img src="images/school.png" style="width: 20px"> الكورسات</label>
      </li>
      <li class="tab3">
        <label for="tab3"> <img src="images/bo.png" style="width: 22px"> البحوث والدراسات</label>
      </li>
      <li class="tab4">
        <label for="tab4"> <img src="images/training.png" style="width: 22px"> الخبرات</label>
      </li>
      <li class="tab5">
        <label for="tab5"> <img src="images/certificate.png" style="width: 22px"> الشهادات</label>
      </li>
    </ul>
  </nav>
  <section>
    <div class="tab1 Tab-form">
      
      <div class="container-login">
        <div class="wrap-login">
                
    <form class="login-forms">
    
  
        
            
<!--                      <label class="label" for="">اسم المستخدم</label>-->
                     
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text" id="basic-addon1"><i class="far fa-envelope"></i></span>
</div>
<input id="email" required="" name="email" class="form-control" type="text" placeholder="البريد الإلكتروني">
</div>
  <div class=" input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                        </div>
                        <input id="email" required="" name="text" class="form-control" type="text" placeholder="الاسم رباعى بالعربية">
                      </div>
                     <div class=" input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                        </div>
                        <input id="email" required="" name="text" class="form-control" type="text" placeholder="الاسم رباعى بالانجليزية">
                      </div>
	                  <div class=" input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="far fa-id-card"></i></span>
                        </div>
                        <input id="email" required="" name="text" class="form-control" type="text" placeholder="رقم الهوية">
                      </div>
                      <div class=" input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile-alt"></i></span>
                        </div>
                        <input id="email" required="" name="tel" class="form-control" type="text" placeholder="الجوال">
                      </div>
                      <div class=" input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-shield-alt"></i></span>
                        </div>
                        <input id="email" required="" name="text" class="form-control" type="text" placeholder="الوظيفة ">
                      </div>

                      <div class=" input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-shield-alt"></i></span>
                        </div>
                        
                        <select class="form-control form-control-lg">
                        <option value="" hidden="">المؤهل العلمي</option>
                        <option>بكالريوس</option>
                        <option>ماجستير</option>
                        <option>دكتوراه</option>
                        
                        </select>
                        </div>
            
               
    </form>
                
  </div>
</div>
    </div>
    <div class="tab2 Tab-form">
     
      <form class="form repeater-default row">
          <div class="col-lg-10">
        <div class="ui-input-container">
        <div data-repeater-list="group-a">
          <div data-repeater-item="">
                <label class="ui-form-input-container">
                  <textarea class="ui-form-input" id="word-count-input"></textarea>
                  <span class="form-input-label"><img src="images/school.png" style="width: 20px"><span data-repeater-delete="" type="button" value="Delete" class="delet">×</span></span>
                </label>
                
            </div>
           
          </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="form-group">
          <div class="">
            <button class="btn login-form-btn" data-repeater-create="" type="button"><i class="bx bx-plus"></i>
              أضف
            </button>
          </div>
        </div>
    </div>
      </form>
     
    </div>
    <div class="tab3 Tab-form">
        <form class="form repeater-default row">
            <div class="col-lg-10">
          <div class="ui-input-container">
          <div data-repeater-list="group-a">
            <div data-repeater-item="">
                <label class="ui-form-input-container">
                    <textarea class="ui-form-input" id="word-count-input"></textarea>
                    <span class="form-input-label"><img src="images/bo.png" style="width: 22px"><span data-repeater-delete="" type="button" value="Delete" class="delet">×</span></span>
                  </label>
  
              </div>
             
            </div>
          </div>
      </div>
      <div class="col-lg-2">
          <div class="form-group">
            <div class="">
              <button class="btn login-form-btn" data-repeater-create="" type="button"><i class="bx bx-plus"></i>
                أضف
              </button>
            </div>
          </div>
      </div>
        </form>
    </div>
    <div class="tab4 Tab-form">
        <form class="form repeater-default row">
            <div class="col-lg-10">
          <div class="ui-input-container">
          <div data-repeater-list="group-a">
            <div data-repeater-item="">
                <label class="ui-form-input-container">
                    <textarea class="ui-form-input" id="word-count-input"></textarea>
                    <span class="form-input-label"><img src="images/training.png" style="width: 22px"><span data-repeater-delete="" type="button" value="Delete" class="delet">×</span></span>
                  </label>
  
              </div>
             
            </div>
          </div>
      </div>
      <div class="col-lg-2">
          <div class="form-group">
            <div class="">
              <button class="btn login-form-btn" data-repeater-create="" type="button"><i class="bx bx-plus"></i>
                أضف
              </button>
            </div>
          </div>
      </div>
        </form>
    </div>
    <div class="tab5 Tab-form">
        <form class="form repeater-default row">
            <div class="col-lg-10">
          <div class="ui-input-container">
          <div data-repeater-list="group-a">
            <div data-repeater-item="">
                <label class="ui-form-input-container">
                    <textarea class="ui-form-input" id="word-count-input"></textarea>
                    <span class="form-input-label"><img src="images/certificate.png" style="width: 22px"><span data-repeater-delete="" type="button" value="Delete" class="delet">×</span></span>
                  </label>
  
              </div>
             
            </div>
          </div>
      </div>
      <div class="col-lg-2">
          <div class="form-group">
            <div class="">
              <button class="btn login-form-btn" data-repeater-create="" type="button"><i class="bx bx-plus"></i>
                أضف
              </button>
            </div>
          </div>
      </div>
        </form>
      </div>
	  
  </section>
</div>
                                  
                                
                              
                                <button type="submit" class="btn btn-primary mt-2 mx-auto">حفظ</button>
                                
                              </div>
                             
                          </div>
                        </div>
                        
                      </div>
                       
                      
            </div>
        </div>



<!-- <script>
    $(document).ready(function() {

    
var readURL = function(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-pic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}


$(".file-upload").on('change', function(){
    readURL(this);
});

$(".upload-button").on('click', function() {
   $(".file-upload").click();
});
});
</script> -->









@include('cp.common.dashboard-footer')

