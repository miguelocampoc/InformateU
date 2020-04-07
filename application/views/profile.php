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
       <div class="container">
           <h4>Editar perfil</h4>
         <div class="row  justify-content-left border">
                <div class="col-md-6 col-lg-6 col-xl-6 border ">
                        <div id="div-img">
                        <img  id="img-profile" src="<?php echo base_url("/images/mi_foto.png")?>"> </img><br><br>
                        <button type="submit" id="botton-profile" style="font-family:Arial; " class="btn btn-primary btn-sm ">Subir Imagen</button>

                        </div>
                </div>
             <div  style=" background-color:#EFF5FA; "class="col-md-6 col-lg-6 col-xl-6 border ">
                 

           <div class="border" style="margin-right:10px; margin-left:10px; margin-top:25px; margin-bottom:25px; padding:20px; background-color:white; opacity:1">
           <div  class="row">
                        <p style="text-indent:20px; ">Datos del usuario</p><br>
                 </div>
                  <div class="row">
                     <div class="col-md-12">
                     <p>Nombre</p>
                     </div>
                 </div>
                 <div class="row">
                            <div class="col-md-9">
                           <input type="text" name="nombre"  class="form-control form-control-sm"></input>
                           </div>
                            <div class="col-md-3">
                                <a href="">Editar</a>
                           </div>
                 </div><br>
                 <div class="row">
                     <div class="col-md-12">
                     <p>Apellido</p>
                     </div>
                 </div>
                 
                  <div class="row">
                        <div class="col-md-9">
                       <input type="text" name="apellido"  class="form-control form-control-sm"></input>
                        </div>
                      <div class="col-md-3">
                          <a href=""> Editar </a>
                        </div>
                 </div> 
                 <br>
                 <div class="row">
                        <div class="col-md-12">
                        <p>Email</p>
                        </div>
                 </div>
                 <div class="row">      
                        <div class="col-md-9">
                       <input type="text" name="apellido"  class="form-control form-control-sm"></input>
                        </div>

                        <div class="col-md-3">
                            <a href=""> Editar</a>
                        </div>
                         
                 </div><br>
                    <div class="row">
                        <div class="col-md-12">
                        <p>Clave</p>
                        </div>
                 </div>
                  <div class="row">      
                        <div class="col-md-9">
                       <input type="text" name="clave"  class="form-control form-control-sm"></input>
                        </div>

                        <div class="col-md-3">
                            <a href="">Editar</a>
                        </div>
                         
                 </div> 
                 <br>
             <button type="submit" id="botton-profile2" style="font-family:Arial; " class="btn btn-primary btn-sm  ">Guardar cambios</button>
             <br><br>
                 

                                 
          </div>
 
        </div>
          
       </div>
       </div>
   
</body>
</html>