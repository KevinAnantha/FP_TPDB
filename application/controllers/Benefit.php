<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Benefit extends CI_Controller {

	public function index()
	{
		$this->load->view('Landing/Benefit');
	}
}
