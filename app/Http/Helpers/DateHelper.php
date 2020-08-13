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
        $result = [];
        for ($i=0; $i < count($days); $i++) { 
            if ($days[$i] > $startDateWeek) {
                $result[] = ($i == 0) ? $days[$i] : $days[$i - 1];
            }
        }
        if (count($result) == 0) {
            $result[] = $days[count($days) - 1];
        }
        return $result[0];
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
}