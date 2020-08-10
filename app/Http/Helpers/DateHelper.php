<?php 

namespace App\Http\Helpers;

use Carbon\Carbon;

class DateHelper{

    public static function getDateFormate($date){
        return Carbon::createFromDate($date)->format('Y-m-d H:i:s');
    }
}