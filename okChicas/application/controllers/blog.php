<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog extends CI_Controller {


	public function index()
	{
		$this->load->view('inicio');
	}


  public function registro()
  {
     $this->load->view('registro');
  }


}
