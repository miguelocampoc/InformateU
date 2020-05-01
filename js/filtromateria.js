$(obtener_registros());
function obtener_registros(materias){
    $.ajax({
     url: 'user/registroMateria',
     type:'post',
     dataType:'html',
     data : { materias:materias}
    })
    .done(function(resultado){
        $("#tabla_resultado").html(resultado);
    })

}
$(document).on('keyup','#busqueda',function(){
    var valorBusqueda=$(this).val();
    if(valorBusqueda!=""){
        obtener_registros(valorBusqueda);

    }
    else{
        obtener_registros();
    }
});