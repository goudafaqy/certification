<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class EvaluationTermUser extends Model
{

    protected $table = 'course_evaluation_term_user';

    protected $primaryKey = 'id';

    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'evaluation_term_id',
        'score',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the Exam
     */
    public function evaluation_term()
    {
        return $this->belongsTo('App\Models\EvaluationTerm', 'evaluation_term_id');
    }

    /**
     * Get the User
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
