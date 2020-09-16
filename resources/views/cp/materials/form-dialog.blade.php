                        <div class="card-body" style="padding: 0 15px">
                            <form id="add-materials-form" action="{{ route('saveAjax-materials') }}" method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="course_id" value="{{$course->id}}">
                                <input type="hidden" name="course_type" value="{{request()->get('type')}}">
                              <input type="hidden" name="name_en" value="dummy English title">
                                @csrf
                                 <div class="row justify-content-right" >
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name_ar">{{__('app.Arabic Title')}}</label>
                                            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" name="name_ar" value="{{$material->name_ar??''}}">
                                        </div>
                                        @error('name_ar')
                                            <span class="text-danger err-msg-name_ar" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>    
                                <div class="row justify-content-right" >
                                    <div class="col-md-12">
                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="cat_id">{{__('app.Material Type')}}</label>
                                            <select class="form-control @error('cat_id') is-invalid @enderror" id="type" name="type">
                                                <option>{{__('app.Material Type')}}</option>
                                                @foreach($types as $type => $val)
                                                 <option <?php if( (isset($material->type)) && $material->type == $type){ ?> selected <?php } ?> value="{{$type}}">{{$val}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('cat_id')
                                            <span class="text-danger err-msg-cat_id" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                      
                                <div class="row justify-content-right">
                                    <div class="col-md-12">    
                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="description">{{__('app.Details')}}</label>
                                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{$material->description??''}}</textarea>
                                        </div>
                                        @error('description')
                                            <span class="text-danger err-msg-description" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>    
                                
                                <div class="row justify-content-right" >
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                <input type="file" class="form-control-file" id="true-image" name="source">
                                                <button class="btn btn-success" type="button" id="fake-image">{{__('app.Upload Source')}}</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-right" >
                                    <div class="col-md-12">
                                         <div class="image-preview">
                                                <span id="imageName" style="display: none; position: relative; top: 35px; right: 100px; background-color: #888; color: #FFF; padding: 7px 20px; border-radius: 5px;"></span>
                                            @error('image')
                                                <span class="text-danger err-msg-image" role="alert" style="position: relative; top: 33px; right: 20px">
                                                    <strong>يجب رفع (الملف) للدورة</strong>
                                                </span>
                                            @enderror
                                        </div>
                                      @if(isset($material->source))
                                       <a href="{{url($material->source)}}" download><i class="fa fa-download" aria-hidden="true"></i></a>
                                      @endif
                                    </div>
                                    <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">{{__('app.Save')}}</button>
                                </div>
                                                          
                            </form>
                           </div>

                            
<script>
    $(document).ready(function () {
        $("#name_ar").keypress(function(){
            $(".err-msg-name_ar").hide();
            $("#name_ar").removeClass("is-invalid");
        });
        $("#name_en").keypress(function(){
            $(".err-msg-name_en").hide();
            $("#name_en").removeClass("is-invalid");
        });
        $("#cat_id").keypress(function(){
            $(".err-msg-cat_id").hide();
            $("#cat_id").removeClass("is-invalid");
        });

        $('#true-image').change(function(e){ 
            var fileName = e.target.files[0].name;
            $("#imageName").show();
            $("#imageName").text(fileName);
            $(".err-msg-image").hide();
        });
    

// Handle form submission event

});
</script>
