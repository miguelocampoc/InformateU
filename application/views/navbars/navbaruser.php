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
                             <?php foreach($usuarios->result() as $row){?>
                                        
                                 <a href="#"><img id="img-navbar" src="<?php echo base_url()?>/images/<?php echo $row->foto?>"></img> <?php echo $row->nombre?> <?php echo $row->apellidos ?> <i class="fas fa-chevron-down"></i></a>
                             <?php } ?>
                                 <ul id="hidden" class="children">
                                 <li id="hidden-li">
                                    <a href="<?php  echo base_url()?>index.php/welcome"> <i class="fas fa-home"></i> Home</a>
                     
                                   </li>  
                                   <!---
                                   <li id="hidden-li">
                                    <a href="<?php  echo base_url()?>index.php/user/makequestion"> <i class="fas fa-home"></i> Realizar pregunta</a>
                     
                                   </li>                                                  
                                     !-->
                                     <li> <a href="<?php  echo base_url()?>index.php/user/profile"><i class="fas fa-user-circle"></i> Mi cuenta</a></li>

                                     <li><a href="<?php  ECHO base_url()?>index.php/welcome/logout"> <i class="fas fa-power-off"></i> Cerrar sesion</a></li>
                                 </ul>
                             </li>
                             
                            
                             

                                  
                         </ul>
                     

             </nav>
   
    
               
 </header>