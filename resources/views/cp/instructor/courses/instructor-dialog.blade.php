  <!-- SendEmail Dialog -->
  <div class="modal fade" id="SendEmail" tabindex="-1" role="dialog" aria-labelledby="SendEmailTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header" style="padding:10px !important;">
          <h5 class="modal-title" id="SendEmailTitle">تواصل معنا</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" style="background: #34405a;">
            <div class="ui-input-container">
                <h6>العنوان</h6>
                <div class="form-group input-group">                                                                            
                    <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1" style="background:#34405a;"><img src="{{ asset('images/man.png') }}" class="img-fluid" style="width:20px !important;height:20px !important"></span>
                    </div>
                    <input id="email" required="" name="text" class="form-control" type="text">
                    </div>
                    <h6>الرسالة</h6>
                <label class="ui-form-input-container">
                    <textarea class="ui-form-input" id="word-count-input"></textarea>
                        <span class="form-input-label"><img src="{{ asset('images/school.png') }}" style="width: 20px"></span>
                        </label>
                        <button type="button" class="btn btn-primary" style="margin:auto; display:table;width:120px">حفظ</button>
                    </div>                    
                </div>
      </div>
    </div>
  </div>
  <!-- End SendEmail Dialog -->

  <!-- Add New Session Dialog -->
@if ($tab=='tab3')
<div class="modal fade" id="AddNewSession" tabindex="-1" role="dialog" aria-labelledby="AddNewSessionTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddNewSessionTitle">أضافة محاضرة جديدية</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         @include('cp.zoom.webinar-add-dialog')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
  </div>
</div>
  @endif
  <!-- End Add New Session Dialog --> 


  <!-- Add New Material Dialog -->
  @if ($tab=='tab2')
<div class="modal fade" id="AddNewMaterial" tabindex="-1" role="dialog" aria-labelledby="AddNewMaterialTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AddNewMaterialTitle">أضافة ملف جديد</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       @include('cp.materials.form-dialog')
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
      </div>
    </div>
  </div>
</div>
  @endif
  <!-- End Add New File Dialog --> 
