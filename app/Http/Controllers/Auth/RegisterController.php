<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Eloquent\RoleRepo;
use App\Http\Repositories\Eloquent\UserRepo;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    private $userRepo;
    private $roleRepo;

    /**
     * Create a new controller instance.
     *
     * @param UserRepo $userRepo
     * @param RoleRepo $roleRepo
     */
    public function __construct(
        UserRepo $userRepo,
        RoleRepo $roleRepo
    )
    {
        $this->middleware('guest');
        $this->userRepo = $userRepo;
        $this->roleRepo = $roleRepo;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = [
            'mobile.regex' => 'صيغه الجوال غير صحيحه مثال : 966500000000',
            'mobile.size' => 'صيغه الجوال غير صحيحه',
            'national_id.numeric' => 'هذا الحقل يجب ان يكون رقما',
        ];

        return Validator::make($data, [
            'name_ar' => ['required', 'string', 'max:255'],
            'name_en' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'national_id' => ['required', 'numeric'],
            'mobile' => 'required|regex:/(966)[0-9]{9}/|size:12',
            'birth_date' => ['required', 'date'],
            'gender' => ['required'],
            'education' => ['required']
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name_ar' => $data['name_ar'],
            'name_en' => $data['name_en'],
            'username' => $data['name_en'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'national_id' => $data['national_id'],
            'mobile' => $data['mobile'],
            'active' => 1,
            'birth_date' => $data['birth_date'],
            'gender' => $data['gender'],
            'education' => $data['education']
        ]);
        $traineeRole = $this->roleRepo->getByName('trainee');
        $this->userRepo->saveRoles([$traineeRole->id], $user->id);
        return $user;
    }
}
