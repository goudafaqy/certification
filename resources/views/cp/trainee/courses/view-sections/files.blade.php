<div class="outer-container">
    @if(!isset($files))
    <div class="row">
        <div class="col-12" style="color: #FFF;">
            <div class="alert alert-info">
                لا يوجد ملفات لهذه الدورة <i class="fa fa-exclamation-circle"></i>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-12">
            <table class="course-view-table" style="overflow-x:auto;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">اسم الملف</th>
                        <th class="text-center">نوع الملف</th>
                        <th class="text-center">وصف الملف</th>
                        <th class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                    <tr>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="priority text-center">{{ $file->name_ar }}</td>
                        <td class="text-center">
                            @if($file->type == 'guide_t')
                            {{__('app.Material guide_t')}}
                            @elseif($file->type == 'guide_i')
                            {{__('app.Material guide_i')}}
                            @elseif($file->type == 'img')
                            {{__('app.Material img')}}
                            @elseif($file->type == 'extra')
                            {{__('app.Material extra')}}
                            @else
                            {{__('app.Material book')}}
                            @endif
                        </td>
                        <td class="priority text-center">{{ $file->description }}</td>
                        <td class="priority text-center">
                            <a href="{{ url($file->source) }}" target="_blanck" class="btn btn-primary">تحميل الملف <i class="fa fa-download"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>