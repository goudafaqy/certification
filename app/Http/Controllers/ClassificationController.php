<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\ClassificationRepo;
use App\Http\Repositories\Eloquent\CategoryRepo;
use App\Http\Repositories\Validation\ClassificationRepoValidation;
use Illuminate\Http\Request;

class ClassificationController extends Controller
{
    var $classRepo;
    var $classValidation;

    var $categoryRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        ClassificationRepo $classRepo, 
        ClassificationRepoValidation $classValidation,
        CategoryRepo $categoryRepo
    )
    {
        $this->classRepo = $classRepo;
        $this->classValidation = $classValidation;
        $this->categoryRepo = $categoryRepo;
        $this->middleware('auth');
    }

    /**
     * List the application classification ...
     */
    public function list()
    {
        $classifications = $this->classRepo->getAll();
        return view("cp.classifications.classifications-list", ['classifications' => $classifications]);
    }


    /**
     * Get add classification page ...
     */
    public function add()
    {
        $categories = $this->categoryRepo->getAll();
        return view("cp.classifications.classifications-add", ['categories' => $categories]);
    }


    /**
     * Save classification date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->classValidation->doValidate($inputs, 'insert');
        if ($validator->fails()) {
            return redirect('classifications/add')->withErrors($validator)->withInput();
        }else{
            $classification = $this->classRepo->save($inputs);
            if($classification){
                return redirect('classifications/list')->with('added', 'تم إضافة تصنيف جديد بنجاح');
            }
        }
    }


    /**
     * Get update classification page ...
     */
    public function update($id)
    {
        $classification = $this->classRepo->getById($id);
        $categories = $this->categoryRepo->getAll();
        return view("cp.classifications.classifications-update", ['classification' => $classification, 'categories' => $categories]);
    }

    /**
     * Update classification date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->classValidation->doValidate($inputs, 'update');     
        if ($validator->fails()) {
            return redirect('classifications/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            unset($inputs['_token']);
            $classification = $this->classRepo->update($inputs, $inputs['id']);
            if($classification){
                return redirect('classifications/list')->with('updated', 'تمت تعديل بيانات التصنيف بنجاح');
            }
        }
    }


    /**
     * Delete classification date ...
     */
    public function delete($id)
    {
        $this->classRepo->deleteAssocciated($id);
        $result = $this->classRepo->delete($id);
        if($result){
            return redirect('classifications/list')->with('deleted', 'تم حذف التصنيف بنجاح');
        }
    }
}
