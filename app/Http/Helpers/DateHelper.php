<?php 

namespace App\Http\Helpers;

use Carbon\Carbon;

class DateHelper{

    public static function getDateFormate($date){
        return Carbon::createFromDate($date)->format('Y-m-d H:i:s');
    }

    public static function getEndDate($startDate, $numOfRepeats, $lastWeekDay){
        $dt = new \DateTime($startDate);
        $dt->setIsoDate($dt->format('o'), $dt->format('W') + $numOfRepeats);
        if ($lastWeekDay == 0) {
            return $dt->modify("-1 day")->format('Y-m-d');
        }elseif ($lastWeekDay == 1) {
            return $dt->format('Y-m-d');
        }else {
            $diffDay = $lastWeekDay-1;
            return $dt->modify("+$diffDay day")->format('Y-m-d');
        }
    }

    public static function getLastWeekDay($startDateWeek, $days){
        sort($days);
        $result = 0; 
        for ($i=0; $i < count($days); $i++) { 
            if ($days[$i] > $startDateWeek) {
                $result = $days[$i]; //($i == 0) ? $days[$i] : $days[$i - 1];
            }
        }
        return ($result == 0) ? $days[count($days) - 1] : $result ;
    }

    public static function getActualDates($daysArr, $startDateInput, $endDateInput){
        $startDate = new \DateTime($startDateInput);
        $endDate = new \DateTime($endDateInput);
        $result = array();
        for($i=0; $i < count($daysArr); $i++) {
            $result[$daysArr[$i]] = array();
            while ($startDate <= $endDate) {
                if ($startDate->format('w') == $daysArr[$i]) {
                    $result[$daysArr[$i]][] = $startDate->format('Y-m-d');
                }
                $startDate->modify('+1 day');
            }
            $startDate = new \DateTime($startDateInput);
        }
        return $result;
    }

    public static function getDayWeekStringFromNumber($n){
        /**
         * Sunday       >> 0
         * Monday       >> 1
         * Tuesday      >> 2
         * Wednesday    >> 3
         * Thursday     >> 4
         * Friday       >> 5
         * Saturday     >> 6
        */
        $days = [
            'الأحد',
            'الإثنين',
            'الثلاثاء',
            'الأربعاء',
            'الخميس',
            'الجمعة',
            'السبت',
        ];
        return $days[$n];
    }

    public static function getDiffTime($from, $to){
        $fromArr = explode(" ", $from);
        $fromHr = explode(":", $fromArr[0])[0];
        $fromDur = $fromArr[1];

        $toArr = explode(" ", $to);
        $toHr = explode(":", $toArr[0])[0];
        $toDur = $toArr[1];

        $startHour = DateHelper::get24TimeFormat($fromHr, $fromDur);
        $endHour = DateHelper::get24TimeFormat($toHr, $toDur);

        return $endHour - $startHour;
    }

    private static function get24TimeFormat($time, $dur){
        if ($time == '12' && $dur == 'PM') {
            $time = 0;
        }
        return ($dur == 'AM') ? (int)$time : (int)($time) + 12 ;
    }

    public static function getCurrentDate(){
        return Carbon::now()->toDateTimeString();
    }
}