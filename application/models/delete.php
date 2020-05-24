<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 class delete extends CI_Model{

public function eliminarpublicacion($idpublicacion)
    {
    
        $this->idpublicacion=$idpublicacion;
        $sql="DELETE FROM publicaciones WHERE idpublicacion=? ";
        $this->db->query($sql, array($idpublicacion));
    }
    public function EliminarComentario($idrespuesta){
        $this->idrespuesta=$idrespuesta;   
        $sql="DELETE FROM comentarios WHERE idrespuesta=?";
        $this->db->query($sql, array($idrespuesta));

    } 
    
}
?>