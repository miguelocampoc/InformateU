<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <?php $this->load->view('libraries/libraries')?>
        <link rel="shortcut icon" href="<?php echo base_url("/images/migsed-favicon.jpeg")?>">

    <link rel="stylesheet" href="<?php echo base_url()?>/css/stylenav.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/css/estilos.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url()?>/js/main.js"> </script>
    <title>Document</title>
    
</head>
<body>
<?php $this->load->view('navbars/navbaruser')?>
    <br><br><br><br>
       <div class="container ">
                  <div class="row justify-content-center ">
                            <div class="col-sm-12 col-md-10  border-right  border-left">
                                       <div class="row">
                                                <div class="col-md-12">
                                                 <h3> Editar perfil </h3>
                                                </div>
                                        </div><br>
                                        <div class=" row justify-content-center">
                                                <div id="div-img" class="col-md-4">
                                                <?php if (isset($_SESSION['message21'])) { ?>  
                                                                        <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert" style="padding-bottom:0%">
                                                                                    <p style="font-size:small"><?php echo $_SESSION['message21']; ?></p>
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                        </div>
                                                            <?php unset($_SESSION['message21']); } ?>
                                                <?php foreach($usuarios->result() as $row){?>
                                                   <?php if($row->foto<>"NULL"){?>
                                                 <img id="img-profile" src="<?php echo base_url()?>/images/<?php  echo $row->foto?>"> </img>
                                                   <?php }else{?>
                                                    <img id="img-profile" src="<?php echo base_url()?>/images/fotouser.svg"> </img>

                                                   <?php }?>
                                            
                                                <?php } ?>
                                                 <div class="row justify-content-center">
                                                 <form action="<?php echo site_url()?>/user/subirfoto" method="post" enctype="multipart/form-data"><br>
                                                  <input type="file"  class="col-md-10" name="foto"><br><br>
                                                  <button type="submit" name="subir" style="font-family:Arial; " class="btn btn-danger mb-2 btn-sm  col-md-6">Actualizar foto</button><br><br>

                                                 </form>
                                                 </div>
                            
                                                  <div class="row">
                                                      <div class="col-md-12">
                                                        <div class="list-group" id="list-tab" role="tablist">
                                                        <a class="list-group-item list-group-item-action active" href="" >Tus datos</a>
                                                        <a class="list-group-item list-group-item-action" href="<?php  echo base_url()?>index.php/user/profileAjustes" >Ajustes </a>
                                                       <!-- <a class="list-group-item list-group-item-action" href="<? /*php  echo base_url()*/?>index.php/user/profileAsignatura" >Asignaturas</a> !-->
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
                                                           
                                                              <?php if (isset($_SESSION['message14'])) { ?>  
                                                                        <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert" style="padding-bottom:0%">
                                                                                    <p style="font-size:small"><?php echo $_SESSION['message14']; ?></p>
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                        </div>
                                                            <?php unset($_SESSION['message14']); } ?>
                                                                  <h4>Tus datos</h4>
                                                                  
                                                                </div>
                                                         </div>
                                                         <form method="POST" action="<?php site_url('user/profile')?>">
                                                         <?php foreach($usuarios->result() as $row){?>
                                                         <div class="row" style ="margin-left:5px">
                                                              <div class="col-md-6">
                                                              <div id="messages-error"><?php  echo  form_error ( 'nombre' );  ?></div>

                                                                  <p>Nombres</p>
                                           
                                                                  <input type="text" name="nombre" value="<?php echo $row->nombre ?>"class="form-control" >
                                                                  <div id="messages-error"><?php  echo  form_error ( 'usuario' );  ?></div>
                                                                  <div id="messages-error">
                                                                  <?php if (isset($_SESSION['message16'])) { ?>
                                                                    <?php echo $_SESSION['message16']; ?>
                                                                   <?php unset($_SESSION['message16']); } ?>
  
                                                                  </div>
                                                                  <p>  Usuario</p>
                                                                  <input type="text" name="usuario" value="<?php echo $row->usuario ?>" class="form-control" >
                                                                  <p>Genero</p>
                                                                  <div  class="row ">
                                                                       
                                                                                    <div class="col-md-6">
                                                                                         <div class="col-md-12">
                                                         <input class="form-check-input" type="radio" name="genero" id="exampleRadios1" value="M" <?php if($row->genero=="M"){?>checked ><?php }?> 
                                                                                                    <label class="form-check-label" for="exampleRadios1">
                                                                                                    Male
                                                                                                    </label>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                         <div class="col-md-12">
                                                                                                <input class="form-check-input" type="radio" name="genero" id="exampleRadios2" value="F" <?php if($row->genero=="F"){?>checked ><?php }?>  
                                                                                                <label class="form-check-label" for="exampleRadios2">
                                                                                                    Female
                                                                                                </label>
                                                                                        </div>

                                                                                    </div>
                             
                                                                  </div>
                                                                 
                                                                </div>
                                                                <div class="col-md-6">
                                                                <div id="messages-error"><?php  echo  form_error ( 'apellidos' );  ?></div>

                                                                   <p>Apellidos</p>
                                                                   <input type="text" name="apellidos" value="<?php echo $row->apellidos ?>" class="form-control " >
                                                                   <p>  Email</p>
                                                                  <input type="text"  value="<?php echo $row->email ?>"  class="form-control" disabled >
                                                                  <p>Cumpleaños </p>
                                                                  <input type="date" name="cumpleaños"  value="<?php echo $row->cumpleaños ?>" name="birthday" class="form-control" >
                                                                
                                                                </div>
                                                         </div>
                                                         <div style ="margin-left:5px" class="row" >
                                                             <div class="col-md-12">
                                                            <p>Biografia</p>
                                                            <input type="text" name="biografia" value="<?php echo $row->biografia ?>" class="form-control" >
                                                            </div>
                                                         </div>
                                                         <?php }?>
                                                         <div style ="margin-left:5px" class="row">
                                                             <div class="col-md-12">
                                    
                                                            <div class="form-group">
                                                                <label for="exampleFormControlSelect1">¿Que estudias?</label>
                                                                <select id ="option" name="carrera" class="form-control" id="exampleFormControlSelect1">
                                                                <?php foreach($carreraUser->result() as $row2){?>
                                                                <option id="option" name="carrera" value="1"><?php echo $row2->carrera?></option>
                                                                <?php }?>
                                                                <?php foreach($carreras->result() as $row){?>
                                                                <option id="option" name="carerra" value="<?php echo $row->idcarrera?>"> <?php echo $row->carrera?></option>
                                                                <?php }?>
                                                               
                                                                </select>
                                                            </div>
                                                            <button type="submit" name="update" style="font-family:Arial; " class="btn btn-primary mb-2 ">Guardar Cambios</button><br><br>
                                                            </form>
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