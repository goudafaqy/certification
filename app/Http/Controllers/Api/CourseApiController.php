<?php
namespace App\Http\Controllers\Api;

use App\Models\Course;
use App\Http\Controllers\Controller;

class CourseApiController extends Controller
{
    public function getCourses()
    {

        $courses = Course::orderBy("created_at","DESC")->take(8)->get();
    
        if (!$courses) {
            return response()->json([
                'success' => true,
                'message' => 'Sorry, There is no courses'
            ], 204 );
        }
 
        return response()->json([
            'success' => true,
            'data' => $courses,
        ]);
    }
}