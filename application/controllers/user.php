<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();



    }

    public function profile(){
       
        $this->load->model('gets');
        $result=$this->gets->getRowUser();
        $row=$result->row();
        $datos['nombre'] = $row->nombre;
        $datos['apellidos'] = $row->apellidos;
        $datos['usuario'] = $row->usuario;
        $datos['email'] = $row->email;
        $datos['genero'] = $row->genero;
        $datos['cumpleaños'] = $row->cumpleaños;
        $datos['biografia'] = $row->biografia;



        $this->load->view('profile',$datos);

    } 
    public function profileAjustes(){
        $this->load->view('profile-ajustes');
    }
    public function profileAsignatura(){
        
        $this->load->view('profile-asignatura');
    }
}  
?>