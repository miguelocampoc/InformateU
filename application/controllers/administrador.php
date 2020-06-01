<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class administrador extends CI_Controller {
	public function __construct()
	{
		parent::__construct();



    }
    public function index(){
        $this->load->helper('Autenticate');
        $Auth= Auth();
        $this->load->model('gets');
        $row= $this->gets->getTipo();
        $tipo=$row->tipo;
		if($Auth){
            if($tipo=="administrador"){
                        $data=array(
                            'usuarios'=>$this->gets->getRowUser(),
                        );
                        $this->load->view('administrador',$data);
                         $this->load->view('navbars/navbaruseradmin'); 
                    }
             else{
                 redirect('welcome/error404');
             }     
		}
		else{
			redirect('Welcome/login');
		}
    }
    
}  
?>