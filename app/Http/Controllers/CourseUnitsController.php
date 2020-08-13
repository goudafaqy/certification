<?php

namespace App\Http\Controllers;
use App\Http\Repositories\Eloquent\UnitRepo;
use App\Http\Repositories\Validation\UnitRepoValidation;
use Illuminate\Http\Request;

class CourseUnitsController extends Controller
{
    var $validation;
    var $UnitRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(

        UnitRepoValidation $validation,
        UnitRepo $UnitRepo
    )
    {
        $this->validation = $validation;
        $this->UnitRepo = $UnitRepo;
        $this->middleware('auth');
    }

    /**
     * List the application classification ...
     */
    public function list($section_id)
    {
        $items  = $this->UnitRepo->getAll($section_id);
        return view("units.list", ['items' => $items   ,'section_id'=>$section_id]);
    }


    /**
     * Get add classification page ...
     */
    public function add($section_id)
    {
        $item = new $this->UnitRepo();
        $title = __('app.New Element'); 
        $route = route('save-units',['section_id'=>$section_id]);
        return view("units.form", ['route'=> $route ,'title'=>$title ,'item' => $item ,'section_id' =>$section_id]);
    }


    /**
     * Save classification date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();
        $validator = $this->validation->doValidate($inputs, 'insert');
        if ($validator->fails()) {
            
            return redirect('units/add/'.$inputs['section_id'])->withErrors($validator)->withInput();
        }else{
           
            $Section = $this->UnitRepo->save($inputs);
            if($Section){
                return redirect('units/'.$inputs['section_id'])->with('added', __('app.Element Added Auccessfully'));
            }
        }
    }


    /**
     * Get update classification page ...
     */
    public function update($id)
    {
        $item = $this->UnitRepo->getById($id);
        $route = route('update-units',['section_id'=> $item->section_id ,'id'=>$id]);
        $title = __('app.Update Element'); 
        return view("units.form", ['item' => $item,  'route' => $route, 'title' =>  $title ,'section_id'=>$item->section_id]);
    }

    /**
     * Update classification date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->validation->doValidate($inputs, 'update');     
        if ($validator->fails()) {
            return redirect('units/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
           
            unset($inputs['_token']);
            $classification = $this->UnitRepo->update($inputs, $inputs['id']);
            if($classification){
                return redirect('units/'.$inputs['section_id'])->with('updated', __('app.Element Updated Auccessfully'));
            }
        }
    }


    /**
     * Delete classification date ...
     */
    public function delete($id,$section_id)
    {
        $result = $this->UnitRepo->delete($id);
        if($result){
            return redirect('units/'.$section_id)->with('deleted', __('app.Element Deleted Auccessfully'));
        }
    }
}