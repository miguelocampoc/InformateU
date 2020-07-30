<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <?php $this->load->view('libraries/libraries')?>
        <link rel="shortcut icon" href="<?php echo base_url("/images/migsedfa.png")?>">

    <link rel="stylesheet" href="<?php echo base_url()?>/css/stylenav.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/css/estilos.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url()?>/js/main.js"> </script>
    <title>Profile</title>
    
</head>
<body>
<style>
 p{
     font-family:Arial;
     font-size:15px;

 }

</style>
<?php $this->load->model('gets')?>
     <?php $row= $this->gets->getTipo()?>
      <?php $tipo=$row->tipo ?>
     <?php if($tipo=="administrador"){?>
     <?php $this->load->view('navbars/navbaruseradmin'); 
      }if($tipo=="Normal"){?>
     <?php $this->load->view('navbars/navbaruser'); ?>

     <?php }?>     <br><br><br><br>
       <div class="container ">
                  <div class="row justify-content-center ">
                            <div class="col-sm-12 col-md-10  border-right  border-left">
                                       <div class="row">
                                                <div class="col-md-12">
                                                 <h3> Editar perfil </h3>
                                                </div>
                                        </div><br>
                                        <div class="row">
                                                <div id="div-img" class="col-md-4">
                                                <?php foreach($usuarios->result() as $row){?>
                                                   <?php if($row->foto<>"NULL"){?>
                                                 <img id="img-profile" src="<?php echo base_url()?>/images/<?php  echo $row->foto?>"> </img>
                                                   <?php }else{?>
                                                    <img id="img-profile" src="<?php echo base_url()?>/images/fotouser.svg"> </img>

                                                   <?php }?>
                                            
                                                <?php } ?>  
                                                         <br><br><br><br><br>                                      
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                        <div class="list-group" id="list-tab" role="tablist">
                                                        <a class="list-group-item list-group-item-action " href="<?php  echo base_url()?>index.php/user/profile" >Tus datos</a>
                                                        <a class="list-group-item list-group-item-action active" href="">Ajustes</a>
                                                       <!-- <a class="list-group-item list-group-item-action" href="<? /*php  echo base_url()*/?>index.php/user/profileAsignatura" >Asignaturas</a> !-->                                                        </div>
                                                       </div>
                                                  </div>
                                        </div>
                                                <div class="col-md-8">

                                                <?php if (isset($_SESSION['message24'])) { ?>  
                                                                        <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert" style="padding-bottom:0%">
                                                                                    <p style="font-size:small"><?php echo $_SESSION['message24']; ?></p>
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                        </div>
                                                            <?php unset($_SESSION['message24']); } ?>




                                                <br>
                                                <div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
   
        <button  style="text-decoration:none; color:black"class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Reestablecimiento de la clave
        </button>
        <button  style="text-decoration:none; float:right"class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <a href="#" class="bt-menu"><i class="fas fa-chevron-down"></i> </a>

        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
    
    
      <div class="row">
          <p style="font-size:small; margin-left:30px;">Introdusca su nueva contraseña</p>
        </div>
        <div class="row">
        <div class="col-md-6">
        <form action="<?php echo site_url('user/restablecerclave')?>" method="POST">
          <input type="password" name="clave"  class="form-control form-control-sm col-md-12 " ><br>
        </div>
        <div class="col-md-6">
           <button type="submit" name="update" style="font-family:Arial; " class="btn btn-primary mb-2 btn-sm ">Reestablecer </button><br>
        </div>
         </form>
          </div>
          
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button style="text-decoration:none; color:black" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Reestablecimiento del email
        </button>
        <button  style="text-decoration:none; float:right"class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
        <a href="#" class="bt-menu"><i class="fas fa-chevron-down"></i> </a>

        </button>
        
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
      <p style="margin-left:10px; font-size:small">Si usted desea cambiar su email ingrese uno nuevo y se le enviaria a ese email un enlace para verificar la cuenta, una vez verificado su email se actualizara </p>
      <div class="row">
      <div class="col-md-6">
      <form action="<?php  echo site_url('user/restableceremail')?>" method="POST">
      <input type="text" name="email" class="form-control form-control-sm" >
      </div>
      <div class="col-md-6">
      <button type="submit" name="update" style="font-family:Arial; " class="btn btn-primary mb-2 btn-sm ">Enviar Enlace</button>
      </form>
      <br>
       </div>

      </div>
      </div>
    </div>
  

                                         
                                                        
                                        
                              
                                                </div>
                                                  
       </div>
       
</body>
</html>