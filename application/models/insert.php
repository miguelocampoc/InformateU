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
            'tipo'=>'Activated',
            'idcarrera'=>10000
            
        ];
        return  $this->db->insert('usuarios',$data);
    
       
    }
    public function insertpublicacion($descripcion,$file){
        $this->load->model('gets');
        $rows=$this->gets->getPublicaciones()->num_rows();
        $this->descripcion=$descripcion;
        $this->file=$file;
        
        if($file=="jpg"||$file=="png"||$file=="jpeg"||$file=="pdf"||$file=="xlsx"||$file=="docx"){
            $file='archivo.'.$file;
        }
        else{
            if($file==""){
                $_SESSION['message27'] = 'Publicacion realizada exitosamenrte';

            }
            else{
                $_SESSION['message27'] = 'Solo se admiten formatos jpg,jpeg,png,pdf,xlsx y docx';
                redirect('welcome');
            }
        }

        $iduser=$_SESSION['iduser'];
        $data= [ 
            'iduser'=> $iduser,
            'descripcion'=>$descripcion,
            'archivo'=>$file
        ];
        return  $this->db->insert('publicaciones',$data);

    }
    public function publicarComentario($idpublicacion,$descripcion){
        $this->idpublicacion=$idpublicacion;
        $this->descripcion=$descripcion;
        $iduser=$_SESSION['iduser'];
        $data= [ 
            'iduser'=> $iduser,
            'idpublicacion'=> $idpublicacion,
            'descripcion'=>$descripcion,
        ];
        return  $this->db->insert('comentarios',$data);

    }
}
?>