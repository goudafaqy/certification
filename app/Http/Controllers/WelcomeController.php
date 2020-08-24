<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Advertisment;

class WelcomeController extends Controller
{

    /**
     * welcome page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $advertisments = Advertisment::all();
        $sliderItems = Classification::where("home_page_display",1)->orderBy('created_at','DESC')->take(4)->get();
        return view('site.welcome',compact("sliderItems","advertisments"));
    }


    /**
     * @param $by (classification or category)
     * @param $by_id (classification_id or category_id)
     * get courses by navigation classifications or category
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function courses($by, $by_id){
        $model = 'App\\Models\\' . ucfirst($by);
       $by_object =  $model::find($by_id);
       $courses = $by_object->courses()->paginate(12);
       return view('site.courses',compact('courses'));
    }


    /**
     * get course details
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function course($id){
        $course = Course::find($id);
        $related_courses = Course::where("cat_id",$course->cat_id)->where("id","!=",$id)->orderBy('created_at','DESC')->take(6)->get();
        return view('site.course',compact('course','related_courses'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function instructorProfile($id){
        $mr = User::find($id);
        return view('site.profile',compact('mr'));
    }


    public function searchResults(Request $request){
        $classifications  = Classification::all();
        $categories = Category::all();
        $query = Course::query();
        if ($request->has('q'))
            $query->where('title_ar','LIKE','%'.$request->get('q').'%');

        if ($request->has('classifications'))
            $query->whereIn('class_id',$request->get('classifications'));

        if ($request->has('categories'))
            $query->whereIn('cat_id	',$request->get('categories'));

        $courses = $query->paginate(12)->appends(['q'=>$request->get('q')]);
        return view('site.searchResults',compact('courses','categories','classifications'));
    }
}
