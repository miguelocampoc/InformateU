
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
  $(document).on('click', '#EditarComentario', function(){
    var id=$(this).val();
    $(".comentario"+id).css("display", "none");
    $("#textareacomentario"+id).css("display", "block");
    $("#buttoncomentario"+id).css("display", "block");

  });
 
 
});
</script>


<body id="body">
     <?php $this->load->view('navbars/navbaruser');?>
       <br><br><br>
    <div class="container-fluid" >
       <div class="row">
                        <div class=" col-lg-2 col-md-3 ">
                                       <?php foreach($usuarios->result() as $row){?>
                                          <p class="pt-2" >Bienvenido:<?php echo $row->nombre ?><?php echo $row->apellidos ?>
                                          <?php if($row->foto<>"NULL"){?>
                                             <div style="text-align:center">
                                          <img id="img-profile"  src="<?php echo base_url()?>/images/<?php  echo $row->foto?>"> </img>
                                          </div>
                                          <?php }else{?>
                                             <img id="img-profile"   src="<?php echo base_url()?>/images/fotouser.png"> </img>

                                          <?php }?>
                                       <?php }?>
                                       <br>
                                       <div>
                                       <a class="list-group-item list-group-item-action " href="<?php  echo base_url()?>index.php/welcome" >Home</a>
                                       <a class="list-group-item list-group-item-action active" href="<?php  echo base_url()?>index.php/welcome/publicacionesUser" >Mi muro </a>
                                       </div>
                        </div>
                        <div class="col-md-1 col-lg-1">
                            
                        </div>
                        <div class="col-lg-6 col-md-6">
                                           <br>
                                          <div class="row  border-right border-left border-bottom  bg-white pl-3">
                                          Crear publicacion
                                          </div>
                                          <div class="row  border-right border-left border-bottom  bg-white pt-2 pb-2">
                                                <div class="col-md-2 pb-1">
                                                                        <?php foreach($usuarios->result() as $row){?>
                                                                  <?php if($row->foto<>"NULL"){?>
                                                                        <img id="img-profile-publication"  src="<?php echo base_url()?>/images/<?php  echo $row->foto?>"> </img>
                                                                        <?php }else{?>
                                                                        <img id="img-profile-publication"  src="<?php echo base_url()?>/images/fotouser.png"> </img>

                                                                  <?php }?>
                                                                  <?php } ?>
                                               </div>
                                               <div class="col-md-10 ">
                                                               <textarea rows="2" class="form-control" > </textarea>
                                               </div>
                              
                                          </div>
                                          <div class="row bg-white pt-1">
                                                         
                                                         <div class="col-lg-5 col-lg-5" >
                                                         <input class="form-control-file"  type="file" name="foto">

                                                         </div>
                                                         <div class="col-lg-7 col-lg-7">
                                                         <button type="submit"  style="float:right; margin-top:2px;" class="btn btn-primary mb-2 btn-sm "> Publicar</button>
                                                         </div>
                                          </div>
                                          <div class="pb-3">
                                          </div>
                                          <!-- seccion de publicaciones !-->
                                          <!-- encabezado !-->
                                          <div class="row bg-white pt-1" >
                                                   <div class=" col-lg-1 col-md-2">
                                                                        <?php foreach($usuarios->result() as $row){?>
                                                               <?php if($row->foto<>"NULL"){?>
                                                               <img id="img-profile-publication"  src="<?php echo base_url()?>/images/<?php  echo $row->foto?>"> </img>

                                                               <?php }else{?>
                                                                  <img id="img-profile-publication"  src="<?php echo base_url()?>/images/fotouser.png"> </img>

                                                               <?php }?>
                                                            <?php }?>
                                                   </div>
                                                   <div class=" col-lg-11 col-md-10">
                                                      Miguel Ocampo
                                                   </div>
                                          </div>
                                       <!-- encabezado finalizado !-->
                                       <!-- contenido de la publicacion !-->
                                        
                                       <div class="row bg-white pt-2" >
                                             <div style="text-indent:18px;">
                                                <p >  </p>
                                             </div>
                                                 
                                       </div>
                                     <!-- contenido de la publicacion terminada-->
                                     <!-- seccion de herramientas de publicacion !-->
                                     <div class="row bg-white border" >
                                          <div class="col-lg-11 col-md-1">
                                             <div class="pt-1">
                                             <a href="">Ver comentarios</a>
                                             </div>
                                          </div>
                                          <div  class="col-lg-1 col-md-2 ">
                                             <div  class="pt-1 pb-1 pr-1">
                                             <a  href="">Like</a>
                                             </div>
                                          </div>
                                       </div>
                                    <!-- seccion de herramientas de publicacion finalizada-->


                                       <!-- seccion de publicaciones finalizada !-->

                        </div>
                        <div class="col-lg-1 col-md-2">

                         </div>
                      
            </div>
     </div> 

</body>

</html>