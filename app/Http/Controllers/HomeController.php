<?php

namespace App\Http\Controllers;

use DB;
use Facade\FlareClient\Http\Exceptions\NotFound;
use Illuminate\Support\Facades\Auth;

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
     */
    public function dashboard()
    {
        $role = Auth::user()->roles? Auth::user()->roles[0]: null;

        if(!$role)
            throwException(new NotFound());

        if($role->id == 1) //admin
            return $this->adminDashboard();
        elseif ($role->id == 2)
            return $this->instructorDashboard();

    }


    private function adminDashboard(){

        $categories = DB::table('categories')->get();

        return view('/dashboards/admin', ['categories' => $categories]);
    }


    private function instructorDashboard(){

        $categories = DB::table('categories')->get();

        return view('/dashboards/instructor', ['categories' => $categories]);
    }
}
