<?php
/**
 * Created by PhpStorm.
 * User: Reginald
 * Date: 08/05/2017
 * Time: 08:52 PM
 */
include_once ("HotelInfo.php");
Class HotelService{

    function __construct()
    {
    }
    function returnDefaultHotels()
    {
        return array('Lakewood','Bridgewood','Ridgewood');
    }
    function returnPrice($hotel,$custType,$day)
    {

        $hotelInfo = new HotelInfo($hotel,$custType,$day);
        $infoPices = $hotelInfo->getPrices();

        return $infoPices ;
    }

    function returnRatings($hotel)
    {
        switch($hotel)
        {
            case 'Lakewood':
                return 3;
                break;
            case 'Bridgewood':
                return 4;
                break;
            case 'Ridgewood':
                return 5;
                break;
        }

    }
    function returnDates($start ,$end)
    {
        $period = new DatePeriod(
            new DateTime($start),
            new DateInterval('P1D'),
            (new DateTime($end))->modify('+1 day')
        );
        $array = array();
        foreach($period as $date) {
            $array[] = $this->isWeekend($date->format('Y-m-d'));
        }
        return $array;
    }
    function isWeekend($date)
    {
        $weekDay = date('w', strtotime($date));

        if ($weekDay == 0 || $weekDay == 6){
            return 'WEEKENDS';
        }else{
            return 'WEEK_DAYS';
        }
    }


}