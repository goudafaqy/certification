<div class="outer-container">
    <div class="row">
        <div class="col-12">
            <a class="float-left btn btn-danger"
               href="{{route('instructor-courses-view', ['id' => $id, 'tab' => 'questionnaires'])}}"
               style="margin-bottom:0.5rem">الرجوع</a>
        </div>

        @if (session('invalid'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('invalid') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form id="ticket-form"
              action="{{$questionnaire->id?
route('instructor-course-questionnaire-update', ['id' => $id, 'type' => $type, 'questId' => $questionnaire->id]):
route('instructor-course-questionnaire-save', ['id' => $id, 'type' => $type])}}" method="POST"
              enctype="multipart/form-data" style="width: 100%">
            @csrf
            <div class="row justify-content-center" style="padding: 5px 50px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subject">العنوان</label>
                        <input required class="form-control @error('name') is-invalid @enderror" id="name"
                               name="name" value="{{old('name', @$questionnaire->name)}}" type="text">
                    </div>
                    @error('name')
                    <span class="text-danger err-msg-name" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="subject">تاريخ النشر</label>
                        <div class="form-group input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text icon-dates" id="basic-addon1"><i
                                        class="fas fa-calendar-week"></i></span>
                            </div>
                            <input class="form-control  @error('publish_date') is-invalid @enderror"
                                   id="publish_date" name="publish_date"
                                   value="{{old('publish_date', @$questionnaire->publish_date)}}" type="date"
                                   style=" padding-right:50px !important; " required>
                        </div>
                        @error('publish_date')
                        <span class="text-danger err-msg-publish_date" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="container text-right" id="questions-section">

            </div>

            <div class="d-flex flex-row-reverse ml-5">
                <button type="button" class="btn btn-info" id="addNewBtn">اضف سؤال جديد</button>
            </div>

            <div class="col-md-12">
                <button style="width: 25%; margin-top: 50px;" type="submit" class="btn btn-primary">
                    {{$questionnaire->id?"تعديل":"إنشاء"}}
                </button>
            </div>
        </form>

    </div>

</div>


@push('scripts')
    <script>

        let oldValues = {};

        let questionsNum = 0;

        function loadOldQuestions()
        {
            let questions = {!! json_encode(isset($questionnaire->questions)?$questionnaire->questions:[]) !!};

            if (questions.length === 0) {
                addQuestionBlock();
            }
            questions.forEach(function (question) {
                addQuestionBlock(question);
            });

            updateDisplayNumbers();
        }

        loadOldQuestions();


        function addQuestionBlock(question = null)
        {
            questionsNum++;

            let questionData = {
                'quest': "",
                'type': '',
                'num': 2,
                'choices': ['', ''],
                'min': 1,
                'miax': 10,
            };

            if (question) {
                const choices = question['choices'] ? question['choices'] : [];

                questionData = {
                    'quest': question['question'],
                    'type': question['type'],
                    'num': choices.length,
                    'choices': choices,
                    'min': question['min_num'],
                    'max': question['max_num'],
                };
            }

            if (!oldValues[questionsNum]) oldValues[questionsNum] = {};

            const mcQuestionDiv = questionData['type'] === 'MC' ?
                addMCQuestionBlock(questionsNum, questionData['num'], questionData['choices']) :
                addMCQuestionBlock(questionsNum, 2, ['', ''], false);

            const scQuestionDiv = questionData['type'] === 'SC' ?
                addSCQuestionBlock(questionsNum, questionData['num'], questionData['choices']) :
                addSCQuestionBlock(questionsNum, 2, ['', ''], false);

            const nmQuestionDiv = questionData['type'] === 'NM' ?
                addNMQuestionBlock(questionsNum, questionData['min'], questionData['max']) :
                addNMQuestionBlock(questionsNum, 1, 10, false);

            const mcSelect = questionData['type'] === 'MC' ? 'selected' : '';
            const scSelect = questionData['type'] === 'SC' ? 'selected' : '';
            const nmSelect = questionData['type'] === 'NM' ? 'selected' : '';

            $("#questions-section").append(`<div id="question_${questionsNum}-div" class="card col-12 ">
                    <div class="card-body">
                        <div class="row justify-content-between" style="padding: 5px 50px;">
                            <h4>السؤال #<span class="questionDisplayNumber">${questionsNum}</span></h4>
                            <button type="button" data-no="${questionsNum}" class="btn btn-danger removeBtn">حذف</button>
                        </div>
                        <div class="row justify-content-center" style="padding: 5px 50px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="questionType_1">نوع السؤال</label>
                                    <select required class="form-control questionTypeInput" data-no="${questionsNum}" id="questionType_${questionsNum}"
                                            name="questions[${questionsNum}][type]">
                                        <option value="" disabled selected>اختر نوع السؤال</option>
                                        <option ${mcSelect} value="MC">اختيار متعدد</option>
                                        <option ${scSelect} value="SC">اختيار وحيد</option>
                                        <option ${nmSelect} value="NM">رقمي</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="question_${questionsNum}">السؤال</label>
                                    <input class="form-control" id="question_${questionsNum}" required
                                           name="questions[${questionsNum}][question]" value="${questionData['quest']}" type="text">
                                </div>
                            </div>
                        </div>

                        ${mcQuestionDiv}
                        ${scQuestionDiv}
                        ${nmQuestionDiv}
                        </div>
                </div>`)

            loadQuestionChoices($('#question-sc_choice-no_' + questionsNum).val(), questionsNum, 'sc');
            loadQuestionChoices($('#question-mc_choice-no_' + questionsNum).val(), questionsNum, 'mc');
        }


        function addSCQuestionBlock(questionsNum, num, choices, selected = true)
        {
            let choiceDiv = '';
            for (let i = 0; i < num; i++) {
                if (selected) oldValues[questionsNum][i] = choices[i];
                choiceDiv +=
                    `<div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control question-sc-choice" data-no="${questionsNum}" data-i="${i}"
                                   name="questions[${questionsNum}][sc][]" value="${choices[i]}" type="text"
                                   placeholder="الخيار رقم ${i}">
                        </div>
                    </div>`;
            }

            const displayOption = selected ? '' : 'display: none;';

            return `<div class="card">
                        <div class="card-body" id="question_${questionsNum}-sc-div" style="${displayOption} padding: 5px 50px;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="question_choice-no_${questionsNum}" style="color: #35415b;">عدد الاختيارات</label>
                                    <input class="form-control questionSCNumInput" value="${num}" data-no="${questionsNum}"
                                           type="number" id="question-sc_choice-no_${questionsNum}" required>
                                </div>
                            </div>
                            <div class="row" id="question_${questionsNum}-sc-choices-div">
                                ${choiceDiv}
                            </div>
                        </div>
                    </div>`;
        }

        function addMCQuestionBlock(questionsNum, num, choices, selected = true)
        {
            let choiceDiv = '';
            for (let i = 0; i < num; i++) {
                oldValues[questionsNum][i] = choices[i];
                choiceDiv +=
                    `<div class="col-md-6">
                        <div class="form-group">
                            <input class="form-control question-mc-choice" data-no="${questionsNum}" data-i="${i}"
                                   name="questions[${questionsNum}][mc][]" value="${choices[i]}" type="text"
                                   placeholder="الخيار رقم ${i}">
                        </div>
                    </div>`;
            }

            const displayOption = selected ? '' : 'display: none;';

            return `<div class="card">
                        <div class="card-body" id="question_${questionsNum}-mc-div" style="${displayOption} padding: 5px 50px;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="question_choice-no_${questionsNum}" style="color: #35415b;">عدد الاختيارات</label>
                                    <input class="form-control questionMCNumInput" value="${num}" data-no="${questionsNum}"
                                           type="number" id="question-mc_choice-no_${questionsNum}" required>
                                </div>
                            </div>
                            <div class="row" id="question_${questionsNum}-mc-choices-div">
                                ${choiceDiv}
                            </div>
                        </div>
                    </div>`;
        }

        function addNMQuestionBlock(questionsNum, min, max, selected = true)
        {
            const displayOption = selected ? '' : 'display: none;';
            return `<div class="card">
                        <div class="card-body row" id="question_${questionsNum}-num-div"
                             style="${displayOption} padding: 5px 50px;">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="questionNMin_${questionsNum}" style="color: #35415b;">اقل قيمة</label>
                                    <input class="form-control" id="questionNMin_${questionsNum}" required
                                           name="questions[${questionsNum}][min_num]" value="${min}" type="number">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="questionNMax_${questionsNum}" style="color: #35415b;">اعلى قيمة</label>
                                    <input required class="form-control" id="questionNMax_${questionsNum}"
                                           name="questions[${questionsNum}][max_num]" value="${max}" type="number">
                                </div>
                            </div>
                        </div>
                    </div>`;
        }


        $('#questions-section').on('keyup', ".questionSCNumInput", function () {
            let val = $(this).val();
            const questionNo = $(this).data('no');

            if (isNaN(val)) return false;
            if (val < 1) {
                $(this).val(1);
                val = 1;
            }

            return loadQuestionChoices(val, questionNo, 'sc')
        });

        $('#questions-section').on('keyup', '.question-sc-choice', function () {
            const questionNo = $(this).data('no');
            const i = $(this).data('i');

            if (!oldValues[questionNo]) oldValues[questionNo] = {};
            oldValues[questionNo][i] = $(this).val();
        })

        $('#questions-section').on('keyup', ".questionMCNumInput", function () {
            let val = $(this).val();
            const questionNo = $(this).data('no');

            if (isNaN(val)) return false;
            if (val < 1) {
                $(this).val(1);
                val = 1;
            }

            return loadQuestionChoices(val, questionNo, 'mc')
        });

        $('#questions-section').on('keyup', '.question-mc-choice', function () {
            const questionNo = $(this).data('no');
            const i = $(this).data('i');

            if (!oldValues[questionNo]) oldValues[questionNo] = {};
            oldValues[questionNo][i] = $(this).val();
        })


        $('#questions-section').on('change', '.questionTypeInput', function () {
            const val = $(this).val();
            const questionNo = $(this).data('no');

            if (val === 'NM') {
                $('#question_' + questionNo + '-num-div').show();
                $('#question_' + questionNo + '-sc-div').hide();
                $('#question_' + questionNo + '-mc-div').hide();
            }
            if (val === 'SC') {
                $('#question_' + questionNo + '-sc-div').show();
                $('#question_' + questionNo + '-num-div').hide();
                $('#question_' + questionNo + '-mc-div').hide();

                loadQuestionChoices($('#question-sc_choice-no_' + questionNo).val(), questionNo, 'sc')
            }
            if (val === 'MC') {
                $('#question_' + questionNo + '-mc-div').show();
                $('#question_' + questionNo + '-num-div').hide();
                $('#question_' + questionNo + '-sc-div').hide();

                loadQuestionChoices($('#question-mc_choice-no_' + questionNo).val(), questionNo, 'sc')
            }

        })


        $('#questions-section').on('click', '.removeBtn', function () {
            const questionNo = $(this).data('no');
            $('#question_' + questionNo + '-div').remove();
            updateDisplayNumbers();
        });

        $('#addNewBtn').click(function () {
            addQuestionBlock();
            updateDisplayNumbers();
        });

        function loadQuestionChoices(num, questionNo, type)
        {
            if (isNaN(num) || num < 1) return false;

            $("#question_" + questionNo + "-" + type + "-choices-div").html('');
            for (let i = 0; i < num; i++) {
                const oldVal = oldValues[questionNo] && oldValues[questionNo][i] ? oldValues[questionNo][i] : '';
                $("#question_" + questionNo + "-" + type + "-choices-div").append(`
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control question-${type}-choice" data-no="${questionNo}" data-i="${i}" name="questions[${questionNo}][${type}][]"
                               value="${oldVal}" type="text" placeholder="الخيار رقم ${i + 1}">
                    </div>
                </div>
                `)
            }

            return true;
        }


        function updateDisplayNumbers()
        {
            let i = 0;
            $('.questionDisplayNumber').each(function () {
                i++;
                $(this).html(i);
            })

            if (i <= 1) $('.removeBtn').hide();
            else $('.removeBtn').show();
        }


    </script>
@endpush
