<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CourseAppointmentAttendance extends Pivot
{

    protected $table = 'course_appointment_attendence';

    protected $primaryKey = 'id';
    public $timestamps = true;
    public $incrementing = true;



    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'attandtime',
        'SessionCode',
        'SessionID',
        'duration',
        'appointment_id',
        'active',
        'attand'
    ];



    public function Appointments(){
        return $this->belongsTo('App\Models\CourseAppintment');
    }

}
