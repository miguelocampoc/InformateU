<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <?php $this->load->view('libraries/libraries')?>

    <link rel="stylesheet" href="<?php echo base_url()?>/css/stylenav.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/css/estilos.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url()?>/js/main.js"> </script>
    <title>Document</title>
    
</head>
<body>
<style>
 p{
     font-family:Arial;
     font-size:15px;
 }
</style>

<header>
             

             <div class="menu_bar">
                     <a href="#" class="bt-menu"><i class="fas fa-bars"></i> Menu</a>
             </div>

             <nav>
                 
                         <ul>

                             <li>
                                 <a href="<?php  echo base_url()?>index.php/welcome"><i class="fas fa-home"></i> Home</a>
                             </li>
                                                                            
                             <li  id="posicion" class="submenu">
                                 <a href="#"><span class="fa fa-user"></span>Miguel Ocampo <i class="fas fa-chevron-down"></i></a>
                                 <ul id="hidden" class="children">
                                 <li id="hidden-li">
                                    <a href="<?php  echo base_url()?>index.php/welcome"> <i class="fas fa-home"></i> Home</a>
                                   </li>  
                                     <li> <a href="<?php  echo base_url()?>index.php/user/profile"><i class="fas fa-user-circle"></i> Mi cuenta</a></li>
                                     <li><a href="<?php  ECHO base_url()?>index.php/welcome/logout"> <i class="fas fa-power-off"></i> Cerrar sesion</a></li>
                                 </ul>
                             </li>
                             
                            
                             

                                  
                         </ul>
                     

             </nav>
   
    
               
 </header>
    <br><br><br><br>
       <div class="container ">
                  <div class="row justify-content-center ">
                            <div class="col-sm-12 col-md-10  border">
                                       <div class="row">
                                                <div class="col-md-12">
                                                 <h3> Editar perfil </h3>
                                                </div>
                                        </div><br>
                                        <div class="row">
                                                <div id="div-img" class="col-md-4">
                                                 <img id="img-profile" src="<?php echo base_url("/images/mi_foto.png")?>"> </img>
                                                 <p>Sube una foto <a href="">aqui</a>
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                        <div class="list-group" id="list-tab" role="tablist">
                                                        <a class="list-group-item list-group-item-action " href="<?php  echo base_url()?>index.php/user/profile" >Tus datos</a>
                                                        <a class="list-group-item list-group-item-action active" href="">Ajustes email y contraseña</a>
                                                        <a class="list-group-item list-group-item-action"  href="<?php  echo base_url()?>index.php/user/profileAsignatura" >Asignaturas</a>
                                                        </div>
                                                       </div>
                                                  </div>
                                        </div>
                                                <div class="col-md-8">
                                            
                                                  
                                                        
                                        
                                                        <div class="row" style ="margin-left:5px">
                                                              <div class="col-md-12">
                                                                  <h4>Ajustes</h4>
                                                                </div>
                                                         </div>
                                                         <div class="row" style ="margin-left:5px">
                                                                 <div class="col-md-12">
                                                                  <h5> Cambiar Email</h5>
                                                                   <p style="margin-left:6px"> Su email actual es:</p>
                                                                   <input type="text" name="email" class="form-control form-control-sm col-md-10" >
                                        
                                                                   <p style="margin-left:6px"> Su nuevo email es:</p>
                                                                   <input type="text" name="email" class="form-control form-control-sm col-md-10" ><br>
                                                                   <button type="submit" style="font-family:Arial; " class="btn btn-primary mb-2 btn-sm">Enviar enlace</button><br>
                                                                   <h5> Cambiar Contraseña</h5>
                                                                   <p style="margin-left:6px"> Su contraseña actual es:</p>
                                                                   <input type="text" name="email" class="form-control form-control-sm col-md-10" >
                                                                   <p style="margin-left:6px"> Su nueva contraseña es:</p>
                                                                   <input type="text" name="email" class="form-control form-control-sm col-md-10" ><br>
                                                                   <button type="submit" style="font-family:Arial; " class="btn btn-primary mb-2 btn-sm">Cambiar Contraseña</button><br>
                                                                    <br>

                                                                </div>
                                                          <div>
                                                          
                                
                                                       
                              
                                                </div>
       </div>
   
</body>
</html>