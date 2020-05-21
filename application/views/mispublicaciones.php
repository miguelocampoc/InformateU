

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
 body{
 background-color:#E9EFEB;
 }

 #eliminar:hover{
    background-color:#C2F9D1;
 }
 #editar:hover{
    background-color:#C2F9D1;
 }
 .textarea{
    display:none;
 }
 .publicar{
    display:none;
 }
 .cancelar{
   display:none;

 }
 .showlike{
    display:none;
 }
 
</style>
<script>

$(document).ready(function(){


	$(document).on('click', '#editar', function(){
    var id=$(this).val();
    $("#descripcion"+id).css("display", "none");
    $("#textarea"+id).css("display", "block");
    $("#publicar"+id).css("display", "block");
    $("#cancelar"+id).css("display", "block");


  });
  $(document).on('click', '.cancelar', function(){
    var id=$(this).val();
    $("#descripcion"+id).css("display", "block");
    $("#textarea"+id).css("display", "none");
    $("#publicar"+id).css("display", "none");
    $("#cancelar"+id).css("display", "none");


  });
  $(document).on('click', '#comentarios', function(){
    var id=$(this).val();
    $('.card-body'+id).toggle(); 


  });
  $(document).on('click', '#EditarComentario', function(){
    var id=$(this).val();
    $(".comentario"+id).css("display", "none");
    $("#textareacomentario"+id).css("display", "block");
    $("#buttoncomentario"+id).css("display", "block");

  });
  $(document).on('click', '#click', function(){
    var id=$(this).val();
    alert(id)

  });
 
});

function like(id){
   div = document.getElementById('click'+id);
   div.style.display = 'none';
   div2 = document.getElementById('showlike'+id);
   div2.style.display = 'block';


}
function hidelike(id){
   div2 = document.getElementById('showlike'+id);
   div2.style.display = 'none';

   div = document.getElementById('click'+id);
   div.style.display = 'block';


}
</script>


<body id="body">
     <?php $this->load->view('navbars/navbaruser');?>
       <br><br><br>
    <div class="container-fluid" >
       <div class="row">
                        <div  id="sidemenu" class=" col-lg-2 col-md-3 ">
                                       <?php foreach($usuarios->result() as $row){?>
                                          <p class="pt-2" >Bienvenido:<?php echo $row->nombre ?>  <?php echo $row->apellidos ?>
                                          <?php if($row->foto<>"NULL"){?>
                                             <div style="text-align:center">
                                          <img id="img-profile"  src="<?php echo base_url()?>/images/<?php  echo $row->foto?>"> </img>
                                          </div>
                                          <?php }else{?>
                                             <div style="text-align:center">

                                             <img id="img-profile"   src="<?php echo base_url()?>/images/fotouser.svg"> </img>
                                              </div>
                                          <?php }?>
                                       <?php }?>
                                       <br>
                                       <div>
                                       <a class="list-group-item list-group-item-action " href="<?php  echo base_url()?>index.php/welcome" >Home</a>
                                       <a class="list-group-item list-group-item-action active" href="<?php  echo base_url()?>index.php/welcome/publicacionesUser" >Mi muro </a>
                                       </div>
                        </div>
                        <div class="col-md-1 col-lg-3">
                                                           
                        </div>
                    
                        <div class="col-lg-7 col-md-6">
                       
                        <div class="row pt-3 pr-3 ">
                                                        
                        <div id="messages-error"><?php  echo  form_error ( 'descripcion' );  ?></div>
              
                        </div>           
                        <?php if (isset($_SESSION['message30'])) { ?>  
                                                                        <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert" style="padding-bottom:0%">
                                                                                    <p style="font-size:small"><?php echo $_SESSION['message30']; ?></p>
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                        </div>
                                                            <?php unset($_SESSION['message30']); } ?>
                                                            <?php if (isset($_SESSION['message27'])) { ?>  
                                                                        <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert" style="padding-bottom:0%">
                                                                                    <p style="font-size:small"><?php echo $_SESSION['message27']; ?></p>
                                                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                        </div>
                                                            <?php unset($_SESSION['message27']); } ?>                                          <div class="row  border-right border-left border-bottom  bg-white pl-3 pt-1">
                                                        
                                          Crear publicacion

                                          </div>
                                          <div class="row  border-right border-left border-bottom  bg-white pt-2 pb-2">
                                                <div class="col-md-2 pb-1">
                                                                        <?php foreach($usuarios->result() as $row){?>
                                                                  <?php if($row->foto<>"NULL"){?>
                                                                        <img id="img-profile-publication"  src="<?php echo base_url()?>/images/<?php  echo $row->foto?>"> </img>
                                                                        <?php }else{?>
                                                                        <img id="img-profile-publication"  src="<?php echo base_url()?>/images/fotouser.svg"> </img>

                                                                  <?php }?>
                                                                  <?php } ?>
                                               </div>
                                               <div class="col-md-10 ">
                                           
                                                            <form method="POST" action="<?php echo site_url('welcome/publicar')?>"  enctype="multipart/form-data" id="frm-login">
                                                               <textarea rows="2" name="descripcion" class="form-control" > </textarea>
                                               </div>
                              
                                          </div>
                                          <div class="row bg-white pt-1">
                                                         
                                                         <div class="col-lg-5 col-lg-5" >
                                                         <input class="form-control-file" name="foto" type="file" >

                                                         </div>
                                                         <div class="col-lg-7 col-lg-7">
                                                         <button type="submit"  id="btnguardar" style="float:right; margin-top:2px;" class="btn btn-primary mb-2 btn-sm "> Publicar</button>
                                                         </div>
                                                         </form>

                                          </div>
                                          <div class="pb-3">
                                          </div>
                                          <span id="">
                                          <?php foreach($publicaciones->result() as $row){?>

                                                                  <div class="row bg-white pt-1" >
                                                                           <div class=" col-lg-1 col-md-2">
                                                                                                   <?php if($row->foto<>"NULL"){?>
                                                                                                            <img id="img-profile-publication" src="<?php echo base_url()?>/images/<?php  echo $row->foto?>"> </img>
                                                                                                            <?php }else{?>
                                                                                                            <img id="img-profile-publication" src="<?php echo base_url()?>/images/fotouser.svg"> </img>

                                                                                                      <?php }?> 
                                                                           </div>
                                                                           <div  class=" col-lg-10 col-md-9">
                                                                      
                                                                           <?php  echo $row->nombre;?> <?php echo $row->apellidos?>
                                                                           </div>
                                                                           <div class=" col-lg-1 col-md-1">
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
                                                                           </div>
                                                                  </div>
                                                               <!-- encabezado finalizado !-->
                                                               <!-- contenido de la publicacion !-->

                                                               <div class="row bg-white pt-2" >
                                                                        <div class="col-md-12 pb-1">
                                                                              <div style="text-indent:18px;">
                                                                              <form action="<?php echo site_url('welcome/editarpublicacion')?>" method="POST">
                                                                                  <input type="hidden" name="idpublicacion" value="<?php echo $row->idpublicacion?>"> </input>
                                                                                 <p class="descripcion" id="descripcion<?php echo $row->idpublicacion?>">   <?php  echo $row->descripcion?> </p>
                                                                                 <textarea class="textarea form-control"  name="descripcion" id="textarea<?php echo $row->idpublicacion ?>"> <?php  echo $row->descripcion?> </textarea><div class="pb-2"></div>
                                                                                <div class="row"> 
                                                                                 <div class="col-md-10 col-lg-10"> 
                                                                                  <button type="button" id="cancelar<?php echo $row->idpublicacion?>" value="<?php  echo $row->idpublicacion?>" class="cancelar btn btn-danger btn-sm"> x cancelar</button>
                                                                                  </div> 
                                                                                  <div class="col-md-2 col-lg-1"> 
                                                                                  <button type="submit" id="publicar<?php echo $row->idpublicacion?>" class="publicar btn btn-primary btn-sm"> Editar</button>
                                                                                  </form>
                                                                                  </div> 
                                                                                 </div> 

                                                                              </div>
                                                                        </div>
                                                               </div>
                                                               <?php $archivo=$row->archivo ?>
                                                               <?php if($archivo!="NULL"){?>
                                                                 <?php $tipo= pathinfo($row->archivo, PATHINFO_EXTENSION); $tipo=strval($tipo)  ?>
                                                                 <?php if($tipo=="jpg"|| $tipo=="png"|| $tipo=="jpeg" ){?>
                                                               <div class="row bg-white  border pb-1  justify-content-center"  >
                                                                        <img   src="<?php echo base_url()?>/images/<?php echo $row->archivo?>"  class="img-fluid" alt="Responsive image"> </img>
                                                               </div>
                                                                        <?php }else{?>
                                                                           <div class="row bg-white pt-2 pl-3 border pb-2 pr-3"  >
                                                                          <a class="left-align" href="<?php echo base_url()?>/images/<?php echo $row->archivo ?>"><?php echo $row->archivo ?> </a>
                                                                          </div>
                                                                        <?php }?>
                                                                       
                                                                        <?php }?>
                                                         
                                                            <!-- contenido de la publicacion terminada-->
                                                            <!-- seccion de herramientas de publicacion !-->
                                                            <div class="row bg-white border" >
                                                                  <div class="col-lg-10 col-md-9">
                                                                     <div class="pt-2 pb-2">
                                                                     <?php $idpublicacion=$row->idpublicacion?>
                                                                     <?php $rows=$this->gets->numrowscomments($idpublicacion)?>
                                                                     <a href="">Ver comentarios(<?php echo $rows ?>)</a>
                                                                     </div>
                                                                  </div>
                                                                  <div  sytle="text-align:right" class="col-lg-2 col-md-3 ">
                                                                     <div  class="pt-1 pb-1 pr-1">
                                                                     <div class="col-md-12">
                                                                     <?php $likes= $this->gets->getlikes($row->idpublicacion) ?>
                                                                     <div  style="font-size:12px;"> <a id="click<?php echo $row->idpublicacion?>" onclick="like('<?php echo $row->idpublicacion?>')" value="<?php echo $row->idpublicacion?>" > <?php echo $likes ?> <img style="cursor: pointer;" width="16px" src="<?php echo base_url()?>/images/like.svg"></img></a></div>
                                                                     <div  style="font-size:12px;"> <a id="showlike<?php echo $row->idpublicacion?>"  class="showlike" onclick="hidelike('<?php echo $row->idpublicacion?>')" value="<?php echo $row->idpublicacion?>" >  <?php echo $likes+1; ?> <img style="cursor: pointer;" width="16px" src="<?php echo base_url()?>/images/like2.svg"></img></a></div>
 
                                                                     </div>
                                                                     </div>
                                                                  </div>
                                                               </div>
                                                               <br>
                                                               <?php }?>
                                                          
                                                               </span>
                                          
                                         
                                             
                        </div>
                        <div class="col-lg-2 col-md-2">

                         </div>
                      
            </div>
     </div> 
     <script src="<?php echo base_url()?>/js/peticiones.js"> </script>
     <script src="<?php echo base_url()?>/js/script.js"> </script>


</body>

</html>