<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
 class functions extends CI_Model{

    public function cargarimagen($tipo,$iduser)
    {      
        
        $this->tipo=$tipo;
        $this->iduser=$iduser;

        $mi_archivo ='foto';
        $config['upload_path'] = "images/";
        $config['overwrite'] = TRUE;
        $config['file_name'] = 'fotouser'.$iduser;
        $config['allowed_types'] = "jpg|png";
        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";

        $this->load->library('upload', $config);
        
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error
            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return false;
        }
        else{
            $data['uploadSuccess'] = $this->upload->data();
            return true;
        }

   
  }
  public function cargarimagenpublication($file)
    {      
        
        $this->file=$file;
       
        $mi_archivo ='foto';
        $config['upload_path'] = "images/";
        $config['file_name'] = $file;
        $config['allowed_types'] = "jpg|png|jpeg|xlsx|pdf|docx|pptx";
        $config['max_size'] = "0";
        $config['max_width'] = "0";
        $config['max_height'] = "0";

        $this->load->library('upload', $config);
        
        
        if (!$this->upload->do_upload($mi_archivo)) {
            //*** ocurrio un error

            $data['uploadError'] = $this->upload->display_errors();
            echo $this->upload->display_errors();
            return false;
        }
        else{

            $data['uploadSuccess'] = $this->upload->data();
            return true;
        }

   
  }
  public function cargarimagencoment($file)
  {      
      
      $this->file=$file;
     
      $mi_archivo ='filecoment';
      $config['upload_path'] = "images/";
      $config['file_name'] = $file;
      $config['allowed_types'] = "jpg|png|jpeg|gif";
      $config['max_size'] = "0";
      $config['max_width'] = "0";
      $config['max_height'] = "0";

      $this->load->library('upload', $config);
      
      
      if (!$this->upload->do_upload($mi_archivo)) {
          //*** ocurrio un error

          $data['uploadError'] = $this->upload->display_errors();
          echo $this->upload->display_errors();
          return false;
      }
      else{

          $data['uploadSuccess'] = $this->upload->data();
          return true;
      }

 
}
}
?>