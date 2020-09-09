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

    <div class="actions">
                <div class="btn-group">
                    <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">الاجراءات
                        <i class="fa fa-angle-down"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="javascript:void(0);" rel="delete_all" class="do_action_all">
                                <i class="ace-icon fa fa-trash font-red-haze"></i>  أستخراج شهادات الدورة  </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" rel="activate_all" class="do_action_all">
                                <i class="fa fa-unlock font-blue-sharp"></i> ارسال بريد ألكترونى  </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);" rel="inactivate_all" class="do_action_all">
                                <i class="fa fa-lock font-blue-sharp"></i> أعادة فتح الاختبار </a>
                        </li>
                    </ul>
                </div>
    </div>
    <br> <br> <br>

        <div class="col-12">
            <table id="dtBasicExample" class="table course-table" width="100%">
                <thead>
                    <tr>
                    <th>
                        <label class="mt-checkbox">
                                <span></span>
                        </label>
                    </th>
                        <th class="text-center">#</th>
                        <th class="text-center">اسم الطالب</th>
                    </tr>
                </thead>
                <tbody>
                    <form action="{{route('generate_certificates')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{$course->id}}" name="course" >
                    @foreach ($trainees as $trainee)
                    <tr class="odd" style="color:#283045;line-height:3.5rem">
                    <td>
                                            <label class="mt-checkbox">
                                                <input class="checkBoxClass" id="ids{{ $trainee->id }}" type="checkbox" value="{{ $trainee->id }}" name="ids[]" />
                                                <span></span>
                                            </label>
                                        </td>
                        <td class="text-center">{{ $loop->index + 1 }}</td>
                        <td class="priority text-center">{{ $trainee->name_ar }}</td>
                    </tr>
                    @endforeach
                    <input type="submit" value="Save">
                    </form>
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>