<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Frontend_Controller extends CI_Controller {

    public function index()
	{
		$this->load->view('frontend/include/header');
		$this->load->view('frontend/pages/about');
		$this->load->view('frontend/include/footer');
	}
}



	

