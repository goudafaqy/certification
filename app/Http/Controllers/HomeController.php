<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use Carbon\Carbon;
use DB;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use App\Models\Advertisment;
use App\Models\Certificate;

class HomeController extends Controller
{
    var $courseRepo;
    var $userRepo;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        UserRepo $userRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
     * @throws NotFoundHttpException
     */
    public function dashboard()
    {
        $role = Auth::user()->roles ? Auth::user()->roles[0] : null;
        if (!$role)
            throw new NotFoundHttpException();

        if ($role->name == 'admin') //admin
            return $this->adminDashboard();
        elseif ($role->name == 'instructor')
            return $this->instructorDashboard();
        elseif ($role->name == 'trainee')
            return $this->traineeDashboard();
        elseif ($role->name == 'support')
            return redirect('panichd/dashboard');
        else
            throw new NotFoundHttpException();
    }


    public function adminDashboard()
    {

        $categories = DB::table('categories')->get();
        $advertisments = Advertisment::all();
        return view('/cp/dashboards/admin', ['categories' => $categories ,'advertisments'=>$advertisments,'events'=>array()]);

    }


    public function instructorDashboard()
    {

        $instructor_id = Auth::id();
        $currentCourses = $this->courseRepo->getCurrentByInstructor($instructor_id);
        $previousCourses = $this->courseRepo->getPastByInstructor($instructor_id);

        $events=array();
        foreach ($currentCourses as $key => $course)
        foreach($course->appointments as $key1=>$appointment){
            $start="{$appointment->date}{$appointment->fromtime}";
            $end="{$appointment->date}{$appointment->totime}";
            $events[]=array(
                          'start'=>strtotime($start) * 1000
                          ,'title'=>$appointment->title
                          ,'end'=>strtotime($start) * 1000);
        }
        $advertisments = Advertisment::all();
        //dd($advertisments);
        return view('cp.dashboards.instructor', ['currentCourses' => $currentCourses, 'previousCourses' => $previousCourses ,'advertisments'=>$advertisments,'events'=>$events]);

        //TODO $favCourses = DB::table('courses')->orderBy('id', 'DESC')->limit(4)->get();
    }

    public function traineeDashboard()
    {
        $trainee_id = Auth::id();
        $advertisments = Advertisment::all();
        $certificates = Certificate::where('user_id',$trainee_id)->get();
        $courses = $this->userRepo->getTraineeCourses($trainee_id);
         //TODO $favCourses = DB::table('courses')->orderBy('id', 'DESC')->limit(4)->get();
        $events=array();
        foreach ($courses as $key => $course )
        foreach($course->appointments as $key1=>$appointment){
            $start="{$appointment->date}{$appointment->fromtime}";
            $end="{$appointment->date}{$appointment->totime}";
            $events[]=array(
                          'start'=>strtotime($start) * 1000
                          ,'title'=>$appointment->title
                          ,'end'=>strtotime($start) * 1000);
        }
        //print_r($events);dd();
        return view('cp.dashboards.trainee', ['courses' => $courses,'advertisments'=>$advertisments, 'certificates'=>$certificates,'events'=>$events]);
    }
}
