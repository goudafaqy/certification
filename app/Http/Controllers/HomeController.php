<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use DB;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class HomeController extends Controller
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
        else
            throw new NotFoundHttpException();
    }


    private function adminDashboard(){

        $categories = DB::table('categories')->get();

        return view('/dashboards/admin', ['categories' => $categories]);
    }


    private function instructorDashboard(){

        $courses = DB::table('courses')
            ->where('instructor_id', Auth::id())
            ->orderBy('id', 'DESC')->limit(4)->get();

        //TODO $favCourses = DB::table('courses')->orderBy('id', 'DESC')->limit(4)->get();

        return view('/dashboards/instructor', ['courses' => $courses->chunk(2)]);
    }
}
