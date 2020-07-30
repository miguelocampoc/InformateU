<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 class Insert extends CI_Model{

public function InsertarUsuario($email,$nombre,$apellidos,$usuario,$clave,$TokenActivate)
    {
        date_default_timezone_set('America/Bogota');
        $DataRegister=date("Y-m-d H:i:00");
        $this->email=$email;
        $this->nombre=$nombre;
        $this->apellidos=$apellidos;
        $this->usuario=$usuario;
        $foto="NULL";
        $this->clave=$clave;
        $this->TokenActivate=$TokenActivate;
        $data=[ 
            'nombre'=>$nombre,
            'apellidos'=>$apellidos,
            'usuario'=>$usuario,
            'foto' =>$foto,
            'email'=>$email,
            'clave'=> password_hash($clave,PASSWORD_ARGON2I/*,array("cost"=>12)  */),
            'data_register'=>$DataRegister,
            'DateTimeRecover'=>$DataRegister,
            'TokenActivate'=>password_hash($TokenActivate,PASSWORD_ARGON2I),
            'token' => 'NULL',
            'tipo'=>'NoActivated',
            'idcarrera'=>10000
            
        ];
        return  $this->db->insert('usuarios',$data);
    
       
    }
    public function insertpublicacion($descripcion,$file,$idlastpost){
        $this->load->model('gets');
        $this->idlastpost=$idlastpost;
        $this->descripcion=$descripcion;
        $this->file=$file;
        $iduser=$_SESSION['iduser'];
        $data= [ 
            'idpublicacion'=>$idlastpost,
            'iduser'=> $iduser,
            'descripcion'=>$descripcion,
            'archivo'=>$file
        ];
        return  $this->db->insert('publicaciones',$data);

    }
    public function publicarComentario($idpublicacion,$descripcion,$file,$idrespuesta){
        $this->idrespuesta=$idrespuesta;
        $this->file=$file;
        $this->idpublicacion=$idpublicacion;
        $this->descripcion=$descripcion;
        $iduser=$_SESSION['iduser'];
      
        $data= [
            'file'=> $file,
            'idrespuesta'=> $idrespuesta,
            'iduser'=> $iduser,
            'idpublicacion'=> $idpublicacion,
            'descripcion'=>$descripcion,
        ];
        return  $this->db->insert('comentarios',$data);

    }
}
?>