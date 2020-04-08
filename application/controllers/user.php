<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();



    }

    public function profile(){
        $this->load->view('profile');
    }
    public function profileAjustes(){
        $this->load->view('profile-ajustes');
    }
    public function profileAsignatura(){
        $this->load->view('profile-asignatura');
    }
}  
?>