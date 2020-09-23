<div class="outer-container">

    @if (session('invalid'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('invalid') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('submit'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('submit') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col-12">
            <a class="float-left btn btn-danger"
               href="{{route('instructor-courses-view', ['id' => $id, 'tab' => 'support'])}}"
               style="margin-bottom:0.5rem">الرجوع</a>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <div class="d-flex justify-content-between">
                <h3>{{$ticket->subject}}</h3>
                <h3 style="color: {{$ticket->status->color}}">{{$ticket->status->name}}</h3>
            </div>


            <div class="card">
                <div class="card-body">
                    {{$ticket->content}}
                </div>
            </div>
        </div>


        <div class="container text-right">
            <div class="row">
                @foreach($ticket->attachments as $attachment)
                    <div class="col-4">
                        @include('panichd::tickets.partials.attachment', ['attachment' => $attachment])
                    </div>
                @endforeach
            </div>
        </div>


        <div class="container text-right">
            <h2>الردود</h2>
            <div class="row">
                @foreach($ticket->comments as $comment)
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="card col-12">
                                    <div class="card-body">
                                        <h4>
                                            من :
                                            <span
                                                style="color: {{$comment->user_id==\Illuminate\Support\Facades\Auth::id()?'green': 'red'}}">
                                                    {{$comment->user->name}}</span>
                                        </h4>
                                        {{$comment->content}}
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                @foreach($comment->attachments as $attachment)
                                    <div class="col-4">
                                        @include('panichd::tickets.partials.attachment', ['attachment' => $attachment])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                @endforeach
            </div>

            @if (!$ticket->hidden && !in_array($ticket->status_id, [5, 6]))
                <button class="btn btn-info btn-lg" id="commentFormToggle">اضافة رد</button>
            @endif
        </div>


        @if (!$ticket->hidden && !in_array($ticket->status_id, [5, 6]))
            <div class="container text-right" style="display: none;" id="commentForm">
                <div class="row">

                    <form id="ticket-form"
                          action="{{ route('instructor-course-support-ticket-comment-save', ['id' => $id, 'ticketId' => $ticket->id])}}"
                          method="POST"
                          enctype="multipart/form-data" style="width: 100%">
                        @csrf
                        <div class="row justify-content-center" style="padding: 5px 50px;">

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
                            <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">إضافة
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        @endif
    </div>
</div>


@if (!$ticket->hidden && !in_array($ticket->status_id, [5, 6]))
    @push('scripts')
        <script !src="">
            $('#commentFormToggle').click(function () {
                $('#commentForm').slideToggle();
                $(this).toggleClass('btn-info').toggleClass('btn-danger');
                if ($(this).hasClass('btn-info')) {
                    $(this).html('اضافة رد');
                } else {
                    $(this).html('الغاء');
                }
            })
        </script>
    @endpush
@endif
