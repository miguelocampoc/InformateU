function cambiar(id){
    var pdrs = document.getElementById('file-upload'+id).files[0].name;
    var allowedExtensions = /(.jpg|.jpeg|.png|.gif)$/i;
    if(!allowedExtensions.exec(pdrs)){
          document.getElementById('info'+id).innerHTML = "<p style='font-size:12px; color:red;'>Solo puede adjuntar archivos .jpg,jpeg,png o gif*</p>";
        
    }else{
        //Image preview
        document.getElementById('info'+id).innerHTML = pdrs;
    }

}

