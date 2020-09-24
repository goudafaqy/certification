<?php

namespace App\Http\Controllers;

use App\Http\Helpers\DateHelper;
use App\Http\Repositories\Eloquent\CategoryRepo;
use App\Http\Repositories\Eloquent\QuestionnaireRepo;
use App\Http\Repositories\Validation\CourseRepoValidation;
use App\Http\Repositories\Eloquent\CourseRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use Illuminate\Http\Request;
use App\Http\Helpers\FileHelper;
use App\Http\Helpers\GenerateHelper;
use App\Http\Repositories\Eloquent\ClassificationRepo;
use App\Http\Repositories\Eloquent\MaterialRepo;
use App\Mail\InstructorCourse;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Carbon\Carbon;

class CourseController extends Controller
{
    var $courseRepo;
    var $userRepo;
    var $categoryRepo;
    var $classRepo;
    var $materialRepo;
    var $questionnaireRepo;
    var $courseValidation;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        CourseRepo $courseRepo,
        UserRepo $userRepo,
        CategoryRepo $categoryRepo,
        ClassificationRepo $classRepo,
        MaterialRepo $materialRepo,
        QuestionnaireRepo $questionnaireRepo,
        CourseRepoValidation $courseValidation
    )
    {
        $this->courseRepo = $courseRepo;
        $this->userRepo = $userRepo;
        $this->categoryRepo = $categoryRepo;
        $this->classRepo = $classRepo;
        $this->materialRepo = $materialRepo;
        $this->questionnaireRepo = $questionnaireRepo;
        $this->courseValidation = $courseValidation;
        $this->middleware('auth');
    }

    /**
     * List the application Courses ...
     */
    public function list()
    {
        $courses = $this->courseRepo->getAll();
        $Current_date = new Carbon;
        return view("cp.courses.courses-list", ['courses' => $courses,'Current_date'=>$Current_date]);
    }


    /**
     * Get add course page ...
     */
    public function add()
    {
        $instructors            = $this->userRepo->getByRole('instructor');
        $categories             = $this->categoryRepo->getAll();
        $questionnaires         = $this->questionnaireRepo->getBy('type', 'certification');
        return view("cp.courses.courses-add", [
            'categories'        => $categories,
            'instructors'       => $instructors,
            'questionnaires'    => $questionnaires
        ]);
    }


    /**
     * Save course date ...
     */
    public function create(Request $request)
    {
        $inputs = $request->input();
        $validator = $this->courseValidation->doValidate($inputs, 'insert');
        if ($validator->fails()) {
            return redirect('courses/add')->withErrors($validator)->withInput();
        }else{
            if($request->file()) {
                $filePath = FileHelper::uploadFiles($request->file('image'), 'uploads/courses/');
                $inputs['image'] = $filePath;
            }
            unset($inputs['_token']);
            $inputs['assi_check'] = (isset($inputs['assi_check']) && $inputs['assi_check'] == 'on') ? 1 : 0;
            $inputs['exam_check'] = (isset($inputs['exam_check']) && $inputs['exam_check'] == 'on') ? 1 : 0;
            $inputs['objective'] = (isset($inputs['objective']) && $inputs['objective']) ? $inputs['objective'] : '';
            $inputs['reg_start_date'] = DateHelper::getDateFormate($inputs['reg_start_date']);
            $inputs['reg_end_date'] = DateHelper::getDateFormate($inputs['reg_end_date']);

            $courseId = $this->courseRepo->save($inputs, true);
            if($courseId){
                $course = $this->courseRepo->getById($courseId);
                $categoryLetter = $course->category->letter;
                $this->courseRepo->update([
                    'code'      => GenerateHelper::generateCourseCode($courseId, $categoryLetter, 1),
                ], $courseId);
                try {
                    $this->SendNotificationToInstructor($course);
                } catch (Throwable $e) {
                }
                return redirect('courses/list')->with('added', 'تمت إضافة دورة جديدة بنجاح');
            }
        }
    }

    private function SendNotificationToInstructor($course){
        // Send Notification to instructor...
        $instructor = $this->userRepo->getById($course->instructor_id);
        $data = [
            'title_ar'=>   __('app.You have choosen to new course'),
            'title_en'=>   __('app.You have choosen to new course'),
            'message_ar'=>   ' لقد تم اختياركم لتدريب '.$course->title_ar,
            'message_en'=> 'You have been selected as Instructor for '.$course->title_en. ' Course' ,
            'user_id'=>    $course->instructor_id,
            'type'=>       'info',
            'name'=>       $instructor->name,
            'email'=>      $instructor->email,
            'link' =>      '',
            'extra_text'=> '',
            'course' =>$course->title_ar
        ];
        $Notification = new NotificationsController();
        $Notification->Send_Notification_And_Email($data, 'instructor_course_notification');
    }
    /**
     * Get update course page ...
     */
    public function update($id){
        $course = $this->courseRepo->getById($id);
        $Current_date = new Carbon;
        if($Current_date >= $course->reg_start_date){
            //can not delete
            return redirect('courses/list')->with('updated', 'لا يمكن تعديل الدورة حيث تم بدء عملية التسجيل على الدورة');
        }else {
          $instructors        = $this->userRepo->getByRole('instructor');
          $categories         = $this->categoryRepo->getAll();
          $classifications = $this->classRepo->getByCat($course->cat_id);
          $questionnaires         = $this->questionnaireRepo->getBy('type', 'certification');
          return view("cp.courses.courses-update", [
              'course' => $course, 'instructors' => $instructors,
              'categories' => $categories, 'classifications' => $classifications,
              'questionnaires' => $questionnaires
          ]);
        }
    }

    /**
     * Update course date ...
     */
    public function edit(Request $request)
    {
        $inputs = $request->input();

        $validator = $this->courseValidation->doValidate($inputs, 'update');
        if ($validator->fails()) {
            return redirect('courses/update/'.$inputs['id'])->withErrors($validator)->withInput();
        }else{
            if($request->file()) {
                $filePath = FileHelper::uploadFiles($request->file('image'), 'uploads/courses/');
                $inputs['image'] = $filePath;
            }
            unset($inputs['_token']);
            $inputs['assi_check'] = (isset($inputs['assi_check']) && $inputs['assi_check'] == 'on') ? 1 : 0;
            $inputs['exam_check'] = (isset($inputs['exam_check']) && $inputs['exam_check'] == 'on') ? 1 : 0;
            $inputs['objective'] = (isset($inputs['objective']) && $inputs['objective']) ? $inputs['objective'] : '';
            $inputs['reg_start_date'] = DateHelper::getDateFormate($inputs['reg_start_date']);
            $inputs['reg_end_date'] = DateHelper::getDateFormate($inputs['reg_end_date']);

            $course = $this->courseRepo->update($inputs, $inputs['id']);
            if($course){
                return redirect('courses/list')->with('updated', 'تمت تعديل بيانات الدورة بنجصاح');
            }
        }
    }


    /**
     * Delete course date ...
     */
    public function delete($id)
    {
        $course = $this->courseRepo->getById($id);
        $Current_date = new Carbon;
        if($Current_date >= $course->reg_start_date){
            //can not delete
            return redirect('courses/list')->with('deleted', 'لا يمكن حذف الدورة حيث تم بدء عملية التسجيل على الدورة');
        }else {
            $result = $this->courseRepo->delete($id);
            if($result)
                return redirect('courses/list')->with('deleted', 'تم حذف الدورة بنجاح');
        }
    }

    /**
     * Get classification depend on category id ...
     */
    public function getClassByCatId(Request $request){
        $inputs = $request->input();
        $classifications = $this->classRepo->getByCat($inputs['option']);
        return $classifications;
    }

    /**
     * Duplicate Course details ...
     */
    public function duplicate(Request $request){
        $inputs = $request->input();
        $oldCourse = $this->courseRepo->getById($inputs['course_id']);
        // Formate data ..
        $newCourseData = $oldCourse->toArray();
        $newCourseData = $this->formateNewData($newCourseData, $inputs);
        // Formate code ..
        $oldCode = $inputs['code'];
        $newCourseData['code'] = $this->courseRepo->generateNewCourseVirsionCode($oldCode);
        // Formate accossiated ..
        $courseId = $this->courseRepo->save($newCourseData, true);
        $oldCourseMaterialsArr = $oldCourse->materials->toArray();
        $newCourseMaterialsArr = [];
        foreach ($oldCourseMaterialsArr as $material) {
            $material['course_id'] = $courseId;
            unset($material['created_at']);
            unset($material['updated_at']);
            unset($material['id']);
            array_push($newCourseMaterialsArr, $material);
        }
        $this->materialRepo->saveBulk($newCourseMaterialsArr);
        return redirect('courses/list')->with('added', 'تم إعادة تشغيل الدورة بنجاح ، عليك إدخال المواعيد الجديدة');
    }

    private function formateNewData($newCourseData, $inputs){
        unset($newCourseData['id']);
        unset($newCourseData['code']);
        unset($newCourseData['updated_at']);
        unset($newCourseData['created_at']);
        unset($newCourseData['lec_num']);
        unset($newCourseData['course_hours']);
        unset($newCourseData['course_days']);
        unset($newCourseData['start_date']);
        unset($newCourseData['end_date']);
        unset($newCourseData['from_time']);
        unset($newCourseData['to_time']);
        unset($newCourseData['week_days']);
        unset($newCourseData['repeat']);
        unset($newCourseData['num_of_repeat']);
        unset($newCourseData['zoom']);
        $newCourseData['reg_start_date'] = $inputs['reg_start_date'];
        $newCourseData['reg_end_date'] = $inputs['reg_end_date'];

        return $newCourseData;
    }

}
