<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\App;
use App\Models\Qualifications;
class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_ar',
        'name_en',
        'role',
        'active',
        'email',
        'email_verified_at',
        'created_at',
        'updated_at',
        'username',
        'remember_token',
        'password',
        'national_id',
        'mobile',
        'birth_date',
        'gender',
        'education',
        'job_title',
        'facebook_link',
        'twitter_link',
        'image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Get the courses for the User.
     */
    public function courses()
    {
        return $this->hasMany('App\Models\Course', 'instructor_id');
    }

    /**
     * Get the courses for the User.
     */
    public function courses_s()
    {
        return $this->belongsToMany('App\Models\Course', 'course_user');
    }

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }
    public function appointments()
    {
      //  return $this->belongsToMany('App\Models\CourseAppintment')->using('App\Models\CourseAppointmentAttendance');
    }
    public function getNameAttribute(){
        return $this["name_".App::getLocale()];
    }

    public function courses_have_taken(){
        return $this->hasMany(Qualifications::class)->where('type','courses');
    }

    public function researches(){
        return $this->hasMany(Qualifications::class)->where('type','researches');
    }

    public function experiences(){
        return $this->hasMany(Qualifications::class)->where('type','experiences');
    }

    public function certificates(){
        return $this->hasMany(Qualifications::class)->where('type','certificates');
    }


    public function exams_score()
    {
        return $this->hasMany('App\Models\ExamUser', 'user_id');
    }


    public function evaluations_score()
    {
        return $this->hasMany('App\Models\EvaluationTermUser', 'user_id');
    }
    public function getcert()
    {
        return $this->hasOne('App\Models\CourseUser');
    }


    public function canAccessSupportSystem(){

        $roleNames = $this->roles->pluck('name')->toArray();

        return in_array('admin', $roleNames) || in_array('support', $roleNames);
    }

    public function hasRole($rolename){

        $roleNames = $this->roles->pluck('name')->toArray();

        return in_array($rolename, $roleNames);
    }
}
