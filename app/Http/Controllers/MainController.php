<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CourseUser;
use App\Models\Course;
use Auth;

use Spiritix\Html2Pdf\Converter;
use Spiritix\Html2Pdf\Input\UrlInput;
use Spiritix\Html2Pdf\Output\DownloadOutput;
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
use Johntaa\Arabic\I18N_Arabic;
use Intervention\Image\Facades\Image;

class MainController extends Controller
{

    public function mail()
    {
      
      $email = new EmailVerification('20025' , 'مركز التدريب العدلى' ,'تأكيد الحساب الخاص بك');
      Mail::to('mohgood2020@gmail.com')->send($email);
    }

    public function index()
    {
        if( !session()->has('user')){
            return redirect('/login');
        }
       
       $national_id =  session()->get('national_id');
       $courses = CourseUser::where('national_id', $national_id)->with('details')->get();
       return view('home',['courses'=>$courses,"national_id"=>$national_id]);
    }
    public function view($national_id,$course_id){
        $user = CourseUser::where('national_id', $national_id)->where('course', $course_id)->first();
        $course = Course::find($user->course);
        $data = ['title' => $user->title,
                    'Trainee_name' => $user->name, 
                    'national_id'=>$this->enToAr($user->national_id),
                    'n_id' => $user->national_id,
                    'course_name'=>$course->name,
                    'id'=>$course->id,
                    'sex'=>$user->sex, 
                    'form'=>$course->form                   
                    ]; 

                

        if(isset($course->date))      $data['date']=$course->date;
        if(isset($course->days))      $data['days']=$course->days;
        if(isset($course->hours))     $data['hours']=$course->hours;
        if(isset($course->fromDate))  $data['fromDate']=$course->fromDate;
        if(isset($course->toDate))    $data['toDate']=$course->toDate;
        if(isset($course->year))      $data['year'] = $this->enToAr($course->year);
        if(isset($course->type))      $data['type'] = $course->type ;
        if(isset($course->certification_title))   $data['certification_title'] = $course->certification_title ;
        if(isset($course->location))  $data['location'] = $course->location ;
                
        $decideView="";
        if(in_array($course->form,array(1,2)))
          $decideView="cert12";
        if(in_array($course->form,array(3,4)))
          $decideView="cert34";
        if(in_array($course->form,array(5)))
          $decideView="cert5";
        if(in_array($course->form,array(6)))
          $decideView="cert6";
          
        return view($decideView,['data'=>$data]);
    }
    public function print($national_id,$course_id){

            $user = CourseUser::where('national_id', $national_id)->where('course', $course_id)->first();
            $course = Course::find($user->course);
            $viewUrl = url('view').'/';
            $url=$viewUrl.$national_id.'/'.$course_id;	
            $input = new UrlInput();
            $input->setUrl($url);  
            $converter = new Converter($input, new DownloadOutput());
            $converter->setOption('landscape', true);
            $converter->setOption('format', 'A4');
            $converter->setOption('margin',"{top: '0px', right:'0px',bottom: '0px', left: '0px'}");

            $output = $converter->convert();
            $output->download($course->name.'.pdf');
    }
    
    public function verification($national_id,$course_id){

        $user = CourseUser::where('national_id', $national_id)->where('course', $course_id)->first();
        $course = Course::find($user->course);

        $data = ['title' => $user->title,
                    'Trainee_name' => $user->name, 
                    'n_id' => $user->national_id,
                    'date'=>$course->date,
                    'days'=>$course->days,
                    'hours'=>$course->hours,
                    'course_name'=>$course->name,
                    'form'=>$course->form,
                    'fromDate'=>$course->fromDate,
                    'toDate'=>$course->toDate,
                    'id'=>$course->id
                    
                    ]; 
                    return view('verify_certificate',['data'=>$data]);
    }
    
 

        /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
   
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import(Request $request) 
    {

        $course = new Course();
        $course->name = $request->course ;
        $course->hours = $this->enToAr($request->hours) ;
        $course->days = $this->enToAr($request->days) ;
        $course->date = $this->enToAr($request->date) ;
        $course->form = $request->form ;
        $course->year =  $this->enToAr($request->year) ;
        $course->type = $request->type ;
        $course->certification_title = $request->certification_title ;
        $course->location = $request->location ;
        $course->created_by = Auth::user()->id ;
	    $course->fromDate = $this->enToAr($request->fromDate) ;
	    $course->toDate = $this->enToAr($request->toDate) ;
        $course->save();
        $request->request->add(['course_id' => $course->id]);
        Excel::import(new UsersImport,$request->file);
        return redirect('/courses')->with('added', 'تم اضافة الدورة');
    }

    
    
    public function enToAr($string) {
        return strtr($string, array('0'=>'٠','1'=>'١','2'=>'٢','3'=>'٣','4'=>'٤','5'=>'٥','6'=>'٦','7'=>'٧','8'=>'٨','9'=>'٩'));
    }


    public function list()
    {
        if(Auth::user()->role == 'admin'){
            $items = Course::all();
        }else{
            $items = Course::where('created_by',Auth::user()->id)->orderBy('created_at','desc')->get(); 
        }
        return view('cp.import_courses.list',['items'=>$items]);
    }

    public function delete($id){
        $trainees= CourseUser::where('course', $id)->get();
        foreach($trainees as $trainee){
            $trainee->delete();
        }
        $course = Course::find($id);
        $result = $course->delete();
        if($result)
             return redirect('/courses')->with('deleted', 'تم حذف الدورة بنجاح');
    }
    public function edit($id){
        $course = Course::find($id);
        return view('cp.import_courses.edit',['course'=>$course]);
    } 
    public function update(Request $request) 
    {        
        $course = Course::find($request->course_id);
        $course->name = $request->course ;
        $course->hours = $this->enToAr($request->hours) ;
        $course->days = $this->enToAr($request->days) ;
        $course->date = $this->enToAr($request->date) ;
        $course->form = $request->form ;
        $course->year = $request->year ;
        $course->type = $request->type ;
        $course->certification_title = $request->certification_title ;
        $course->location = $request->location ;
        $course->created_by = Auth::user()->id ;
	    $course->fromDate = $this->enToAr($request->fromDate) ;
	    $course->toDate = $this->enToAr($request->toDate) ;
        $course->save();
        $request->request->add(['course_id' => $course->id]);
        Excel::import(new UsersImport,$request->file);
        return redirect('/courses')->with('added', 'تم تعديل الدورة');
    }

   
    public function add()
    {
        $items = Course::all();
        return view('cp.import_courses.form',['items'=>$items]);
    }



   

}
