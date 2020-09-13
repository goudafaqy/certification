@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'classifications-list'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">تعديل بيانات تصنيف</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <form id="add-classification-form" action="{{ route('update-classification') }}" method="POST">
                                @csrf
                                <div class="row justify-content-center" style="padding: 20px 50px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_ar">العنوان باللغة العربية</label>
                                            <input type="text" value="{{$classification->title_ar}}" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar" name="title_ar">
                                            <input type="hidden" name="id" value="{{ $classification->id }}">
                                        </div>
                                        @error('title_ar')
                                            <span class="text-danger err-msg-title_ar" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group" style="margin-top: 20px;">
                                            <label for="cat_id">الفئة المستهدفة</label>
                                            <select class="form-control @error('cat_id') is-invalid @enderror" id="cat_id" name="cat_id">
                                                <option value="">--</option>
                                                @foreach($categories as $category)
                                                <option <?php if($classification->cat_id == $category->id){ ?> selected <?php } ?> value="{{$category->id}}">{{$category->title_ar}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('cat_id')
                                            <span class="text-danger err-msg-cat_id" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title_en">العنوان باللغة الإنجليزية</label>
                                            <input type="text" value="{{ $classification->title_en }}" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en">
                                        </div>
                                        @error('title_en')
                                            <span class="text-danger err-msg-title_en" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror

                                        <div class="form-group">
                                         <div class="form-check" style="display: inline-block; position: relative; top: 45px">
                                         @if($classification->home_page_display)
                                                <input checked style="cursor: pointer;" type="checkbox" class="form-check-input" id="home_page_display" name="home_page_display">
                                            @else
                                                <input style="cursor: pointer;" type="checkbox" class="form-check-input" id="home_page_display" name="home_page_display">
                                            @endif
                                            <label style="font-size: 0.9em; position: relative; bottom: 1px; right: 5px;" class="form-check-label" for="home_page_display">ظهور فى الصفحة الرئيسية</label>
                                         </div>
                                        </div>
                                    </div>
                                    <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">تعديل</button>
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
    $(document).ready(function () {
        $("#title_ar").keypress(function(){
            $(".err-msg-title_ar").hide();
            $("#title_ar").removeClass("is-invalid");
        });
        $("#title_en").keypress(function(){
            $(".err-msg-title_en").hide();
            $("#title_en").removeClass("is-invalid");
        });
        $("#cat_id").keypress(function(){
            $(".err-msg-cat_id").hide();
            $("#cat_id").removeClass("is-invalid");
        });
    })
</script>
