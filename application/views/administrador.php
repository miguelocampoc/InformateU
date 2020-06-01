<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">  
     <?php $this->load->view('libraries/libraries')?>
    <link rel="stylesheet" href="<?php echo base_url()?>/css/stylenav.css">
    <link rel="stylesheet" href="<?php echo base_url()?>/css/estilos.css">
    <link rel="shortcut icon" href="<?php echo base_url("/images/migsed-favicon.jpeg")?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="<?php echo base_url()?>/js/main.js"> </script>

    <title>Document</title>
</head>
<body>

     <div class="container-fluid">
     <div class="row row  justify-content-center align-items-center minh-100">
     <div class="col-md-8">
     <p>Administrar Usuarios</p>
     <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Correo</th>
      <th scope="col">Privilegios</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
  
  </tbody>
</table>
    </div>
    </div>
    </div>
</body>
</html>