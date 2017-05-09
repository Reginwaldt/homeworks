<?php

/**
 * Created by PhpStorm.
 * User: Reginald
 * Date: 08/05/2017
 * Time: 09:51 PM
 */
include_once ("HotelService.php");
class GenerateResults
{

    function __construct()
    {

    }
    function generatesResults($cust_Type,$dateFrom,$dateTo)
    {

        $custType = $cust_Type;
        $dateFrom = (new DateTime( substr( $dateFrom, 0, strrpos( $dateFrom, '(' ) )))->format('Y-m-d');
        $dateTo=  (new DateTime( substr( $dateTo , 0, strrpos($dateTo , '(' ) )))->format('Y-m-d');

        $returnP= array();
        $array_min=array();
        $array_high_rating=array();

        $hotelService = new HotelService();

        $array = $hotelService->returnDates($dateFrom,$dateTo);
        $defaultHotels = $hotelService->returnDefaultHotels();


        for($x = 0; $x < count($array); $x++)
        {
            for($j=0;$j<count($defaultHotels);$j++)
            {

                $returnP[$defaultHotels[$j]][$x]=$hotelService->returnPrice($defaultHotels[$j],$custType,$array[$x]);
            }

        }

        for ($m=0;$m<count($defaultHotels);$m++)
        {

            $array_min[$defaultHotels[$m]]=array_sum($returnP[$defaultHotels[$m]]);
        }

        $lessPriceHotel  = array_keys($array_min, min($array_min));


        if (count($lessPriceHotel) > 1)
        {
            for($i=0;$i<count($lessPriceHotel);$i++)
            {
                $array_high_rating[$lessPriceHotel[$i]] =$hotelService->returnRatings($lessPriceHotel[$i]);
            }
            $returnCheapest = max(array_keys($array_high_rating, max($array_high_rating))) ;

        }
        else
        {
            $returnCheapest = min($lessPriceHotel);
        }

        unset($returnP);
        unset($array_min);
        unset($array_high_rating);
        unset($defaultHotels);
        unset($array);
        return $returnCheapest;
    }
}