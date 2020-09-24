<?php
namespace App\Http\Helpers;


class RatingHelper{
    public static function GetRating($ratings){
        $ratingsArray=array();
        if(count($ratings)>0){
        $avarage_rating=0;$sum=0;$sumAll=array();
        $sumAll[1]=0;$sumAll[2]=0;$sumAll[3]=0;$sumAll[4]=0;$sumAll[5]=0;
        foreach($ratings as $rating){ 
         $sum+=$rating->rating;
         $sumAll[$rating->rating]++;
        }
        $avarage_rating=$sum/count($ratings);
        $ratingsArray=array('avarage_rating'=>$avarage_rating,'all'=>$sumAll,'ratingCounts'=>count($ratings));
       }else{
        $sumAll[1]=0;$sumAll[2]=0;$sumAll[3]=0;$sumAll[4]=0;$sumAll[5]=0;
        $ratingsArray=array('avarage_rating'=>0,'all'=>$sumAll,'ratingCounts'=>1);
       }
       return $ratingsArray;
    } 
    public static function GetAvgRating($ratings){
        $ratingsArray=array();
        if(count($ratings)>0){
         $avarage_rating=0;$sum=0;$sumAll=array();
         $sumAll[1]=0;$sumAll[2]=0;$sumAll[3]=0;$sumAll[4]=0;$sumAll[5]=0;
         foreach($ratings as $rating){ 
           $sum+=$rating->rating;
           $sumAll[$rating->rating]++;
         }
         $avarage_rating=$sum/count($ratings);
         $ratingsArray=array('avarage_rating'=>$avarage_rating,'all'=>$sumAll,'ratingCounts'=>count($ratings));
       }else{
         $sumAll[1]=0;$sumAll[2]=0;$sumAll[3]=0;$sumAll[4]=0;$sumAll[5]=0;
         $ratingsArray=array('avarage_rating'=>0,'all'=>$sumAll,'ratingCounts'=>1);
       }
       return $ratingsArray['avarage_rating'];
    } 
}
