<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * List the application categories ...
     */
    public function list()
    {
        $categories = DB::table('categories')->get();
        return view("categories.categories-list", ['categories' => $categories]);
    }


    /**
     * Get add category page ...
     */
    public function add()
    {
        return view("categories.categories-add");
    }


    /**
     * Save category date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();

        $validator = Validator::make($inputs,[
            'title_ar' => 'required',
            'title_en' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('categories/add')->withErrors($validator)->withInput();
        }else{
            $category = DB::table('categories')->insert([
                'title_ar' => $inputs['title_ar'],
                'title_en' => $inputs['title_en'],
            ]);
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
        $category = DB::table('categories')->where('id', $id)->first();
        return view("categories.categories-update", ['category' => $category]);
    }

    /**
     * Update category date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = Validator::make($inputs,[
            'title_ar' => 'required',
            'title_en' => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('categories/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            $category = DB::table('categories')->where('id', $inputs['id'])->update([
                'title_ar' => $inputs['title_ar'],
                'title_en' => $inputs['title_en'],
            ]);
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
        $result = DB::table('categories')->where('id', '=', $id)->delete();
        if($result){
            return redirect('categories/list')->with('deleted', 'تم حذف الفئة بنجاح');
        }
    }
}
