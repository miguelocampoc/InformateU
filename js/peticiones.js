(function($){
$("#frm-login").submit(function(ev){
ev.preventDefault();
$.ajax({
    url:'welcome/publicar',
    type:'post',
    data: $(this).serialize(),
    success: function(data){
        var json = JSON.parse(data);
         document.getElementById("error-publicacion").innerHTML = json.descripcion;
     

    },
    error: function(){
       
    },

});
});
})
(jQuery)
