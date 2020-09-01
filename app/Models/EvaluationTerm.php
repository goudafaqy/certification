<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class EvaluationTerm extends Model
{

    protected $table = 'course_evaluation_terms';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id',
        'name',
        'score',
        'created_at',
        'updated_at',
    ];


    /**
     * Get the courses for the Course.
     */
    public function course()
    {
        return $this->belongsTo('App\Models\Course', 'course_id');
    }


    public function trainees_score()
    {
        return $this->hasMany('App\Models\EvaluationTermUser', 'evaluation_term_id');
    }


}
