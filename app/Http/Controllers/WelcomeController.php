<?php

namespace App\Http\Controllers;

use App\Models\Classification;
use App\Models\Course;
use App\Models\User;
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
        $ratings =  $course->ratings;
        $ratingsArray=array();
        if(!isset($ratings)){
        $avarage_rating=0;$sum=0;$sumAll=array();
        $sumAll[1]=0;$sumAll[2]=0;$sumAll[3]=0;$sumAll[4]=0;$sumAll[5]=0;
        foreach($ratings as $rating){ 
         $sum+=$rating->rating;
         $sumAll[$rating->rating]++;
        }
        $avarage_rating=$sum/count($ratings);
        $ratingsArray=array('avarage_rating'=>$avarage_rating,'all'=>$sumAll,'ratingCounts'=>count($ratings));
       }else{
        $sumAll[1]=0;$sumAll[2]=0;$sumAll[3]=0;$sumAll[4]=0;$sumAll[5]=0;
        $ratingsArray=array('avarage_rating'=>0,'all'=>$sumAll,'ratingCounts'=>1);
       }
        $sections = Section::where('course_id',$id)->with('units')->get();
        $related_courses = Course::where("class_id",$course->class_id)->where("id","!=",$id)->orderBy('created_at','DESC')->take(6)->get();
        if(count($related_courses)>0)
        $related_courses = Course::where("cat_id",$course->cat_id)->where("id","!=",$id)->orderBy('created_at','DESC')->take(6)->get();
        $courseAppointments = $course->appointments;
        foreach ($courseAppointments as $session){
            $start  = Carbon::createFromTimeString($session->date.' '.$session->from_time);
            $end  = Carbon::createFromTimeString($session->date.' '.$session->to_time);
            $minutes[] = $end->diffInRealMinutes($start);
        }
        $totalTime = array_sum($minutes);

        return view('site.course',compact('course','related_courses', 'sections','totalTime','ratingsArray'));
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
        $categories = Category::all();
        $SelectedCategories = $request->get('categories')==null?array():$request->get('categories');
        $classifications=array();
        $SelectedClassifications=$request->get('classifications')==null?array():$request->get('classifications');
        $query = Course::query();
        $Instructors = User::whereHas('roles', function($q){
                                                           $q->where('name', 'instructor');
                                                           })->get();
        $SelectedInstructors= $request->get('instructors')==null?array():$request->get('instructors');
        if ($request->has('q'))
            $query->where('title_ar','LIKE','%'.$request->get('q').'%');

        if($request->get('categories')){
            $query->whereIn('cat_id',$request->get('categories'));
            $classifications  = Classification::query()->whereIn('cat_id',$request->get('categories'))->get();
            }   
        if ($request->has('classifications')){
            $query->whereIn('class_id',$request->get('classifications'));
            $classifications  = Classification::query()->whereIn('cat_id',$request->get('categories'))->get();
            }
        if ($request->has('instructors')){
            $query->whereIn('instructor_id',$request->get('instructors'));
            }    
        $courses = $query->paginate(12)->appends(['q'=>$request->get('q')]);
        return view('site.searchResults',compact('courses','categories','classifications','Instructors','SelectedInstructors','SelectedCategories','SelectedClassifications'));
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
