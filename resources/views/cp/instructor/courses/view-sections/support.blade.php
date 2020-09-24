<div class="outer-container">
    <div class="row">
        <div class="col-12">
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
            <a class="btn btn-primary m-2 text-white"
               href="{{route('instructor-course-support-form', ['id' => $id])}}">
                إنشاء تذكرة جديدة
            </a>
            @if(count($tickets) == 0)
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body" style="background-color: #a58661; color: #FFF; border-radius: 5px;">
                                لا يوجد تذاكر
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <table id="dtBasicExample" class="table course-table" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">العنوان</th>
                        <th class="text-center">التاريخ</th>
                        <th class="text-center">عدد التعليقات</th>
                        <th class="text-center">الحالة</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($tickets as $ticket)
                        <tr class="odd" style="color:#283045;line-height:3.5rem">
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td class="priority text-center">{{ $ticket->subject }}</td>
                            <td class="priority text-center">{{ $ticket->created_at }}</td>
                            <td class="priority text-center">{{ count($ticket->comments) }}</td>
                            <td class="priority text-center" style="color: {{$ticket->status->color}}">
                                {{ $ticket->status->name }}
                            </td>
                            <td class="text-center" style="text-align: center;">
                                <a href="{{route('instructor-course-support-show', ['id' => $id, 'ticketId' => $ticket->id])}}"
                                   data-toggle="tooltip" data-placement="top" title="عرض" style="color: initial">
                                    <i class="fa fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
