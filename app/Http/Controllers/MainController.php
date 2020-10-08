<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\CourseUser;
use App\Models\Course;
use PDF;

<<<<<<< HEAD
use Spiritix\Html2Pdf\Converter;
use Spiritix\Html2Pdf\Input\UrlInput;
use Spiritix\Html2Pdf\Output\DownloadOutput;




=======
use App\Mail\EmailVerification;
use Illuminate\Support\Facades\Mail;
>>>>>>> e431079f48dd82aef2085019070461ca200d0b07
use Johntaa\Arabic\I18N_Arabic;
use Intervention\Image\Facades\Image;

class MainController extends Controller
{

 
    // Generate PDF
    public function createPDF() {
      // retreive all records from db
      
      $courses = CourseUser::all();


      $data =[
        'title' =>'فضيلة الشيخ',  
        'name_ar' => 'محمد مهدي سعود الشهراني',
        'national_id'=>'1005615685','course'=>3,
        'date'=>'الاحد الموافق 25 محرم 1445',
        'days'=>'ثلاثة أيام',
        'hours'=>'ساعتين تدريبتين',
        'course_name'=>'الصياغة القضائية النيابية' ];
    
    $Arabic = new I18N_Arabic('Glyphs'); 
    $nameAR = $Arabic->utf8Glyphs($data['name_ar']); 
    $data = ['name'=>$nameAR];
    //$nameAR = 'محمد مهدي سعود الشهراني';
      // share data to view
      view()->share('data',$data);
      $pdf = PDF::loadView('pdf', $data);
//dd($pdf);
      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }
    public function mail()
    {
      
      $email = new EmailVerification('20025' , 'مركز التدريب العدلى' ,'تأكيد الحساب الخاص بك');
      Mail::to('mohgood2020@gmail.com')->send($email);
    }

    public function index()
    {
       $national_id =  session()->get('national_id');
       $courses = CourseUser::where('national_id', $national_id)->get();
       return view('home',['courses'=>$courses,"national_id"=>$national_id]);
    }
public function view($national_id,$course_id){
	
	 
     $user = CourseUser::where('national_id', $national_id)->where('course', $course_id)->first();
	 $course = Course::find($user->course);
	 	  $lastStatment=($course->form==1)? "بتاريخ ".$course->date:" فى الفترة من ".$course->fromDate. " إلى ".$course->toDate;

     $data = ['title' => $user->title,
                     'Trainee_name' => $user->name, 
                     'national_id'=>$this->enToAr($user->national_id),
                     'date'=>$course->date,
                     'days'=>$course->days,
                     'hours'=>$course->hours,
                     'course_name'=>$course->name,
					  'form'=>$course->form,
					  'fromDate'=>$course->fromDate,
					  'toDate'=>$course->toDate,
					  'qrcode'=>" يشهد مركز التدريب العدلي بأن هذه الشهادة: قد منحت لـ".$user->title." / ".$user->name." وذلك لإكماله الدورة التدريبة: ".$course->name .$lastStatment
					  
					 ]; 
	return view('cert1',['data'=>$data]);

}
public function print($national_id,$course_id){
	 $user = CourseUser::where('national_id', $national_id)->where('course', $course_id)->first();
	 $course = Course::find($user->course);
$url="http://jtc-certificate.com/public/view/".$national_id.'/'.$course_id;	
$input = new UrlInput();
$input->setUrl($url);  
$converter = new Converter($input, new DownloadOutput());
$converter->setOption('landscape', true);
$converter->setOption('format', 'A4');
$converter->setOption('margin',"{top: '0px', right:'0px',bottom: '0px', left: '0px'}");

$output = $converter->convert();
$output->download($course->name.'.pdf');
}
	
    
    public function importExportView()
    {
       return view('import');
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
	    $course->fromDate = $this->enToAr($request->fromDate) ;
	    $course->toDate = $this->enToAr($request->toDate) ;
        $course->save();
        $request->request->add(['course_id' => $course->id]);
        Excel::import(new UsersImport,$request->file);
        return back()->with('success', 'تم اضافة بيانات الدورة');
    }

    
    
    public function enToAr($string) {
        return strtr($string, array('0'=>'٠','1'=>'١','2'=>'٢','3'=>'٣','4'=>'٤','5'=>'٥','6'=>'٦','7'=>'٧','8'=>'٨','9'=>'٩'));
    }

   

}
