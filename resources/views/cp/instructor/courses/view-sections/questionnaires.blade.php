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
               href="{{route('instructor-course-questionnaire-form', ['id' => $id])}}">
                إنشاء إستبيان جديد
            </a>
            
                <table id="dtBasicExample" class="table course-table" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">عنوان</th>
                        <th class="text-center">تاريخ النشر</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($questionnaires as $questionnaire)
                        <tr class="odd" style="color:#283045;line-height:3.5rem">
                            <td class="text-center">{{ $loop->index + 1 }}</td>
                            <td class="priority text-center">{{ $questionnaire->name }}</td>
                            <td class="priority text-center">{{ $questionnaire->publish_date }}</td>
                            <td class="text-center" style="text-align: center;">
                                @if($questionnaire->publish_date < date("Y-m-d"))
                                    <a href="{{route('instructor-course-questionnaire-show', ['id' => $id, 'questId' => $questionnaire->id])}}"
                                       data-toggle="tooltip" data-placement="top" title="عرض" style="color: initial">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                @else
                                    <a href="{{route('instructor-course-questionnaire-edit', ['id' => $id, 'questId' => $questionnaire->id])}}"
                                       data-toggle="tooltip" data-placement="top" title="تعديل" style="color: initial">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('instructor-course-questionnaire-delete', ['id' => $id, 'questId' => $questionnaire->id])}}"
                                       data-toggle="tooltip" data-placement="top" title="حذف" style="color: initial">
                                        <i class="fa fa-times-circle"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
    </div>
</div>
