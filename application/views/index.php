
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">  
     <?php $this->load->view('libraries/libraries')?>
    <link rel="stylesheet" href="<?php echo base_url()?>/css/stylenav.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/css/fonts.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/css/estilos.css">
    <link rel="shortcut icon" href="<?php echo base_url("/images/migsed-favicon.jpeg")?>">
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="<?php echo base_url()?>/js/main.js"> </script>
    <title>Document</title>
    
</head>
<style>
 body{
 background-color:#E9EFEB;
 }
 button{
 font-family:Arial;
  outline:none; 
  background: none;
  border: 0;
  color: inherit;
  font: inherit;
  line-height: normal;
  overflow: visible; 
  padding: 0; 
 }
 #eliminar:hover{
    background-color:#C2F9D1;
 }
 #editar:hover{
    background-color:#C2F9D1;
 }
 
 
 
</style>
<script>

$(document).ready(function(){


	$(document).on('click', '#editar', function(){
    var id=$(this).val();

    $("#descripcion"+id).css("display", "none");
    $("#textarea"+id).css("display", "block");
    $("#publicar"+id).css("display", "block");

  });
  $(document).on('click', '#comentarios', function(){
    var id=$(this).val();
    $('.card-body'+id).toggle(); 


  });
 
});
</script>


<body id="body">
     <?php $this->load->view('navbars/navbaruser');?>
       <br><br><br>
    <div class="container-fluid">
                 <div class="row justify-content-center" style="margin-top:5px;">
                 <div class="col-md-2">
                 <?php foreach($usuarios->result() as $row){?>

                 <p> Bienvenido: <?php echo $row->nombre ?> <?php echo $row->apellidos ?></p>
                 <div class="row justify-content-center">
                                                      <div class="col-md-12">
                                                      <div class="row justify-content-center"><img id="img-profile" class="foto-user" src="<?php echo base_url()?>/images/<?php echo $row->foto ?>"></img></div><br>
                                                        <div class="list-group" id="list-tab" role="tablist">
                                                        <a class="list-group-item list-group-item-action active" href="" >Home</a>
                                                        <a class="list-group-item list-group-item-action" href="<?php  echo base_url()?>index.php/user/profileAjustes" >Mi muro </a>
                                                        <a class="list-group-item list-group-item-action" href="<?php  echo base_url()?>index.php/user/profileAjustes" >Notificaciones </a>

                                                       <!-- <a class="list-group-item list-group-item-action" href="<? /*php  echo base_url()*/?>index.php/user/profileAsignatura" >Asignaturas</a> !-->
                                                        </div>
                                                       </div>
                                                  </div>
                 </div>
                 <?php }?>

                 <div id="div-normal" class="col-md-1">
                
                 </div>
                 <div class="col-md-7">
                     <div  class="row border-bottom " >
                       <div  class="col-md-12 border" style="background-color:#D4F2E1">
                         <p style="font-size:12px; margin:5px; text-indent:5px"> <strong> Crear publicacion </strong></p>
                        </div>  
                     </div>
                         <div class="row border-right border-left border-bottom  shadow p-3 mb-5 bg-white rounded">
                                <div class="col-md-2" style="background-color:white">
                                <div class="row justify-content-center"> 
                                        <?php foreach($usuarios->result() as $row2){?>
                                            <?php if($row2->foto<>"NULL"){?>
                                                <img id="img-profile-home" class="foto-user" src="<?php echo base_url()?>/images/<?php  echo $row->foto?>"> </img>
                                                <?php }else{?>
                                                <img id="img-profile-home"  class="foto-user" src="<?php echo base_url()?>/images/fotouser.png"> </img>

                                            <?php }?>
                                            <?php } ?>
                 
                                    </div>
                                    </div>
                                  
                                <div class="col-md-10 " >
                                    <div class="row">
                                    <div class="col-md-12" >
                                    <?php if (isset($_SESSION['message26'])) { ?>  
                                                                        <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert" style="padding-bottom:0%">
                                                                                    <p style="font-size:small"><?php echo $_SESSION['message26']; ?></p>
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                        </div>
                                                            <?php unset($_SESSION['message26']); } ?>
                                    <div id="messages-error"><?php  echo  form_error ( 'descripcion' );  ?></div>
                                    <form method="POST" action="<?php echo site_url('welcome/publicar')?>">
                                    <textarea name="descripcion" class="form-control mb-2" rows="2"> </textarea>
                                    <button type="submit" style="float:right" class="btn btn-primary mb-2 btn-sm "> Publicar</button>
                                     </form>
                                     </div>
                                     </div>                                                                         
                                </div>
                           </div>
                           
                           <?php foreach($publicaciones->result() as $row){?>

                           <div class="row border-right border-left border-bottom  shadow p-3 mb-5 bg-white rounded" style="background-color:white; margin-top:-35px;">
                           
                           <div class="col-md-2" style="background-color:white">
                                <div class="row justify-content-center"> 
                                <?php if($row->foto<>"NULL"){?>
                                                <img id="img-profile-home" src="<?php echo base_url()?>/images/<?php  echo $row->foto?>"> </img>
                                                <?php }else{?>
                                                <img id="img-profile-home" src="<?php echo base_url()?>/images/fotouser.png"> </img>

                                            <?php }?> 
                                        </div>
                                     <div class="row justify-content-center">
                                    <p><?php echo $row->nombre ?> <?php echo $row->apellidos ?> </p>
                                      </div>
                                    </div>
                                  <div class="col-md-10">
                                  <?php 
                                  $this->load->model('gets');
                                  $idpublicacion=$row->idpublicacion;
                                  $result=$this->gets->isPublicUser($idpublicacion);
                                  
                                  if($result){
                                    
                                    ?>
                                  <div id="div-dropdown" class="row" style="float:right; 	list-style:none; ">
                                  <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a  ><form id="frm-eliminar" method="POST" action="<?php echo site_url('welcome/eliminarpublicacion')?>"><input type="hidden" name="idpublicacion" value="<?php echo $row->idpublicacion?>"></input> <button type="submit" id="eliminar"name="eliminar" class= "col-md-12 ">Eliminar </button><br></form></a>
                                        <a> <button type="submit"  id="editar" value="<?php echo $row->idpublicacion?>" name="editar"  class= "col-md-12 ">editar </button></a>
                                        </div>
                                    </li>
                                  </div>
                                  <?php }?>
                                  <div id="div-update"class="row">
                                  <p id="descripcion<?php echo $row->idpublicacion?>"><?php  echo $row->descripcion?></p>
                                  <div id="update" class="col-md-12">
                                  <form action="<?php echo site_url('welcome/editarpublicacion')?>" method="POST">
                                  <input type="hidden" name="idpublicacion" value="<?php echo $row->idpublicacion?>"> </input>
                                  <textarea id="textarea<?php echo $row->idpublicacion?>" style="display:none" name="descripcion" class="form-control mb-2  " value="<?php echo $row->descripcion ?>"><?php  echo $row->descripcion?></textarea>
                                  <button type="submit" id="publicar<?php echo $row->idpublicacion?>" style="display:none" class="btn btn-primary mb-2 btn-sm   "> editar</button>
                                 </form>
                                   </div>

                                   </div>
                                   
                                  </div>
                                  <?php $numrows= $this->gets->numrowscomments($idpublicacion);?>
                                  <button type="button"  class="comentarios" id="comentarios"  value="<?php echo $row->idpublicacion?>">Ver comentarios (<?php echo $numrows?>)</button>
                                  <div class="card-body<?php echo $row->idpublicacion ?>" id="card-body<?php echo $row->idpublicacion ?>" style="display:none">
                                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                                    </div>

                           </div>
                           <?php }?>                 

                 </div>
                 <div id="div-normal2" class="col-md-2">
           
                 </div>
                </div>
         </div>


     </div> 

</body>

</html>