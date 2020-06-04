
    $(document).ready(function(){
        mostrarUsuarios();
      });

function mostrarUsuarios(){
    $(document).ready(function(){
        $.ajax({
            url: 'welcome/mostrarUsuarios',
            type: 'GET',
            success:function(response) {
               
                const tasks = JSON.parse(response);
                let template = '';
                tasks.forEach(task => {
                  template += `
                  <tr>
                  <td>${task.iduser}</td>
                  <td> ${task.nombre}</td>
                  <td> ${task.apellidos}</td>
                  <td> ${task.email}</td>
                  <td><div class="form-group">
                <select id="privilegio${task.iduser}" onchange="ShowSelected('${task.iduser}')" class="form-control" id="exampleFormControlSelect1">
                  <option style="color:red">  ${task.tipo}</option>
                  <option value="administrador" name="btn-modal"> Administrador</option>
                  <option value="Normal" >Normal</option>
                
                </select>
              </div></td>
                  <td><div class="form-group">
                <select id="opciones${task.iduser}" onchange="ShowSelected2('${task.iduser}')" class="form-control" id="exampleFormControlSelect1">
                  <option >---</option>
                  <option value="eliminar" id="btn-modal3">Eliminar</option>
                  
                </select>
              </div></td>
            
                </tr>
                        `
                });
                $('#tasks').html(template);
                
              },
            error: function(){
            alert(id)

            },
        });
        
    });

}

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
  
   function ShowSelected(id){
    $(document).ready(function(){
      var privilegio="";
      privilegio = document.getElementById("privilegio"+id).value;
      var parametros = {"id":id, "privilegio":privilegio};

        if(privilegio="administrador"){
          $.ajax({
            data:parametros,
            url:'welcome/privilegio',
            type: 'post',
            success: function(data){
             
        
            },
            error: function(){
            alert(id)

            },
        });
      mostrarUsuarios();
        }
        else if(privilegio="Normal"){
          $.ajax({
            data:parametros,
            url:'welcome/privilegio',
            type: 'post',
            success: function(data){
             
        
            },
            error: function(){
            alert(id)

            },
        });
          
        }
     });

   }
   function ShowSelected2(id){
    $(document).ready(function(){
      var parametros = {"id":id};
      opciones = document.getElementById("opciones"+id).value;
      var opcion = confirm("¿Estas seguro de eliminar este usuario?");
      if (opcion == true) {
        if(opciones="eliminar"){
          $.ajax({
            data:parametros,
            url:'welcome/deleteUser',
            type: 'post',
            success: function(data){
        
            },
            error: function(){
            alert(id)
  
            },
        });
        }    
      } 
      else 
      {
        mensaje = "Has clickado Cancelar";
    }
      
    });
   mostrarUsuarios();
   }
  
    
   
   function searchuser(search){
    $(document).ready(function(){
        var parametros = {"search":search};
              $.ajax({
                data:parametros,
                url:'welcome/searchUser',
                type: 'post',
                success: function(response){
                  var tasks = JSON.parse(response);
                  console.log(response);
                  let template = '';
                  tasks.forEach(task => {
                    template += `
                    <tr>
                  <td>${task.iduser}</td>
                  <td> ${task.nombre}</td>
                  <td> ${task.apellidos}</td>
                  <td> ${task.email}</td>
                  <td><div class="form-group">
                <select id="privilegio${task.iduser}" onchange="ShowSelected('${task.iduser}')" class="form-control" id="exampleFormControlSelect1">
                  <option style="color:red">  ${task.tipo}</option>
                  <option value="administrador" name="btn-modal"> Administrador</option>
                  <option value="Normal" >Normal</option>
                
                </select>
              </div></td>
                  <td><div class="form-group">
                <select id="opciones${task.iduser}" onchange="ShowSelected2('${task.iduser}')" class="form-control" id="exampleFormControlSelect1">
                  <option >---</option>
                  <option value="eliminar" id="btn-modal3">Eliminar</option>
                  
                </select>
              </div></td>
            
                </tr>
                          ` 
                  });
                  $('.tasks').html(template);

                },
                error: function(){
                alert('Ha ocurrido un error')

                },
            });

    });

    }


   $(document).ready(function(){
    $('#search').keyup(function() {
      var search = $('#search').val();
       if(search!=""){
        searchuser(search);
       }
       else{
         mostrarUsuarios();

       }
       
    });

  });
 
  
