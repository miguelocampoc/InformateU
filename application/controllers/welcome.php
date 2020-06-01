<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct()
	{
		parent::__construct();



	}
	public function login()
	{
    	$this->load->helper('Autenticate');
		$Auth= Auth();
		if($Auth){
		 redirect('Welcome');
		}
		else{
						$this->form_validation->set_rules('email','Nombre de usuario o email','required');
						$this->form_validation->set_rules('clave','Password','required');
						if($this->form_validation->run()==false){
						$this->load->view('login');
						}
						else{
						$this->load->model('queries');    	   
						$email=$this->input->post('email');				
						$clave=$this->input->post('clave');
						$ValidationLogin=$this->queries->Validation_login($email,$clave);
						$isActivatedUser=$this->queries->isActivatedUser($email);
							if($ValidationLogin){
									if($isActivatedUser){
										$this->load->model('gets');
									   $iduser= $this->gets->getidByEmail2($email);	
								       session_start();
									   $_SESSION['email']=$email;	
									   $_SESSION['iduser']=$iduser;
									   redirect('Welcome');					
									}
									else{
										$_SESSION['message9'] = 'PorFavor Active su cuenta, se ha enviado a su email un enlace de verificacion.';
										redirect('Welcome/login');
									}
							}
							else{
								$_SESSION['message2'] = 'Usuario/email o clave incorrectas';
								redirect('Welcome/login');

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
	
	
	public function register()
	{            
		$this->load->helper('Autenticate');
		$Auth= Auth();
		if($Auth){
			redirect('Welcome');
		}
		else{
					$this->form_validation->set_rules('email','Email','required|valid_email|is_unique[usuarios.email]|max_length[60]');
					$this->form_validation->set_rules('nombre','Nombre','required|callback_alpha_dash_space|max_length[60]');
					$this->form_validation->set_rules('apellidos','Apellido','required|callback_alpha_dash_space|max_length[60]');

					$this->form_validation->set_rules('usuario','Usuario','required|min_length[5]|max_length[30]|is_unique[usuarios.usuario]|alpha_numeric');
					$this->form_validation->set_rules('clave','Clave','required|min_length[5]|max_length[50]');
					$this->form_validation->set_rules('cclave',' Confirmar clave','required|matches[clave]');
					if($this->form_validation->run()==false){
						$this->load->view('register');
					}
					else{
						$this->load->helper('quitarespacio');
						$this->load->helper('generateToken');
						$this->load->model('insert');
						$email=$this->input->post("email"); 
						$nombre =Quitar_EspaciosNombre($this->input->post("nombre"));
						$apellidos =Quitar_EspaciosApellido($this->input->post("apellidos"));
						$usuario =$this->input->post("usuario");
						$clave =$this->input->post("clave");
						$TokenActivate=generateToken();
						$result=$this->insert->InsertarUsuario($email,$nombre,$apellidos,$usuario,$clave,$TokenActivate);
						if($result){
						//	$this->load->model('queries');
					//		$this->load->model('events');
							$this->load->model('sendemail');
                        /* $this->events->EventDeleteUser($usuario);*/
						  
						//	$emailDB=$row->email;
							$this->sendemail->sendEmail($email,$TokenActivate);
							$_SESSION['message20'] = 'Usted se ha registrado exitosamente,Verifica tu cuenta';

							redirect('Welcome/login');

		}
				
	}
}}

	public function recover()
	{

		$this->load->helper('Autenticate');
		$Auth= Auth();
		if($Auth){
			redirect('Welcome');
		}
		else{
			$this->form_validation->set_rules('email','Email','required|valid_email');
			if($this->form_validation->run()==false){
				$this->load->view('recover');
			}
			else{
						$this->load->model('queries');
						$email=$this->input->post('email');
						$existDB=$this->queries->email_existDB();
						$ValidationTime=$this->queries->ValidationTimeRecover();
						$isActivatedUser=$this->queries->isActivatedUser($email);
						if($existDB) {
							if($isActivatedUser){
								$this->load->model('update');
								$this->load->model('sendemail');
								$this->load->helper('generateToken');
								$token=generateToken();
								$this->sendemail->mailrecover($token,$email);
								$this->update->UpdateTokenRecover($token,$email);

								$_SESSION['message5'] = 'Hemos enviado un enviado un correo a tu email para reestablecer tu contraseña';
                                redirect('Welcome/recover');
								/*
								if($ValidationTime){
									$this->load->helper('generateToken');
									$this->load->model('sendemail');
									$this->load->model('update');
									$token=generateToken();
									$this->update->UpdateTokenRecover($token,$email);
									$this->sendemail->mailrecover($token,$email);
									$this->update->AddTimeRecover();
									$_SESSION['message5'] = 'Hemos enviado un enviado un correo a tu email para reestablecer tu contraseña';
									redirect('Welcome/recover');
									}
									*/
									/*
									else {
									$email=$this->input->post('email');
									$TimeRemaing=$this->queries->GetTimeRemaingRecover($email);
									$_SESSION['message7'] = 'Faltan '.$TimeRemaing.' minutos para volver a enviar un enlace de recuperacion';
									redirect('Welcome/recover');
									}
								*/	

							}
							else{
								$_SESSION['message10'] = 'La cuenta no esta activada, por favor activela';
								redirect('Welcome/recover');
							}

						
									
						}
						else{
								$_SESSION['message8'] = 'El email ingresado no esta registrado';
								redirect('Welcome/recover');
						}
					}
		}
				
								
}

	public function recoverpass()
	{  
		$this->load->model('queries');
		$validationURL=$this->queries->ValidationURL();
		if($validationURL){
			            $this->form_validation->set_rules('clave','Clave','required');
						$this->form_validation->set_rules('cclave','Confirmar clave','required|matches[clave]');
						if($this->form_validation->run()==false){
						$this->load->view('recoverpass');
						}
						else{
							$clave=$this->input->post("clave"); 
							$this->load->model('update');
							$result=$this->update->updatePassword();
							 if($result){
							  $this->load->model('sendemail');
							  $id= htmlspecialchars($_GET["id"]);
							  $this->sendemail->mailupdatepassword($id);
                              redirect('Welcome/login');
							 }
							 else{
                              echo "no se pudo reestablecer su contraseña, intente de nuevo";
							 }
                         
						}
		}
		else{
            redirect('Welcome/error404');
                    
		}
				
	}
	
	public function index()
	{
		$this->load->helper('Autenticate');
		$Auth= Auth();
		
		if($Auth){
			$this->load->model('gets');
			$data=array(
				'usuarios'=>$this->gets->getRowUser(),
				'carreraUser'=>$this->gets->getByidCarrera(),
				'publicaciones'=>$this->gets->getPublicaciones()
			);
			$this->load->view('index',$data);
		}
		else{
			redirect('Welcome/login');
		}

	}
	public function AccountActivated()
	{
		$this->load->model('queries');
		$validation=$this->queries->ValidationURLActivate();
		if($validation){
			$this->load->view('AccountActivated');
		}
		else{
            redirect('error404');
		}		

	}
    public function VerifiyEmail()
	{
		$this->load->model('queries');
		$validation=$this->queries->validationupdateEmail();
		if($validation){
            $email=$this->input->post('email');
            $id=htmlspecialchars($_GET["id"]);
			 
			$this->load->model('update');
			$this->update->updateEmail($email,$id);
			$this->load->view('VerifyEmailUpdate');
		}
		else{
            redirect('error404');
		}		

	}
		public function publicar()
	    {
			$this->form_validation->set_error_delimiters('', '');

			$this->load->model('functions');
			$this->load->model('gets');
			$data=array(
				'usuarios'=>$this->gets->getRowUser(),
				'carreraUser'=>$this->gets->getByidCarrera(),
				'publicaciones'=>$this->gets->getPublicaciones()

			);
			$this->form_validation->set_rules('descripcion','descripcion','required');

			if($this->form_validation->run()==false){
				$this->load->view('index',$data);
				
						}
			else{

				    $this->load->model('insert');
					$descripcion=$this->input->post('descripcion');
					$file=$_FILES['foto']['name'];
					$file=str_replace(' ', '-', $file);
					$tipo= pathinfo($file, PATHINFO_EXTENSION);
					if ($tipo=="PNG" or $tipo=="JPEG" or $tipo=="JPG" or $tipo=="PDF" or $tipo=="DOCX" or $tipo=="xlsx" or $tipo=="png" or $tipo=="jpeg" or $tipo=="jpg" or $tipo=="pdf" or $tipo=="docx" or $tipo=="xlsx"){
					    $this->insert->insertpublicacion($descripcion,$file);
						$this->functions->cargarimagenpublication($file);
						$_SESSION['message30'] =  'Su publicacion fue exitosa';
						  redirect('welcome');
						  
					}
					else if($tipo=="") {
					$file="NULL";
					$this->insert->insertpublicacion($descripcion,$file);
					$_SESSION['message30'] =  'Su publicacion fue exitosa';

					redirect('welcome');
					}
					else{
						$_SESSION['message30'] =  'Los formatos admitidos son: JPEG,PNG,JPEF,PDF,DOCX Y XLSX';
                        redirect('welcome');
					}
                  
                  
		}
	}


		public function publicacionesUser()
		{
			$this->load->helper('Autenticate');
			$Auth= Auth();
			
			if($Auth){
				$this->load->model('gets');
				$data=array(
					'usuarios'=>$this->gets->getRowUser(),
					'carreraUser'=>$this->gets->getByidCarrera(),
				);
				$this->load->view('mispublicaciones',$data);
			}
			else{
				redirect('Welcome/login');
			}	
		}

	public function error404()
	{
	    $this->load->view('erros/html/error_404');

	}
	public function logout()
	{
		$this->session->set_userdata('email');
		$this->session->sess_destroy();
		session_unset ();
		redirect('Welcome/login');

	}

	
	public function eliminarpublicacion()
	{
	 $this->input->post('eliminar');
	 $this->load->model('delete');
	 $idpublicacion=$this->input->post('idpublicacion');
	 $this->delete->eliminarpublicacion($idpublicacion);
	 $_SESSION['message26'] = 'Su publicacion se ha eliminado exitosamente';
	 redirect('welcome');
	}
	public function editarpublicacion()
	{
	$this->load->model('update');
	$idpublicacion=$this->input->post('idpublicacion');
	$descripcion=$this->input->post('descripcion');
	$this->update->updatepublicacion($idpublicacion,$descripcion);
	$_SESSION['message27'] = 'Su publicacion se ha actualizado correctamente';
	redirect('welcome');

	}
	public function publicarComentario()
	{
	$this->load->model('insert');
	$idpublicacion=$this->input->post('idpublicacion');
	$descripcion=$this->input->post('descripcion');
	$result=$this->insert->publicarComentario($idpublicacion,$descripcion);
	if($result){
	 redirect('welcome');
	}
	else{
		echo "ha ocurrido un error";
	}

	}
	public function EliminarComentario()
	{
	 $this->load->model('delete');
	 $idrespuesta= $this->input->post('idrespuesta');
	 $this->delete->EliminarComentario($idrespuesta);
	 redirect('welcome');

	}
	public function EditarComentario()
	{
		$this->load->model('update');
		$descripcion= $this->input->post('descripcion');
		$idrespuesta= $this->input->post('idrespuesta');
		$this->update->EditarComentario($idrespuesta,$descripcion);
         redirect('welcome');
        

	}
	public function recargar () {
		$this->load->model('gets');
		$a = ['usuarios' => $this->gets->getPublicaciones()];
		$this->load->view('publicaciones', $a);
	}
	public function like () {
		$this->load->model('update');
		$this->load->model('gets');
		$idpublicacion=$this->input->post('id');
		$result=$this->gets->validationLike($idpublicacion);
		if($result){

		}
		else{
			$this->update->like($idpublicacion);

		}
		
	}
	public function hidelike () {
		$this->load->model('update');
		$this->load->model('gets');
		$idpublicacion=$this->input->post('id');
		$result=$this->gets->validationLike($idpublicacion);
         if($result){
        $this->update->hidelike($idpublicacion);
		 }
		 else{

		 }
		
	}
	public function getComments () {
	$idpublicacion=$this->input->post('id');
	$this->load->model('gets');
	$result=$this->gets->getComments($idpublicacion);
	$json = array();
			foreach ($result->result() as $row)
		{ 
			$json[] = array(
			'descripcion' => $row->descripcion,
		  );
		}
	$jsonstring = json_encode($json);
	echo $jsonstring;
	}
}
