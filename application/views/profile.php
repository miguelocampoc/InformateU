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
                                                        <a class="list-group-item list-group-item-action active" href="" >Tus datos</a>
                                                        <a class="list-group-item list-group-item-action" href="<?php  echo base_url()?>index.php/user/profileAjustes" >Ajustes email y contraseña</a>
                                                        <a class="list-group-item list-group-item-action" href="<?php  echo base_url()?>index.php/user/profileAsignatura" >Asignaturas</a>
                                                        </div>
                                                       </div>
                                                  </div>
                                        </div>
                                                <div class="col-md-8">
                                            
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="row">
                                                            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                                                            <div class="row" style ="margin-left:5px">
                                                              <div class="col-md-12">
                                                                  <h4>Tus datos</h4>
                                                                </div>
                                                         </div>
                                                         <div class="row" style ="margin-left:5px">
                                                              <div class="col-md-6">
                                                                  <p>Nombres</p>
                                                                  <input type="text" name="nombre" value="<?php echo $nombre ?>"class="form-control" >
                                                                  <p>  Usuario</p>
                                                                  <input type="text" name="usuario" value="<?php echo $usuario ?>" class="form-control" >
                                                                  <p>Genero</p>
                                                                  <div  class="row ">
                                                                       
                                                                                    <div class="col-md-6">
                                                                                         <div class="col-md-12">
<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1"<?php if($genero=="M"){?>checked<?php }?> >
                                                                                                    <label class="form-check-label" for="exampleRadios1">
                                                                                                    Male
                                                                                                    </label>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                         <div class="col-md-12">
                                                                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2"  <?php if($genero=="F"){?>checked<?php }?> >
                                                                                                <label class="form-check-label" for="exampleRadios2">
                                                                                                    Female
                                                                                                </label>
                                                                                        </div>

                                                                                    </div>
                             
                                                                  </div>
                                                                 
                                                                </div>
                                                                <div class="col-md-6">
                                                                   <p>Apellidos</p>
                                                                   <input type="text" name="apellidos" value="<?php echo $apellidos ?>" class="form-control " >
                                                                   <p>  Email</p>
                                                                  <input type="text" name="email" value="<?php echo $email ?>"  class="form-control" >
                                                                  <p>Cumpleaños </p>
                                                                  <input type="date"  value="<?php echo $cumpleaños ?>" name="birthday" class="form-control" >
                                                                
                                                                </div>
                                                         </div>
                                                         <div style ="margin-left:5px" class="row" >
                                                             <div class="col-md-12">
                                                            <p>Biografia</p>
                                                            <input type="text" name="biografia" value="<?php echo $biografia ?>" class="form-control" >
                                                            </div>
                                                         </div>
                                                         <div style ="margin-left:5px" class="row">
                                                             <div class="col-md-12">
                                                            <p>¿Que estudias?</p>
                                                            <input type="text" name="carrera" class="form-control" ><br>
                                                            <button type="submit" style="font-family:Arial; " class="btn btn-primary mb-2 ">Guardar Cambios</button>

                                                            </div>
                                                         </div>
                                                     <div>
                                                  </div>   
                                            </div>
                                        </div>
                            </div>
                                                            
                                                        </div>
                              
                                                     </div>
                                                </div>
       </div>
   
</body>
</html>