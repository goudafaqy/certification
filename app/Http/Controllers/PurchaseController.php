<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function purchase(Request $request){
        $course = Course::find($request->get('course_id'));
        if ($course->students->contains(auth()->user()->id)){
            return redirect()->to('dashboard');
        }
        $course->students()->attach(auth()->user()->id);
        return redirect()->back();
    }
}
