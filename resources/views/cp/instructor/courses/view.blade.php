@include('cp.common.dashboard-header', ['role' => 2])
@include('cp.common.sidebar_instructor', ['active' => 'instructor-courses-view'])
<link rel="stylesheet" href="{{asset('css/course-view.css')}}"/>
<div class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="widget">
                    <div class="card">
                        <div class="d-flex border-0">
                            <div class="p-2 flex-fill">
                                <!-- Course Details -->

                                <div class="d-flex flex-column bg-light mb-3">
                                    <div class="p-2 mb-4">
                                        كود الدورة : {{$course->code}}
                                    </div>
                                    <div class="p-2 mb-4">
                                        اسم الدورة : {{$course->title_ar}}
                                    </div>
                                    <div class="p-2 mb-4">
                                        تبدأ في : {{$course->start_date}}
                                    </div>
                                    <div class="p-2 mb-4">
                                        تنتهي في : {{$course->end_date}}
                                    </div>
                                    <div class="p-2 mb-4">
                                        عدد المتدربين : {{10}}
                                    </div>
                                </div>
                            </div>

                            <div class="p-2 flex-fill">
                                <!-- Image -->
                                <img src="{{asset($course->image)}}" class="img-thumbnail" style="width: 450px">
                            </div>

                            <div class="p-2 flex-fill">

                                <!-- Course Options -->
                                <div class="d-flex flex-column bg-light mb-3">
                                    <div class="p-2 mb-4">
                                        واجبات :
                                        @if($course->assi_check)
                                            <i class="fa text-green fa-check-circle"></i>
                                        @else
                                            <i class="fa text-red fa-times-circle"></i>
                                        @endif
                                    </div>
                                    <div class="p-2 mb-4">
                                        امتحانات :
                                        @if($course->exam_check)
                                            <i class="fa text-green fa-check-circle"></i>
                                        @else
                                            <i class="fa text-red fa-times-circle"></i>
                                        @endif
                                    </div>
                                    <div class="p-2 mb-4">
                                        مستوي الدورة
                                        : {{$course->skill_level=='a'?'متقدم':($course->skill_level=='m'?"متوسط" : "مبتدئ")}}
                                    </div>
                                    <div class="p-2 mb-4">
                                        <p>{{$course->overview}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="widget">
                    <div class="card">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'sessions'?'active':''}}"
                                   href="{{$tab != 'sessions'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'sessions']):"javascript:void(0);"}}">
                                    الجلسات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'materials'?'active':''}}"
                                   href="{{$tab != 'materials'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'materials']):"javascript:void(0);"}}">
                                    المواد الدراسية
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'books'?'active':''}}"
                                   href="{{$tab != 'books'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'books']):"javascript:void(0);"}}">
                                    كتب التدريب
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'updates'?'active':''}}"
                                   href="{{$tab != 'updates'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'updates']):"javascript:void(0);"}}">
                                    التحديثات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'exams'?'active':''}}"
                                   href="{{$tab != 'exams'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'exams']):"javascript:void(0);"}}">
                                    الامتحانات والواجبات
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'evaluation'?'active':''}}"
                                   href="{{$tab != 'evaluation'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'evaluation']):"javascript:void(0);"}}">
                                    التقييم
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{$tab == 'trainees'?'active':''}}"
                                   href="{{$tab != 'trainees'? route('instructor-courses-view', ['id' => $course->id, 'tab' => 'trainees']):"javascript:void(0);"}}">
                                    المتدربين
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane show active" id="nav-home">

                                @if($tab == 'exams')

                                    <div class="widget">
                                        <div class="card">

                                            <div class="row justify-content-center">
                                                <div class="col-md-12 table-container">
                                                    <div class="d-inline-flex float-left">
                                                        <button class="btn btn-lg btn-primary m-2"> إضافة امتحان
                                                            جديد
                                                        </button>
                                                        <button class="btn btn-lg btn-info m-2"> إضافة واجب جديد
                                                        </button>
                                                    </div>
                                                    <table id="dtBasicExample" class="table" width="100%">
                                                        <thead>
                                                        <tr>
                                                            <th class="th-sm text-center">#</th>
                                                            <th class="th-sm text-center">الامتحان/الواجب</th>
                                                            <th class="th-sm text-center">التاريخ</th>
                                                            <th class="th-sm text-center">اليوم</th>
                                                            <th class="th-sm text-center">البداية</th>
                                                            <th class="th-sm text-center">النهاية</th>
                                                            <th class="th-sm text-center">الإجراءات</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach ($exams as $exam)
                                                            <tr>
                                                                <td class="text-center">{{ $loop->index + 1 }}</td>
                                                                <td class="text-center">{{ "" }}</td>
                                                                <td class="text-center">{{ "" }}</td>
                                                                <td class="text-center">{{ "" }}</td>
                                                                <td class="text-center">{{ "" }}</td>
                                                                <td class="text-center">{{ "" }}</td>
                                                                <td class="text-center">
                                                                    <a class="btn btn-info" href="#"
                                                                       data-toggle="tooltip" data-placement="top"
                                                                       title="عرض "><i
                                                                            style="position: relative; top: -2px; right: -4px"
                                                                            class="fa fa-building"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('cp.common.dashboard-footer')
