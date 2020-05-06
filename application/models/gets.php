<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 class gets extends CI_Model{

public function getRowUser()
    {

        $email= $_SESSION['email'];       
        $sql = "SELECT * FROM usuarios WHERE email = ? OR usuario=? "; 
        return $this->db->query($sql, array($email,$email));
       

    }
    public function getCarreras()
    {   $this->load->model('gets');
        $result= $this->gets->getByidCarrera();
        $row=$result->row();
        $email= $_SESSION['email'];       
        $sql = "SELECT *FROM carreras WHERE carrera<>?"; 
        return $this->db->query($sql, array($row->carrera));

    }
    public function getByidCarrera()
    {
       $email= $_SESSION['email'];       
       $sql="SELECT carrera FROM carreras LEFT OUTER JOIN usuarios ON carreras.idcarrera=usuarios.idcarrera WHERE usuarios.email=? OR usuarios.usuario=?";
       return $this->db->query($sql, array($email,$email));
      
    }
    public function getEmailByid($id)
    {
       $this->id=$id;
       $sql = "SELECT email FROM usuarios WHERE iduser=?"; 
       $result= $this->db->query($sql, array($id));
       $row=$result->row();
       return $row->email;
    }
    public function getidByEmail()
    {
        $email= $_SESSION['email'];       
        $sql = "SELECT*FROM usuarios WHERE email=? OR iduser=?"; 
        $result= $this->db->query($sql, array($email,$email));
        $row=$result->row();
        return $row->iduser;
    }
    public function getidByEmail2($email)
    {
        $this->email=$email;      
        $sql = "SELECT*FROM usuarios WHERE email=? OR iduser=?"; 
        $result= $this->db->query($sql, array($email,$email));
        $row=$result->row();
        return $row->iduser;
    }
    public function getPublicaciones()
    {
        $sql = "SELECT idpublicacion,nombre,apellidos,foto,descripcion FROM publicaciones INNER JOIN usuarios  ON usuarios.iduser=publicaciones.iduser ORDER BY idpublicacion DESC"; 
        return $this->db->query($sql);
        
    }
    public function isPublicUser($idpublicacion)
    {
        $this->idpublicacion=$idpublicacion;
        $iduser= $_SESSION['iduser'];       
        $sql="SELECT* FROM publicaciones WHERE idpublicacion=? AND iduser=? ";
        $result=$this->db->query($sql,array($idpublicacion,$iduser));
        $numrow= $result->num_rows();
        if($numrow==1){
            return true;
        }
        else{
            return false;
        }
    }
    public function numrowscomments($idpublicacion)
    {
       $this->idpublicacion=$idpublicacion;
       $sql="SELECT descripcion FROM respuestas WHERE idpublicacion=?";
       $result=$this->db->query($sql,array($idpublicacion));
       return $result->num_rows();

    }
   
}
?>