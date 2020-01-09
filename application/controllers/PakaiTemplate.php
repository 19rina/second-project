<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PakaiTemplate extends CI_Controller {
    public function index()
	{
		$this->load->view('myTemplate');
	}
}