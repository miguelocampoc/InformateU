<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();



    }
    function alpha_dash_space($fullname){
		if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
			$this->form_validation->set_message('alpha_dash_space', 'El campo %s  solo puede contener letras');
			return FALSE;
		} else {
			return TRUE;
		}
	}

    public function profile(){
        $this->load->model('gets');
        $data=array(
            'carreras'=> $this->gets->getCarreras(),
            'usuarios'=>$this->gets->getRowUser(),
            'carreraUser'=>$this->gets->getByidCarrera()
        );
    
		$this->form_validation->set_rules('nombre','Nombre','required|callback_alpha_dash_space|max_length[60]');
        $this->form_validation->set_rules('apellidos','Apellido','required|callback_alpha_dash_space|max_length[60]');
        $this->form_validation->set_rules('usuario','Usuario','required|min_length[5]|max_length[30]|alpha_numeric');
        if($this->form_validation->run()==false){
            $this->load->view('profile',$data);
        }
        else{
            $this->load->model('queries');
             $result=$this->queries->User_Exist();
              if($result){
                                $this->load->model('update');
                                $result= $this->update->UpdateUser();
                                if($result){
                                    $_SESSION['message14'] = 'Tus datos se han actualizado correctamente';
                                    
                                    redirect('user/profile');
                                }
                                else{
                                    echo "Su actualizacion no ha sido exitosa";
                                }
                            }

                    else{
                        $_SESSION['message16'] = 'El usuario que ha ingresado ya existe';
                        redirect('user/profile');

                    }
        }
       
    } 
    public function profileAjustes(){
        $this->load->model('gets');

        $data=array(
            'usuarios'=>$this->gets->getRowUser()
        );
        $this->load->view('profile-ajustes',$data);
       
    }
    public function subirfoto(){
             $this->load->model('gets');
            $this->load->model('update');
            $this->load->model('functions');
            $tipo=$_FILES['foto']['name'];
            $tipo =  pathinfo($tipo, PATHINFO_EXTENSION);
            $iduser=$this->gets->getidByEmail();
            //subiendo al servidor la foto
           $result=$this->functions->cargarimagen($tipo,$iduser);
           if($result){
            $this->update->subirfoto($tipo,$iduser);
            $_SESSION['message21'] = 'Tu foto se ha actualizado correctamente';
           }
           else{
            $_SESSION['message21'] = 'Su documento no es un formato de imagen o supera el limite admitido';

           }
          //guardando a la base de datos
         
           redirect('user/profile');
    }

    public function restableceremail(){
     $this->load->model('sendemail');
     $this->load->model('update');
     $this->load->model('gets');
     $this->load->helper('generateToken');
     $email=$this->input->post('email');
     $token= generateToken();
     $iduser=$this->gets->getidByEmail();
     $this->update->updateTokenEmail($token,$iduser);
     $this->sendemail->sendupdateemail($email,$token,$iduser);

     $_SESSION['message23'] = 'Se ha enviado un enlace de activacion de su email de ser activado su email se actualizara';
     redirect('user/profileAjustes');
     
     }
     public function restablecerclave(){
      $this->load->model('update');
      $clave=$this->input->post('clave');
      $this->update->restablecerclave($clave);
      $_SESSION['message24'] = 'Se ha restablecido su clave';
      redirect('user/profileAjustes');
    }
     

    public function makequestion(){
        
        $this->form_validation->set_rules('titulo','Titulo','required|callback_alpha_dash_space|max_length[20]');
        $this->form_validation->set_rules('descripcion','Descripcion','required|callback_alpha_dash_space|max_length[255]');
        if($this->form_validation->run()==false){
            $this->load->view('makequestion');
        }
        else{
        $titulo=$this->input->post('titulo');
        $descripcion=$this->input->post('descripcion');
        $this->load->model('insert');
        $result=$this->insert->insertquestion($titulo,$descripcion);
                if($result){
                    $_SESSION['message25'] = 'Su pregunta se ha publicado correctamente';
                    redirect('user/makequestion');

                }
                else{
                     echo "Ha ocurrido un error";
                }
        }
    }


   
}
function alpha_dash_space($fullname){
    if (! preg_match('/^[a-zA-Z\s]+$/', $fullname)) {
        $this->form_validation->set_message('alpha_dash_space', 'El campo %s  solo puede contener letras');
        return FALSE;
    } else {
        return TRUE;
    }
}  
?>