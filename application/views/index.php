
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
</style>
<body>
     <?php $this->load->view('navbars/navbaruser');?>
       <br><br><br>
    <div class="container">
                 <div class="row" style="margin-top:5px;">
                 <div class="col-md-2">
                 </div>
                 <div class="col-md-8">
                     <div  class="row border-bottom " >
                       <div  class="col-md-12 border" style="background-color:#D4F2E1">
                         <p style="font-size:12px; margin:5px; text-indent:5px"> <strong> Crear publicacion </strong></p>
                        </div>  
                     </div>
                         <div class="row border-right border-left border-bottom  shadow p-3 mb-5 bg-white rounded">
                                <div class="col-md-2" style="background-color:white"><br>
                                <div class="row justify-content-center"> 
                                        <?php foreach($usuarios->result() as $row){?>
                                            <?php if($row->foto<>"NULL"){?>
                                                <img id="img-profile-home" src="<?php echo base_url()?>/images/<?php  echo $row->foto?>"> </img>
                                                <?php }else{?>
                                                <img id="img-profile-home" src="<?php echo base_url()?>/images/fotouser.png"> </img>

                                            <?php }?>                 
                                            <?php } ?>
                                    </div>
                                    </div>
                                <div class="col-md-10 " style="background-color:white">
                                    <br>
                                    <textarea class="form-control mb-2" rows="2"> </textarea>
                                    <button type="submit" style="float:right" class="btn btn-primary mb-2 btn-sm "> Publicar</button>

                                </div>
                           </div>
                 </div>
                 <div class="col-md-2">
                 </div>
                </div>
         </div>


     </div> 

    
</body>

</html>