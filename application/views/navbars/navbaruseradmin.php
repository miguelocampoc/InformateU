<header >
             

             <div class="menu_bar">
                     <a href="#" class="bt-menu"><i class="fas fa-bars"></i> Menu</a>
             </div>

             <nav>
         
                 
                         <ul>

                             <li>

                                 <a href="<?php  echo base_url()?>index.php/welcome"><img id="img-navbar" src="<?php  echo base_url()?>/images/migsed-favicon.jpeg"></i> MIGSED </a>
                 
                             </li>
                             
             
                             
                                                                            
                             <li  id="posicion" class="submenu">
                             <?php foreach($usuarios->result() as $row){?>
                                <?php if($row->foto<>"NULL"){?>
                                  <a>  <img id="img-navbar" src="<?php  echo base_url()?>/images/<?php  echo $row->foto ?>"></img> <?php echo $row->nombre ?> <?php echo $row->apellidos ?> </a>
                                                <?php }else{?>
                                                    <a>  <img id="img-navbar" src="<?php  echo base_url()?>/images/fotouser.svg"></img> <?php echo $row->nombre ?> <?php echo $row->apellidos ?> </a>

                                            <?php }?>
                             <?php } ?>
                                 <ul id="hidden" class="children">
                                 <li id="hidden-li">
                                    <a href="<?php  echo base_url()?>index.php/welcome"> Home</a>
                     
                                   </li>  
                                   <li> <a href="<?php  echo base_url()?>index.php/administrador"> Administrador</a></li>

                                   
                                     <li> <a href="<?php  echo base_url()?>index.php/user/profile"> Mi cuenta</a></li>

                                     <li><a href="<?php  ECHO base_url()?>index.php/welcome/logout"> Cerrar sesion</a></li>
                                 </ul>
                             </li>
                             
                            
                             

                                  
                         </ul>
                     

             </nav>
   
    
               
 </header>