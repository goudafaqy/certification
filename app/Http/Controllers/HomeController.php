<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Eloquent\CourseRepo;
use Carbon\Carbon;
use DB;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
{
    var $courseRepo;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo
    )
    {
        $this->courseRepo = $courseRepo;
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @throws NotFoundHttpException
     */
    public function dashboard()
    {
        $role = Auth::user()->roles? Auth::user()->roles[0]: null;
        if(!$role)
            throw new NotFoundHttpException();

        if($role->name == 'admin') //admin
            return $this->adminDashboard();
        elseif ($role->name == 'instructor')
            return $this->instructorDashboard();
        elseif ($role->name == 'trainee')
            return $this->traineeDashboard();
        else
            throw new NotFoundHttpException();
    }


    private function adminDashboard(){

        $categories = DB::table('categories')->get();

        return view('/cp/dashboards/admin', ['categories' => $categories]);
    }


    private function instructorDashboard(){

        $instructor_id = Auth::id();
        $currentCourses = $this->courseRepo->getCurrentByInstructor($instructor_id);
        $previousCourses = $this->courseRepo->getPastByInstructor($instructor_id);
        //TODO $favCourses = DB::table('courses')->orderBy('id', 'DESC')->limit(4)->get();

        return view('cp.dashboards.instructor', ['currentCourses' => $currentCourses, 'previousCourses' => $previousCourses]);
    }

    private function traineeDashboard(){

        $courses = DB::table('courses')
            ->where('instructor_id', Auth::id())
            ->orderBy('id', 'DESC')->limit(4)->get();

        //TODO $favCourses = DB::table('courses')->orderBy('id', 'DESC')->limit(4)->get();

        return view('cp.dashboards.admin', ['courses' => $courses->chunk(2)]);
    }
}
