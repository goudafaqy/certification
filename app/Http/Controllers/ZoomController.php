<?php

namespace App\Http\Controllers;

use App\Http\Helpers\ZoomHelper;
use App\Http\Repositories\Eloquent\WebinarRepo;
use App\Http\Repositories\Validation\WebinarRepoValidation;
use App\Models\User;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;

class ZoomController extends Controller
{
    var $webinarRepo;
    var $webinarValidation;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(
        WebinarRepo $webinarRepo,
                                WebinarRepoValidation $webinarValidation)
    {
        $this->webinarRepo       = $webinarRepo;
        $this->webinarValidation = $webinarValidation;
        $this->middleware('auth');
    }

    /**
     * list all webinars ...
     */
    public function index(){
        $webinars = $this->webinarRepo->getAll();
        return view('zoom.webinars-list',compact('webinars'));
    }

    /**
     * get webinar by id ...
     */
    public function show($id){
        $webinar = $this->webinarRepo->getById($id);
        return view('zoom.show');
    }

    /**
     * create new webinar ...
     */

    public function create(){
        return view('zoom.webinar-add');
    }


    /**
     * store new webinar ...
     */

    public function store(Request $request){
//        if (auth()->user()->zoom_id == null){
//            ZoomHelper::addUser(auth()->user());
//        }
        $inputs = $request->all();
        $this->webinarValidation->doValidate($inputs,"insert");
        $this->webinarRepo->save($inputs);

        return redirect()->back();
    }


    public function edit(){

    }
}
