<div class="outer-container">
    @if(!isset($trainees))
    <div class="row">
        <div class="col-12" style="color: #FFF;">
            <div class="alert alert-info">
                لا يوجد متدربين لهذه الدورة <i class="fa fa-exclamation-circle"></i>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-12">
            <table id="dtBasicExample" class="table course-table" width="100%">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">اسم الطالب</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trainees as $trainee)
                    <tr class="odd" style="color:#283045;line-height:3.5rem">
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="priority text-center">{{ $trainee->name_ar }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>