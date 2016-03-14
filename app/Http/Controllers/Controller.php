<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Visit;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {		$ipaddress = '';
		    if (isset($_SERVER['HTTP_CLIENT_IP']))
                $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
            else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_X_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
            else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
                $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
            else if(isset($_SERVER['HTTP_FORWARDED']))
                $ipaddress = $_SERVER['HTTP_FORWARDED'];
            else if(isset($_SERVER['REMOTE_ADDR']))
                $ipaddress = $_SERVER['REMOTE_ADDR'];
            else
                $ipaddress = 'UNKNOWN';
    		$date_to_day = Carbon::now();
    		$month =$date_to_day->month;
    		if($date_to_day->month < 10){
    			$month = "0".$date_to_day->month;
    		}
    		$day =$date_to_day->day;
    		if($date_to_day->day < 10){
    			$day = "0".$date_to_day->day;
    		}
           	$visit = Visit::where('visit_ip_address',$ipaddress)->where('created_at','LIKE',"%".$date_to_day->year."-".$month."-".$day."%")->first();
            if($visit == null){

            	$visit = Visit::create(['visit_ip_address' => $ipaddress]);
            }
            return $visit;
    		$this->visit = $visit;
    }
    
}
