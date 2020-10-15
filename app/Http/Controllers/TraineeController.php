<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CourseUser;
use App\Models\User;
use App\Models\Course;

use App\Models\Verification;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
class TraineeController extends Controller
{
  

    
    public function list($id){
        $course = Course::find($id);
        $items = CourseUser::where('course',$id)->get();
        $finalItems=array();
        foreach($items as $item){
          $course = CourseUser::where('email',$item->email)->where('national_id',$item->national_id)->get();
          $courseuser = Course::find($course->id);
          $item->courses=$courseuser;
          $finalItems[]=$item;
        }
        $route = route('trainees-add',['course'=>$id]);

        return view('cp.trainees.list',['items'=>$finalItems,'course'=>$course,'route'=>$route]);
       
        
    }

    public function add($id)
    {
        $route = route('save-trainees');
        $course = Course::find($id);
        return view('cp.trainees.form', ['course'=>$course,'route'=>$route]);
    }

    public function update($id)
    {
        $item =  CourseUser::find($id);
        $course = Course::find($item->course);
        $route = route('update-trainees', ['id'=>$id] );

        return view("cp.trainees.form", ['item' => $item, 'route' => $route,'course'=>$course]);
    }


      /**
     * Save user date ...
     */
    public function create(Request $request)
    {
            $inputs = $request->input();
            $user = new CourseUser();
            $user->name =  $inputs['name'];
            $user->title=  $inputs['title'];
            $user->email =  $inputs['email'];
            $user->phone =  $inputs['phone'];
            $user->national_id =  $inputs['national_id'];
            $user->sex =  $inputs['sex'];
            $user->course = $inputs['course'];

           

            $check = CourseUser::where('course',$inputs['course'])->where('email',$inputs['email'])->where('national_id',$inputs['national_id'])->get();
            if($check)
            return redirect()->back()->with('deleted', 'البريد موجود بالفعل او رقم الهوية');

            $userId = $user->save();
            if($userId){
                return redirect('trainees/'.$inputs['course'])->with('added', 'تمت إضافة المتدرب بنجاح');
            }
        
    }

    public function edit(Request $request)
    {
            $inputs = $request->input();
            $user = CourseUser::find($inputs['id']);
            $user->name =  $inputs['name'];
            $user->email =  $inputs['email'];
            $user->title=  $inputs['title'];
            $user->phone =  $inputs['phone'];
            $user->national_id =  $inputs['national_id'];
            $user->sex =  $inputs['sex'];
            $user->course = $inputs['course'];
            $userId = $user->save();
            if($userId){
                return redirect('trainees/'.$inputs['course'])->with('added', 'تمت تعديل المتدرب بنجاح');
            }
    }


    

    /**
     * Delete classification date ...
     */
    public function delete($id,$course_id)
    {
        $result = CourseUser::where('id',$id)->delete();
        if($result){
            return redirect('trainees/'.$course_id)->with('added', 'تمت حذف المتدرب بنجاح');

        }
    }

    
    
}
