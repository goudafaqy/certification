<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class ClassificationController extends Controller
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
     * List the application classification ...
     */
    public function list()
    {
        $classifications = DB::table('classifications')
            ->join('categories', 'classifications.cat_id', '=', 'categories.id')
            ->select('classifications.*', 'categories.title_ar as cat_title')
            ->get();
        return view("classifications.classifications-list", ['classifications' => $classifications]);
    }


    /**
     * Get add classification page ...
     */
    public function add()
    {
        $categories = DB::table('categories')->get();
        return view("classifications.classifications-add", ['categories' => $categories]);
    }


    /**
     * Save classification date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();

        $validator = Validator::make($inputs,[
            'title_ar'  => 'required',
            'title_en'  => 'required',
            'cat_id'    => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('classifications/add')->withErrors($validator)->withInput();
        }else{
            $classification = DB::table('classifications')->insert([
                'title_ar'  => $inputs['title_ar'],
                'title_en'  => $inputs['title_en'],
                'cat_id'    => $inputs['cat_id'],
            ]);
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
        $classification = DB::table('classifications')->where('id', $id)->first();
        $categories = DB::table('categories')->get();
        return view("classifications.classifications-update", ['classification' => $classification, 'categories' => $categories]);
    }

    /**
     * Update classification date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = Validator::make($inputs,[
            'title_ar'  => 'required',
            'title_en'  => 'required',
            'cat_id'    => 'required',
        ]);
        
        if ($validator->fails()) {
            return redirect('classifications/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            $classification = DB::table('classifications')->where('id', $inputs['id'])->update([
                'title_ar'  => $inputs['title_ar'],
                'title_en'  => $inputs['title_en'],
                'cat_id'    => $inputs['cat_id'],
            ]);
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
        $result = DB::table('classifications')->where('id', '=', $id)->delete();
        if($result){
            return redirect('classifications/list')->with('deleted', 'تم حذف التصنيف بنجاح');
        }
    }
}
