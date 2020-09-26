<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\QuestionnaireRepo;
use App\Http\Repositories\Validation\QuestionnaireRepoValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnairesController extends Controller
{
    var $questionnaireRepo;
    var $questionnaireRepoValidation;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        QuestionnaireRepo $questionnaireRepo,
        QuestionnaireRepoValidation $questionnaireRepoValidation
    )
    {
        $this->questionnaireRepo = $questionnaireRepo;
        $this->questionnaireRepoValidation = $questionnaireRepoValidation;


        $this->middleware('auth');
    }

    /**
     * List the application questionnaire ...
     */
    public function list()
    {
        $questionnaires = $this->questionnaireRepo->getBy('type', 'certification');
        return view("cp.questionnaires.questionnaires-list", ['questionnaires' => $questionnaires]);
    }


    /**
     * Get add questionnaire page ...
     */
    public function add()
    {
        return view("cp.questionnaires.questionnaires-form");
    }


    /**
     * Save questionnaire date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->questionnaireRepoValidation->doValidate($inputs, 'insert');
        if ($validator->fails()) {
            return redirect('questionnaires/add')->withErrors($validator)->withInput();
        }else{
            $inputs['home_page_display'] = (isset($inputs['home_page_display']) && $inputs['home_page_display'] == 'on') ? 1 : 0;
            $questionnaire = $this->questionnaireRepo->saveQuestionnaire($inputs, Auth::user()->id, 'certification');
            if($questionnaire){
                return redirect('questionnaires/list')->with('added', 'تم إضافة الاستبيان بنجاح');
            }else{
                return redirect('questionnaires/add')->with('invalid', 'عفوا لم يتم حفظ الاستبيان')->withInput();
            }
        }
    }


    /**
     * Get update questionnaire page ...
     */
    public function update($id)
    {
        $quest = $this->questionnaireRepo->getById($id);
        return view("cp.questionnaires.questionnaires-form", ['questionnaire' => $quest]);
    }

    /**
     * Update questionnaire date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->questionnaireRepoValidation->doValidate($inputs, 'update');
        if ($validator->fails()) {
            return redirect('questionnaires/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            unset($inputs['_token']);
            $inputs['home_page_display'] = (isset($inputs['home_page_display']) && $inputs['home_page_display'] == 'on') ? 1 : 0;
            $questionnaire = $this->questionnaireRepo->updateQuestionnaire($inputs, $inputs['id']);
            if($questionnaire){
                return redirect('questionnaires/list')->with('updated', 'تمت تعديل الاستبيان بنجاح');
            }else{
                return redirect('questionnaires/update/'.$inputs['id'])->with('invalid', 'عفوا لم يتم حفظ الاستبيان');
            }
        }
    }


    /**
     * Delete questionnaire date ...
     */
    public function delete($id)
    {
        $result = $this->questionnaireRepo->delete($id);
        if($result){
            return redirect('questionnaires/list')->with('deleted', 'تم حذف الاستبيان بنجاح');
        }
    }


    public function show($id)
    {
        $quest = $this->questionnaireRepo->getById($id);
        return view("cp.questionnaires.questionnaires-show", ['questionnaire' => $quest]);
    }

}
