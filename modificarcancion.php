<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Funcion Modificar -->
		
	<script type="text/javascript">
	$(document).ready(function (){
		var token = sessionStorage.getItem('token');
		var id = sessionStorage.getItem('id');
		$(".update").on("click", function(e){
			var title = $(".title").val();
			var artist = $(".artist").val();
			var url = $(".url").val();
			e.preventDefault();
			$.ajax({
				headers: {
			         'Authorization' : sessionStorage.getItem('token')
			        },
				url: 'http://localhost:8888/alexMiglioreAPIFinal/public/index.php/songs/update.json',
				dataType: 'json',
				type: 'POST',
				data: {
					'id': id,
					'title': title,
					'artist': artist,
					'url': url
				},
				success: function(data){
					alert("Cancion modificada correctamente");
					window.location.href = "canciones.php";
				}
			});
		});
	});
	</script>


		<!-- Boobtrap-->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>





	<title>Modificar Cancion</title>
</head>
<body>

 	
 	<h1 style="text-align: center;">Modificar Cancion</h1>

  <div class="input-group center-block" style=" width: 250px" >

  		<!-- Input Username -->
        <input type="text"  class="form-control mb-2 title" id="inlineFormInputGroup" placeholder="Titulo">
       
        <!-- Input artista -->
       <input type="text" style=" margin-top: 3px" class="form-control mb-2 artist" id="inlineFormInputGroup" placeholder="Artista">

        <!-- Input url -->
       <input type="text" style=" margin-top: 3px" class="form-control mb-2 url" id="inlineFormInputGroup" placeholder="URL">



   

       <button style="margin-top: 3px; margin-left: 80px"   type="submit" class="btn btn-primary mb-2 update">Modificar</button>

   </div>



</body>
</html>