<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_Forecast extends CI_Model
{
    function current_weather($city)
    {
		//  get JSON
		 $json = file_get_contents("http://api.openweathermap.org/data/2.5/weather?appid=63d957170f53f153512f19560d9b1137&units=metric&q=$city", false);
		
		 // json decode
		 $data = json_decode($json,true);

		 return $data;
    }

    function forecast_weather($city)
    {
		 //get JSON
		 $json = file_get_contents("http://api.openweathermap.org/data/2.5/forecast/daily?appid=770a17f9520e41124656aa601bc34b3c&units=metric&q=$city&cnt=7", false);
		 
		 $data = json_decode($json,true);
		 
		 //return data array()
		 return $data;
    }
}
