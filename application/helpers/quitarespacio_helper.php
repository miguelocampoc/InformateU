<?php

function Quitar_EspaciosNombre($nombre)
{

    $array = explode(' ',$nombre);  // convierte en array separa por espacios;
    $salida ='';
    // quita los campos vacios y pone un solo espacio
    for ($i=0; $i < count($array); $i++) { 
        if(strlen($array[$i])>0) {
            $salida.= ' ' . $array[$i];
        }
    }
  return  trim($salida);
}
function Quitar_EspaciosApellido($apellidos)
{

    $array = explode(' ',$apellidos);  // convierte en array separa por espacios;
    $salida ='';
    // quita los campos vacios y pone un solo espacio
    for ($i=0; $i < count($array); $i++) { 
        if(strlen($array[$i])>0) {
            $salida.= ' ' . $array[$i];
        }
    }
  return  trim($salida);
}

function Quitar_EspaciosTitulo($titulo)
{

    $array = explode(' ',$titulo);  // convierte en array separa por espacios;
    $salida ='';
    // quita los campos vacios y pone un solo espacio
    for ($i=0; $i < count($array); $i++) { 
        if(strlen($array[$i])>0) {
            $salida.= ' ' . $array[$i];
        }
    }
  return  trim($salida);
}
function Quitar_Espaciosdescripcion($descripcion)
{

    $array = explode(' ',$descripcion);  // convierte en array separa por espacios;
    $salida ='';
    // quita los campos vacios y pone un solo espacio
    for ($i=0; $i < count($array); $i++) { 
        if(strlen($array[$i])>0) {
            $salida.= ' ' . $array[$i];
        }
    }
  return  trim($salida);
}
function Quitar_EspaciosArchivo($archivo)
{

    $array = explode(' ',$archivo);  // convierte en array separa por espacios;
    $salida ='';
    // quita los campos vacios y pone un solo espacio
    for ($i=0; $i < count($array); $i++) { 
        if(strlen($array[$i])>0) {
            $salida.= ' ' . $array[$i];
        }
    }
  return  trim($salida);
}

?>