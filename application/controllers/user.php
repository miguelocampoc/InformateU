<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();



    }

    public function profile(){
<<<<<<< HEAD
       
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
=======
        $this->load->view('profile');
    }
>>>>>>> 170a0f4bf6c1808747464e440475a99bec45cb70
    public function profileAjustes(){
        $this->load->view('profile-ajustes');
    }
    public function profileAsignatura(){
<<<<<<< HEAD
        
=======
>>>>>>> 170a0f4bf6c1808747464e440475a99bec45cb70
        $this->load->view('profile-asignatura');
    }
}  
?>