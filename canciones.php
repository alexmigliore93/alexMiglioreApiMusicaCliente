<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Funcion Crear Canción -->
		
	 <script type="text/javascript">
		  $(document).ready(function (){
		    $(".crear").on("click", function(e){

		      e.preventDefault();
		      var title = $(".title").val();
		      var url = $(".url").val();
		      var artist = $(".artist").val();
		      $.ajax({
		      	headers: {
		          'Authorization' : sessionStorage.getItem('token')
		         },
		        url: 'http://81.169.234.32/alexander/alexMiglioreAPIFinal/public/index.php/songs/create.json',
            // http://81.169.234.32/alexander/alexMiglioreAPIFinal/public/index.php/songs/create.json
		        dataType: 'json',
		        type: 'POST',
		        data: {
		          'title': title,
		          'artist': artist,
		          'url': url,
		        },
		        success:function(data){
		          if (data.code == '200') 
		           {
		            alert("Cancion añadida correctamente");
		             location.reload();
		           }
		          if (data.code == '400') 
		          {
		            alert(data.message);
		          }
        }
      });
    });
  });
  </script>

      <!-- Funcion Eliminar Canción -->


   <script type="text/javascript">
    function borrar(id_item){
      $(document).ready(function (){
        $.ajax({
          headers: {
          'Authorization' : sessionStorage.getItem('token')
         },
          url: 'http://81.169.234.32/alexander/alexMiglioreAPIFinal/public/index.php/songs/delete.json',
          // http://81.169.234.32/alexander/alexMiglioreAPIFinal/public/index.php/songs/delete.json
          // http://localhost:8888/alexMiglioreAPIFinal/public/index.php/songs/delete.json
          dataType: 'json',
          type: 'POST',
          data: {
            'id': id_item

          },
          success: function(){
           alert("Cancion borrada correctamente");
           location.reload();
          }
        });
      });
    }
  </script>

  		<script type="text/javascript">
      function mostrarUpdate(datos){
        $.each(datos, function(i,item){
          $("#answer").append("<li class='list-group-item' style='margin-top: 5px'; >" + item.title + "<br><button class='btn  mb-2' style='background-color:rgb(27, 232, 142); margin-left:4px;margin-top:4px' type='button' onclick='javascript:cambia_de_pagina(" + item.id + ");'>Modificar</button>" 
            + 
            "<button class='btn  mb-2' style='background:rgb(232, 12, 77); margin-left:4px;margin-top:4px; color: white' type='button' onclick='borrar(" + item.id + ")'>Borrar</button></li>"

            );
            // sessionStorage.setItem('id') = item.id;


        });
      }    
    </script>

    <script type="text/javascript">
  $(document).ready(function (){
    $("#listaCancionesUpdate").on("click", function(e){
      e.preventDefault();
     // alert(sessionStorage.getItem('token'));
      $.ajax({
        headers: {
         'Authorization' : sessionStorage.getItem('token')
        },
        url: 'http://81.169.234.32/alexander/alexMiglioreAPIFinal/public/index.php/songs/songs.json',
      //    http://81.169.234.32/alexander/alexMiglioreAPIFinal/public/index.php/songs/songs.json
      //  http://localhost:8888/alexMiglioreAPIFinal/public/index.php/songs/songs.json
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
        // alert(id);
          location.href="http://81.169.234.32/alexander/alexMiglioreApiMusicaCliente/modificarcancion.php"
          // http://81.169.234.32/alexander/AlexMiglioreAPIMusicaCliente/modificarcancion.php
          // http://localhost:8888/AlexMiglioreAPIMusicaCliente/modificarcancion.php
      }
      </script>


		<!-- Boobtrap-->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>





	<title>Canciones</title>
</head>
<body>

 	
 	<h1 style="text-align: center;">Añadir Cancion</h1>

  <div class="input-group center-block" style=" width: 250px" >

  		<!-- Input titulo -->
       <input type="text"  class="form-control mb-2 title" id="inlineFormInputGroup" placeholder="Titulo">
       
        <!-- Input artista -->
       <input type="text" style=" margin-top: 3px" class="form-control mb-2 artist" id="inlineFormInputGroup" placeholder="Artista">

        <!-- Input url -->
       <input type="text" style=" margin-top: 3px" class="form-control mb-2 url" id="inlineFormInputGroup" placeholder="URL">
   
       <button style="margin-top: 3px; margin-left: 80px"   type="submit" class="btn btn-primary mb-2 crear">Añadir</button>

       <button  id='listaCancionesUpdate' style="margin-top: 3px" class="btn btn-ghost btn-primary btn-ghost-bordered center-block">Lista de Canciones</button>

   </div>

<div class="container" style="border-radius: 10px; width: 400px">
   <ul id="answer"  class="list-group" > 
   
      
    </ul>

</body>
</html>