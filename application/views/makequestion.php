<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $this->load->view('libraries/libraries')?>

    <title>Document</title>
</head>
<body>
<?php if (isset($_SESSION['message25'])) { ?>  
<div class="alert alert-success alert-dismissible fade show col-md-12" role="alert" style="padding-bottom:0%">
<p style="font-size:small"><?php echo $_SESSION['message25']; ?></p>
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
 <span aria-hidden="true">&times;</span>
</button>
</div>
<?php session_unset(); } ?>
<form method="POST">
<div id="messages-error"><?php  echo  form_error ( 'titulo' );  ?></div>
<p>titulo</p>
<input type="text" name="titulo"> </input>
<div id="messages-error"><?php  echo  form_error ( 'descripcion' );  ?></div>

<p>descripcion</p>
<input type="text" name="descripcion"> </input><br><br>
 <div class="form-group">
     <input type="text" name="busqueda" id="busqueda" placeholder="buscar"></input><br><br>
    <select name="resultado" name="resultado" id="resultado " multiple class="form-control" >
    <!--
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option>5</option>
    </select>
    !-->
  </div><br>
<button type="submit" name="publicar"> Publicar</button>
</form>
<script src="<?php echo base_url()?>/js/filtromateria.js"></script>
</body>
</html>