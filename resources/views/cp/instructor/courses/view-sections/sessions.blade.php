<div class="outer-container">
    @if(!isset($sessions))
    <div class="row">
        <div class="col-12" style="color: #FFF;">
            <div class="alert alert-info">
                لا يوجد محاضرات لهذه الدورة <i class="fa fa-exclamation-circle"></i>
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
                        <!-- <th class="text-center">اسم الدورة</th> -->
                        <th class="text-center">اليوم</th>
                        <th class="text-center">تاريخ المحاضرة</th>
                        <th class="text-center">وقت بداية المحاضرة</th>
                        <th class="text-center">وقت نهاية المحاضرة</th>
                        <th class="text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sessions as $session)
                    <tr style="color: #FFF">
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <!-- <td class="priority text-center">{{ $session->title }}</td> -->
                        <td class="priority text-center">{{ $session->day }}</td>
                        <td class="priority text-center">{{ $session->date }}</td>
                        <td class="priority text-center">{{ $session->from_time }}</td>
                        <td class="priority text-center">{{ $session->to_time }}</td>
                        <td class="priority text-center">
                            <a style="padding: 7px; border: solid 1px #A1825C;" href="{{isset($session->webinar)?$session->webinar->start_url:'#'}}" target="_blanck"><i class="far fa-play-circle"></i></a>
                            <a style="padding: 7px; border: solid 1px #A1825C; margin-right: 2px;" href="{{isset($session->webinar)?url('instructor/courses/webinar/'.$session->webinar->id.'/attendance'):'#'}}" target="_blanck"><i class="fa fa-list"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
