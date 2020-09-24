<div class="outer-container">
    <div class="row">
        <div class="col-12">

            <form id="add-evaluation-type-form"
                  action="{{ route('instructor-evaluation-term-save', ['id' => $id, 'type' => $type]) }}"
                  method="POST">
                @csrf
                <div class="row">
                    <div id="evaluation_term_form" class="col-md-11 d-flex justify-content-between hidden">
                        <div>
                            <div class="form-group input-group" style="min-width: 200px">
                                <select class="form-control selectpicker" id="term_type" name="evaluation_type"
                                        title="اختر نوع التقييم">
                                    <option value="الحضور">الحضور</option>
                                    <option value="امتحان عملي">امتحان عملي</option>
                                    <option value="new">نوع تقييم أخر</option>
                                </select>
                            </div>
                        </div>

                        <div id="term_name_container" style="display: none">
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="نوع التقييم"
                                       style="min-width: 250px"/>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <input type="number" class="form-control" name="score" placeholder="اعلى درجة"/>
                            </div>
                        </div>

                        <div style="min-width: 100px">
                            <button style="width: 100%; font-size: 1.3em; margin-top: 3px; padding: 0;"
                                    type="submit" class="btn btn-primary">اضافة
                            </button>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <a id="term-form-toggle"  class="btn btn-primary"
                           style="width: 100%; font-size: 1.3em; margin-top: 3px; padding: 8px;">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </form>

            @if (session('fail'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('fail') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <form id="add-update-form"
                  action="{{ route('instructor-evaluation-trainees-save', ['id' => $id, 'type' => $type]) }}"
                  method="POST">
                @csrf
                <table id="dtBasicExample" class="table course-table" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center">نوع التقييم</th>
                        <th class="text-center">مجموع الدرجات</th>
                        @foreach ($exams as $exam)
                            <th class="text-center">{{$exam->title_ar}}</th>
                        @endforeach
                        @foreach ($evaluations as $term)
                            <th class="text-center">{{$term->name}}
                                <a href="{{ route('instructor-evaluation-term-delete', ['id' => $id, 'termId' => $term->id, 'type' => $type]) }}">
                                    <i class="text-red fa fa-times"></i>
                                </a>
                            </th>
                        @endforeach
                        <th class="text-center">ناجح</th>
                    </tr>
                    <tr>
                        <th class="text-center">الدرجة</th>
                        <th class="text-center">{{$totalScore}} ({{$passingScore}})</th>
                        @foreach ($exams as $exam)
                            <th class="text-center">{{$exam->full_mark}}</th>
                        @endforeach
                        @foreach ($evaluations as $term)
                            <th class="text-center">{{$term->score}}</th>
                        @endforeach
                        <th class="text-center">راسب</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($trainees as $trainee)
                        <tr>
                            <td class="text-center">{{$trainee['name_ar']}}</td>
                            <td class="text-center"
                                id="trainee-{{$trainee['id']}}-total-grade">{{$trainee['total_grade']}}</td>
                            @foreach ($exams as $exam)
                                <td class="text-center trainee-{{$trainee['id']}}-exams-grade">{{$trainee['exams'][$exam->id]}}</td>
                            @endforeach
                            @foreach ($evaluations as $term)
                                <td class="text-center">
                                    <input type="number" name="evaluation[{{$trainee['id']}}][{{$term->id}}]"
                                           value="{{$trainee['evaluations'][$term->id]}}" style="max-width: 50px"
                                           max="{{$term->score}}" min="0" data-trainee="{{$trainee['id']}}"
                                           class="evaluation_inputs" step="any">
                                </td>
                            @endforeach
                            <td class="text-center">
                                <i class="fa fa-check-circle text-green {{$trainee['total_grade']<$passingScore?'hidden':''}}"
                                   id="trainee-{{$trainee['id']}}-pass-symbol"></i>
                                <i class="fa fa-times-circle text-red {{$trainee['total_grade']>=$passingScore?'hidden':''}}"
                                   id="trainee-{{$trainee['id']}}-fail-symbol"></i>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="col-md-12">
                    <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">حفظ</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#term_type').on('change', function () {
                const val = $(this).val();
                val === 'new' ? $('#term_name_container').show() : $('#term_name_container').hide();
            });

            $('#term_type').change();


            const passingScore = {{$passingScore}};

            $('.evaluation_inputs').on('change', function () {
                if (parseFloat($(this).val()) > parseFloat($(this).attr('max')))
                    $(this).val($(this).attr('max'));

                const trainee_id = $(this).data('trainee');
                var traineeTotal = 0;

                $('.evaluation_inputs').each(function () {
                    if ($(this).data('trainee') === trainee_id) {
                        traineeTotal += parseFloat($(this).val());
                    }
                });

                const examsDivId = '.trainee-' + trainee_id + '-exams-grade';
                $(examsDivId).each(function () {
                    traineeTotal += parseFloat($(this).html());
                });

                const gradeDivId = '#trainee-' + trainee_id + '-total-grade';
                $(gradeDivId).html(traineeTotal);

                console.log(passingScore, traineeTotal);

                const passIcon = "#trainee-" + trainee_id + "-pass-symbol";
                const failIcon = "#trainee-" + trainee_id + "-fail-symbol";
                if (traineeTotal >= passingScore) {
                    $(passIcon).removeClass('hidden');
                    $(failIcon).addClass('hidden');
                } else {
                    $(failIcon).removeClass('hidden');
                    $(passIcon).addClass('hidden');
                }
            });


            $('#term-form-toggle').on('click', function () {
                const isShow = !$("#evaluation_term_form").hasClass('hidden');
                if(isShow){
                    $("#evaluation_term_form").addClass('hidden');
                    $(this).find('i').removeClass('fa-times').addClass('fa-plus');
                    $(this).removeClass('btn-danger').addClass('btn-primary')
                }else{
                    $("#evaluation_term_form").removeClass('hidden');
                    $(this).find('i').addClass('fa-times').removeClass('fa-plus');
                    $(this).addClass('btn-danger').removeClass('btn-primary')
                }
            });
        });
    </script>
@endpush
