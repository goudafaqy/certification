<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Course;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Advertisment;
use App\Models\Testmonial;
use App\Models\Newsletter;
use App\Models\Section;

class WelcomeController extends Controller
{

    /**
     * welcome page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $advertisments = Advertisment::all();
        $testmonials = Testmonial::all();
        $sliderItems = Classification::where("home_page_display",1)->orderBy('created_at','DESC')->take(4)->get();
        return view('site.welcome',compact("sliderItems","advertisments",'testmonials'));
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
        $minutes = [];
        $course = Course::find($id);
        $sections = Section::where('course_id',$id)->with('units')->get();
        $related_courses = Course::where("cat_id",$course->cat_id)->where("id","!=",$id)->orderBy('created_at','DESC')->take(6)->get();
        $courseAppointments = $course->appointments;
        foreach ($courseAppointments as $session){
            $start  = Carbon::createFromTimeString($session->date.' '.$session->from_time);
            $end  = Carbon::createFromTimeString($session->date.' '.$session->to_time);
            $minutes[] = $end->diffInRealMinutes($start);
        }
        $totalTime = array_sum($minutes);

        return view('site.course',compact('course','related_courses', 'sections','totalTime'));
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
        if(count($courses) < 1){
            $Newquery = Course::query();
            $courses = $Newquery->paginate(12);
        }
        return view('site.searchResults',compact('courses','categories','classifications'));
    }

    public function newsletter(Request $request){

        if($request->ajax()){
            $n = new Newsletter();
            $n->email = $request->email;
            $n->save();
            return true;
        }

    }
}
