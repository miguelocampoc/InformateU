<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 class Update extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('generateToken');
		
	}
public function updatePassword()
    {  
       $id= htmlspecialchars($_GET["id"]);
       $clave =  password_hash($this->input->post("clave"),PASSWORD_DEFAULT);
       $sql="UPDATE usuarios SET clave=?,token=? WHERE iduser=?";
       $result= $this->db->query($sql, array($clave,"NULL",$id));
      
       if($result){
          return true; 
       }
       else{
           return false;
       }

    }
    public function AddTimeRecover()
    {         
       date_default_timezone_set('America/Bogota');
       $DataNow=date("Y-m-d H:i:00");
       $email=$this->input->post("email");

       $sql="UPDATE usuarios SET DateTimeRecover= ADDTIME('$DataNow','1:00') WHERE email=?";
       $result= $this->db->query($sql, array($email));
       
    }
    public function UpdateActivated($id)
    {  
       $this->id=$id;
       $sql="UPDATE usuarios SET tipo=?,TokenActivate=? WHERE iduser=?";
       $this->db->query($sql, array("Actived","NULL",$id));

    }
    public function UpdateUser()
    {  
      $this->load->helper('quitarespacio');
      $email= $_SESSION['email'];       
      $nombre =Quitar_EspaciosNombre($this->input->post("nombre"));
		$apellidos =Quitar_EspaciosApellido($this->input->post("apellidos"));
      $usuario= $this->input->post('usuario');
      $genero= $this->input->post('genero');
      $cumpleaños=$this->input->post('cumpleaños');
      $biografia=$this->input->post('biografia');
      $carrera=$this->input->post('carrera');
      $sql = "UPDATE usuarios SET nombre=?, apellidos=?, usuario=?, genero=?,cumpleaños=?,biografia=?, idcarrera=? WHERE email=?"; 
      return $this->db->query($sql, array($nombre,$apellidos,$usuario,$genero,$cumpleaños,$biografia,$carrera,$email));
    
    }
    public function UpdateTokenRecover($token,$email)
    {  
      $this->$token=$token;
      $token=password_hash($token,PASSWORD_DEFAULT);
      $this->$email=$email;
      $sql = "UPDATE usuarios SET token=? WHERE email=?"; 
      $this->db->query($sql, array($token,$email));
      
    }

    public function subirfoto($tipo,$iduser)
    {   
      $this->tipo=$tipo;
      $this->iduser=$iduser;
      $email= $_SESSION['email'];
      $foto="fotouser".$iduser.'.'.$tipo;
      $sql = "UPDATE usuarios SET foto=? WHERE email=?"; 
      $this->db->query($sql, array($foto,$email));
    }
    public function updateTokenEmail($token,$iduser)
    {   
      $this->$token=$token;
      $this->iduser=$iduser;
      $token=password_hash($token,PASSWORD_DEFAULT);
      $sql = "UPDATE usuarios SET tokenUpdateEmail=? WHERE iduser=?"; 
      $this->db->query($sql, array($token,$iduser));
     
    }




    public function updateEmail($email,$id)
    {   
      $this->email=$email;
      $this->id=$id;
      $sql = "UPDATE usuarios SET email=? ,tokenUpdateEmail=? WHERE iduser=? ";
      return $this->db->query($sql, array($email,"NULL",$id));

    }

    public function restablecerclave($clave)
    {   
    $this->clave=$clave;
    $email= $_SESSION['email'];
    $clave=password_hash($clave,PASSWORD_DEFAULT);
    $sql = "UPDATE usuarios SET clave=? WHERE email=?"; 
    $this->db->query($sql, array($clave,$email));
    }
}

?>