<?php
foreach ($usuarios as $usuario) {
	?>
                                          <!-- encabezado !-->
                                          <div class="row bg-white pt-1" >
                                                   <div class=" col-lg-1 col-md-2">
                                                                           <?php if($row->foto<>"NULL"){?>
                                                                                    <img id="img-profile-publication" src="<?php echo base_url()?>/images/<?php  echo $row->foto?>"> </img>
                                                                                    <?php }else{?>
                                                                                    <img id="img-profile-publication" src="<?php echo base_url()?>/images/fotouser.png"> </img>

                                                                              <?php }?> 
                                                   </div>
                                                   <div class=" col-lg-11 col-md-10">
                                                   <?php  echo $row->nombre;?> <?php echo $row->apellidos?>
                                                   </div>
                                          </div>
                                       <!-- encabezado finalizado !-->
                                       <!-- contenido de la publicacion !-->
                                        
                                       <div class="row bg-white pt-2" >
                                             <div style="text-indent:18px;">
                                                <p>   <?php  echo $row->descripcion?> </p>
                                             </div>
                                       </div>
                                       <?php if($row->archivo!="NULL"){?>
                                       <div class="row bg-white pt-3 pl-3 border pb-3 pr-3 justify-content-center"  >

                                                 <img   src="<?php echo base_url()?>/images/<?php echo $row->archivo?>"  class="img-fluid" alt="Responsive image"> </img>
                                       </div>
                                       <?php }?>
                                  
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
	<?php
} 
?>