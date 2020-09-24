<div class="outer-container">
    <div class="row">
        <div class="col-12">
            <a class="float-left btn btn-danger"
               href="{{route('instructor-courses-view', ['id' => $id, 'tab' => 'support'])}}" style="margin-bottom:0.5rem">الرجوع</a>
        </div>

        @if (session('invalid'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('invalid') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form id="ticket-form" action="{{ route('instructor-course-support-new-ticket', ['id' => $id])}}" method="POST"
              enctype="multipart/form-data" style="width: 100%">
            @csrf
            <div class="row justify-content-center" style="padding: 5px 50px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subject">العنوان</label>
                        <input required class="form-control @error('subject') is-invalid @enderror" id="subject"
                               name="subject" value="{{old('subject')}}" type="text">
                    </div>
                    @error('subject')
                    <span class="text-danger err-msg-subject" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subject">التصنيف</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('category_id')
                    <span class="text-danger err-msg-category_id" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="content">المحتوي</label>
                        <textarea class="ui-form-input @error('content') is-invalid @enderror"
                                  id="content"
                                  name="content">{{old('content')}}</textarea>
                    </div>
                    @error('content')
                    <span class="text-danger err-msg-content" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>

                <div class="col-lg-12">
                    <label for="attachments">المرفقات</label>
                    <div class="file-upload" style="margin-top:1rem">
                        <div class="file-select">
                            <div class="file-select-button" id="attachments">اختر ملف</div>
                            <div class="file-select-name" id="noFile">No file chosen...</div>
                            <input type="file" name="attachments[]" id="chooseFile" multiple>
                        </div>
                    </div>
                    @error('attachments')
                    <span class="text-danger err-msg-attachments" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                    @enderror
                </div>

            </div>


            <div class="col-md-12">
                <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">إنشاء</button>
            </div>
        </form>

    </div>

</div>

