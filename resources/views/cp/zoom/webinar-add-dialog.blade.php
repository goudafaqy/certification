
                        <div class="card-body" style="padding: 0 15px">
                            <form id="add-user-form" action="{{ route('store-webinar') }}" method="POST">
                                @csrf
 <div class="row justify-content-right" >
        <div class="col-md-12">
            <div class="form-group">
                <label for="name_ar">عنوان المناقشة</label>
                <input type="text" class="form-control @error('topic') is-invalid @enderror" id="topic" name="topic">
            </div>
        @error('topic')
        <span class="text-danger err-msg-topic" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
    </div> 
    <div class="row justify-content-right" >
        <div class="col-md-12">
            <div class="form-group">
                <label for="name_ar">موعد البدء </label>
                <input type="datetime-local" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time">
            </div>
        @error('start_time')
        <span class="text-danger err-msg-topic" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
    </div>    
    <div class="row justify-content-right" >
        <div class="col-md-12">
            <div class="form-group">
                <label for="name_ar">كلمة المرور </label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            </div>
        @error('password')
        <span class="text-danger err-msg-topic" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
    </div>    
      <div class="row justify-content-right" >
        <div class="col-md-12">
            <div class="form-group">
                <label for="name_ar"> المدة الزمنية بالدقائق </label>
                <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration">
            </div>
        @error('duration')
        <span class="text-danger err-msg-topic" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
    </div>                                 
     <div class="row justify-content-right" >
        <div class="col-md-12">
            <div class="form-group">
                <label for="name_ar"> نظرة عامة عن المناقشة   </label>
                <textarea class="form-control @error('agenda') is-invalid @enderror" id="agenda" name="agenda" rows="3">{{ old('agenda') }}</textarea>
            </div>
        @error('agenda')
        <span class="text-danger err-msg-topic" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        </div>
    </div>  
                      
            
     <div class="row justify-content-center" >
        <div class="col-md-12">
          <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">أضافة</button>
        </div>
    </div>  
                      
                              
                            </form>
                        </div>
                  
<script>
    $(document).ready(function () {
        $("#name_ar").keypress(function(){
            $(".err-msg-name_ar").hide();
            $("#name_ar").removeClass("is-invalid");
        });
        $("#username").keypress(function(){
            $(".err-msg-username").hide();
            $("#username").removeClass("is-invalid");
        });
        $("#password").keypress(function(){
            $(".err-msg-password").hide();
            $("#password").removeClass("is-invalid");
        });
        $("#role").change(function(){
            $(".err-msg-role").hide();
            $("#role").removeClass("is-invalid");
        });
        $("#name_en").keypress(function(){
            $(".err-msg-name_en").hide();
            $("#name_en").removeClass("is-invalid");
        });
        $("#email").keypress(function(){
            $(".err-msg-email").hide();
            $("#email").removeClass("is-invalid");
        });
        $("#password_confirmation").keypress(function(){
            $(".err-msg-password_confirmation").hide();
            $("#password_confirmation").removeClass("is-invalid");
        });
    })
</script>
