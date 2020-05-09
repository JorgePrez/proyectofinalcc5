function validar(){
           

         var todo_correcto = true;


         var usuariotrue = document.getElementById("usuariotrue");
         var usuariotrueS = usuariotrue.value;
         var contraseniatrue = document.getElementById("contraseniatrue");
         var contraseniatrueS = contraseniatrue.value;
   
         var usuario = document.getElementById("usuario");
         var usuarioS = usuario.value;

         var contrasenia = document.getElementById("contrasenia");
         var contraseniaS = contrasenia.value;


    
        
        if(usuarioS != usuariotrueS ){
            todo_correcto = false;
        }
        

        if(contraseniaS != contraseniatrueS ){
            todo_correcto = false;
        }
        
        if(!todo_correcto){
        alert('Porfavor ingrese el nombre de administrador y su respectiva contraseña ');
        }
        
        return todo_correcto;
    



    } 
  