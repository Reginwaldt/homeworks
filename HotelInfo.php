<?php
/**
 * Created by PhpStorm.
 * User: Reginald
 * Date: 08/05/2017
 * Time: 02:03 AM
 */
Class HotelInfo
{

    private $hotel;
    private $custType;
    private $day;
    function __construct($hotel,$custType,$day)
    {
         $this -> hotel = $hotel;
         $this -> custType = strtoupper($custType);
         $this -> day = $day;

    }

    function getPrices()
    {

        switch($this -> hotel)
        {
            case 'Lakewood':
                if(  $this -> custType=="REGULAR") {
                    switch ($this -> day) {
                        case 'WEEK_DAYS':
                            return 110;
                            break;
                        case 'WEEKENDS':
                            return 90;
                            break;
                    }
                }
                if($this -> custType =='REWARDS'){
                    switch( $this -> day){
                        case 'WEEK_DAYS':
                            return 80;
                            break;
                        case 'WEEKENDS':
                            return 80;
                            break;
                    }
                }
                break;
            case 'Bridgewood':
                if($this -> custType=='REGULAR'){
                    switch($this -> day){
                        case 'WEEK_DAYS':
                            return 160;
                            break;
                        case 'WEEKENDS':
                            return 60;
                            break;
                    }
                }
                if($this -> custType=='REWARDS'){
                    switch($this -> day){
                        case 'WEEK_DAYS':
                            return 110;
                            break;
                        case 'WEEKENDS':
                            return 50;
                            break;
                    }
                }
                break;
            case 'Ridgewood':
                if($this -> custType=='REGULAR'){
                    switch($this -> day){
                        case 'WEEK_DAYS':
                            return 220;
                            break;
                        case 'WEEKENDS':
                            return 150;
                            break;
                    }
                }
                if($this -> custType=='REWARDS'){
                    switch($this -> day){
                        case 'WEEK_DAYS':
                            return 100;
                            break;
                        case 'WEEKENDS':
                            return 40;
                            break;
                    }
                }
                break;

        }
    }

}