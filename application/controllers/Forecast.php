<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forecast extends CI_Controller {

	function __construct(){
        parent::__construct();
		
		//call model
        $this->load->model('M_Forecast');
    }

	public function index()
	{
		$data['title'] = "Home";
		$this->load->view('forecast', $data);
	}

	public function forecasting()
	{
		if(!empty($_POST['city'])) {
			$data['current_weather'] = $this->M_Forecast->current_weather($_POST['city']);
			$data['forecast_weather'] = $this->M_Forecast->forecast_weather($_POST['city']);
		} else {
			$data['current_weather']=null;
			$data['forecast_weather']=null;
		}
		
		$data['title'] = "Result";
        $this->load->view('weacast', $data);
	}

}
