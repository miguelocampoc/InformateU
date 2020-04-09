<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 class gets extends CI_Model{

public function getRowUser()
    {

        $email= $_SESSION['email'];       
        $sql = "SELECT * FROM usuarios WHERE email = ? OR usuario=? "; 
        return $this->db->query($sql, array($email,$email));
       

    }
}
?>