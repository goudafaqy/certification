<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\CategoryRepo;
use App\Http\Repositories\Validation\CategoryRepoValidation;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    var $categoryRepo;
    var $categoryValidation;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CategoryRepo $categoryRepo, CategoryRepoValidation $categoryValidation)
    {
        $this->categoryRepo = $categoryRepo;
        $this->categoryValidation = $categoryValidation;
        $this->middleware('auth');
    }

    /**
     * List the application categories ...
     */
    public function list()
    {
        $categories = $this->categoryRepo->getAll();
        return view("cp.categories.categories-list", ['categories' => $categories]);
    }


    /**
     * Get add category page ...
     */
    public function add()
    {
        return view("cp.categories.categories-add");
    }


    /**
     * Save category date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->categoryValidation->doValidate($inputs, 'insert');
        if ($validator->fails()) {
            return redirect('categories/add')->withErrors($validator)->withInput();
        }else{
            $category = $this->categoryRepo->save($inputs);
            if($category){
                return redirect('categories/list')->with('added', 'تمت إضافة فئة مستهدفة جديدة بنجاح');
            }
        }
    }


    /**
     * Get update category page ...
     */
    public function update($id)
    {
        $category = $this->categoryRepo->getById($id);
        return view("cp.categories.categories-update", ['category' => $category]);
    }

    /**
     * Update category date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->categoryValidation->doValidate($inputs, 'update');
        if ($validator->fails()) {
            return redirect('categories/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            unset($inputs['_token']);
            $category = $this->categoryRepo->update($inputs, $inputs['id']);
            if($category){
                return redirect('categories/list')->with('updated', 'تمت تعديل بيانات الفئة بنجاح');
            }
        }
    }


    /**
     * Delete category date ...
     */
    public function delete($id)
    {
        $result = $this->categoryRepo->delete($id);
        if($result){
            return redirect('categories/list')->with('deleted', 'تم حذف الفئة بنجاح');
        }
    }
}
