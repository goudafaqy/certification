@include('cp.common.dashboard-header')
@include('cp.common.sidebar', ['active' => 'categories-add'])
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="widget-header">
                            <div class=" d-flex justify-content-between align-items-center">
                                <h3 class="widget-title">إضافة فئة مستهدفة</h3>
                            </div>
                        </div>
                        <div class="card-body" style="padding: 0 15px">
                            <form id="add-category-form" action="{{ route('save-category') }}" method="POST">
                                @csrf
                                <div class="row justify-content-center" style="padding: 20px 50px;">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title_ar">العنوان باللغة العربية</label>
                                            <input type="text" class="form-control @error('title_ar') is-invalid @enderror" id="title_ar" name="title_ar">
                                        </div>
                                        @error('title_ar')
                                            <span class="text-danger err-msg-title_ar" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="title_en">العنوان باللغة الإنجليزية</label>
                                            <input type="text" class="form-control @error('title_en') is-invalid @enderror" id="title_en" name="title_en">
                                        </div>
                                        @error('title_en')
                                            <span class="text-danger err-msg-title_en" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="letter">الرمز</label>
                                            <select class="form-control @error('letter') is-invalid @enderror" id="letter" name="letter">
                                                @foreach($letters as $letter)
                                                <option value="{{$letter}}">{{$letter}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('letter')
                                            <span class="text-danger err-msg-letter" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">حفظ</button>
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
        $("#letter").keypress(function(){
            $(".err-msg-letter").hide();
            $("#letter").removeClass("is-invalid");
        });
    })
</script>
