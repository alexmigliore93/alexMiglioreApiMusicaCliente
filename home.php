<!doctype html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


  <title>Cliente Musica</title>

  

  </style>

  <!-- Funcion Registrar Usuarios -->

  <script type="text/javascript">
  $(document).ready(function (){
    $(".crear").on("click", function(e){
      e.preventDefault();
      var username = $(".username").val();
      var password = $(".password").val();
      var email = $(".email").val();
      var rol = $("#rol option:selected").val();
      //alert(rol)
      $.ajax({
        url: 'http://localhost:8888/alexMiglioreAPIFinal/public/index.php/users/create.json',
        dataType: 'json',
        type: 'POST',
        data: {
          'username': username,
          'password': password,
          'passwordRepeat': password,
          'email': email,
          'rol': rol,
        },
        success:function(data){
          if (data.code == '200') 
           {
            alert("Usuario registrado correctamente");
             location.reload();
           }
          if (data.code == '400') 
          {
            alert("Todos los campos son obligatorios");
          }
        }
      });
    });
  });
  </script>

      <!-- Funcion Eliminar Usuarios -->

<!-- Funcion Eliminar Usuarios -->
   <script type="text/javascript">
    function borrar(id_item){
      $(document).ready(function (){
        $.ajax({
          headers: {
          'Authorization' : sessionStorage.getItem('token')
         },
          url: 'http://localhost:8888/alexMiglioreAPIFinal/public/index.php/users/deleteUser.json',
          dataType: 'json',
          type: 'POST',
          data: {
            'id': id_item

          },
          success: function(){
           alert("Usuario borrado correctamente");
           location.reload();
          }
        });
      });
    }


  </script>

 
  </script>

  <script type="text/javascript">
      function mostrarUpdate(datos){
        $.each(datos, function(i,item){
          $("#answer").append("<li class='list-group-item' style='margin-top: 5px'; >" + item.username + "<br><button class='btn  mb-2' style='background-color:rgb(27, 232, 142); margin-left:4px;margin-top:4px' type='button' onclick='javascript:cambia_de_pagina(" + item.id + ");'>Modificar</button>" 
            + 
            "<button class='btn  mb-2' style='background:rgb(232, 12, 77); margin-left:4px;margin-top:4px; color: white' type='button' onclick='borrar(" + item.id + ")'>Borrar</button></li>"

            );
            // sessionStorage.setItem('id') = item.id;

        });
      }    
    </script>

<!-- Funcion Mostrar Usuarios -->
  <script type="text/javascript">
  $(document).ready(function (){
    $("#listaUsuariosUpdate").on("click", function(e){
      e.preventDefault();
     // alert(sessionStorage.getItem('token'));
      $.ajax({
        headers: {
         'Authorization' : sessionStorage.getItem('token')
        },
        url: 'http://localhost:8888/alexMiglioreAPIFinal/public/index.php/users/users.json',
        dataType: 'json',
        type: 'GET',
        data: {
          
        },
        success:function(data){

          mostrarUpdate(data.data);
      //    alert($users);
        }
      });
    });
  });
  </script>
      
   
     <script>
      function cambia_de_pagina(id){
          sessionStorage.setItem('id', id);
         // alert("Cambio de pagina");
          location.href="http://localhost:8888/AlexMiglioreAPIMusicaCliente/modifyUser.php"
      }
      </script>



    


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

   
  </head>
  <body>
  
    <h1 style="text-align: center">Cliente AppMusic</h1>
 
 <!-- Botones Usuarios y Esquemas -->
 
  <div class="text-center">
    <input type="button" class="btn btn-ghost btn-primary btn-ghost-bordered center-block" value="Usuarios" style="width:160px;">

  <a href="listas.php">  <input type="button" class="btn btn-ghost btn-ghost-bordered center-block" value="Listas" style="width:160px; margin-top: 8px"></a>

  <a href="canciones.php">  <input type="button" class="btn btn-ghost btn-ghost-bordered center-block" value="Canciones" style="width:160px; margin-top: 8px"></a>




    
    
      
      <div class="input-group center-block" style="width: 600px" >
          <!-- Input Rol -->

        <select  onchange="this.style.backgroundColor=this.options[this.selectedIndex].style.backgroundColor"
        style="margin-top: 15px; background: rgb(50, 145, 218); color: white" id="rol" class="rol input-group center-block"  >

            <option style="background-color:rgb(50, 145, 218)" value="1">Admin</option>
            <option style="background-color:rgb(255, 76, 76)"value="2">User</option>
            <option style="background-color:gold"value="3">Premium</option>
        </select>  
        
        <!-- <input step="1" type="number" min="1" max="3" class="form-control mb-2 rol" id="inlineFormInput" placeholder="Rol" style="width: 70px;margin-left: 5px"> -->
       
        <!-- Input Email -->
        <input type="text" style="margin-top: 5px"  class="form-control email ce" id="inlineFormInputGroup" placeholder="Email">
        
         <!-- Input Username -->
      
       <input type="text" style="margin-top: 5px"  class="form-control username" id="inlineFormInputGroup" placeholder="Username">
       
        <!-- Input Password -->
       <input type="text" style="margin-top: 5px" class="form-control password" id="inlineFormInputGroup" placeholder="Password">
       </div>
     

      
      <div class="input-group center-block" style="width: 600px; padding-top: 50px" >


       <button type="submit" style="margin-top: 4px" class="btn btn-primary mb-2 crear">Añadir</button>

       <button  id='listaUsuariosUpdate' style="margin-top: 3px" class="btn btn-ghost btn-primary btn-ghost-bordered center-block">Lista de Usuarios</button>

      </div>
      
    

   

   <div class="container" style="border-radius: 10px; width: 400px">
   <ul id="answer"  class="list-group" > 
   
      
    </ul>
   </div>

   
  
      <!-- correct -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
  </body>
</html>