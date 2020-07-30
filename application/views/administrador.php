<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">  
     <?php $this->load->view('libraries/libraries')?>
    <link rel="stylesheet" href="<?php echo base_url()?>/css/stylenav.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/css/estilos.css">
    <link rel="shortcut icon" href="<?php echo base_url("/images/migsedfa.png")?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url()?>/js/main.js"> </script>
    <script src="<?php echo base_url()?>/js/interaciones.js"> </script>

    <title>Administrador</title>
</head>
<style>

</style>
<br><br><br><br>
<body>

     <div class="container-fluid">
     <div class="row row  justify-content-center">
     <div class="col-md-8">
     <p>Administrar Usuarios</p>
     <input type="search"  id="search" class="form-control mr-sm-2"  placeholder="Search" aria-label="Search" > </input>
     <div class="pb-3"> </div>

     <table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Correo</th>
      <th scope="col">Privilegios</th>
      <th scope="col">Opciones</th>

    </tr>
  </thead>

  <tbody id="tasks" class="tasks">
  
  
  </tbody>
  <tbody id="searchUser" class="searchUser">
  
  
  </tbody>

<!---
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td><div class="form-group">
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Administrador</option>
      <option>Normal</option>
    
    </select>
  </div></td>
      <td><div class="form-group">
    <select class="form-control" id="exampleFormControlSelect1">
      <option>Eliminar</option>
      <option>Bloquear</option>
      
    </select>
  </div></td>

    </tr>
  
  </tbody>
  !-->
</table>
    </div>
    </div>
    </div>
  

<!-- Modal -->


</body>
</html>