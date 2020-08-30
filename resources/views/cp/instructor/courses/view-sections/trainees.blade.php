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
            <table class="course-view-table" style="overflow-x:auto;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">اسم الطالب</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trainees as $trainee)
                    <tr>
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