

function like(id,likes){
    $(document).ready(function(){
    var parametros = {"id":id};
    div = document.getElementById('like-up'+id);
    div.style.display = 'none';
    div2 = document.getElementById('showlike'+id);
    div2.style.display = 'block';
    

                $.ajax({
                    data:parametros,
                    url:'welcome/like',
                    type: 'post',
                    success: function(data){
                     
                
                    },
                    error: function(){
                    alert(id)

                    },
                });
     });

}
 function hidelike(id){
    $(document).ready(function(){
    var parametros = {"id":id};
    div2 = document.getElementById('showlike'+id);
    div2.style.display = 'none';
    div = document.getElementById('like-up'+id);
    div.style.display = 'block';
    
            $.ajax({
                data:parametros,
                url:'welcome/hidelike',
                type: 'post',
                success: function(data){
                
            
                },
                error: function(){
                alert(id)

                },
            });

    });
 
 
 }
 function mostrarcomentarios(id){
 $(document).ready(function(){
      $("#comentarios"+id).slideToggle();
  });
}
function editarcomentario(id){
    $(document).ready(function(){
        alert(id);
     });
   }



       



