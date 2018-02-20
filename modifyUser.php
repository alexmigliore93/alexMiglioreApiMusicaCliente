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
			var username = $(".username").val();
			var password = $(".password").val();
			e.preventDefault();
			$.ajax({
				headers: {
			         'Authorization' : sessionStorage.getItem('token')
			        },
				url: 'http://81.169.234.32/alexander/alexMiglioreAPIFinal/public/index.php/users/modifyUserAdmin.json',
				 // http://81.169.234.32/alexander/alexMiglioreAPIFinal/public/index.php/users/modifyUserAdmin.json
				 // http://localhost:8888/alexMiglioreAPIFinal/public/index.php/users/modifyUserAdmin.json
				dataType: 'json',
				type: 'POST',
				data: {
					'token': token,
					'id': id,
					'username': username,
					'password': password
				},
				success: function(data){
					alert("Usuario modificado correctamente");
					window.location.href = "home.php";
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





	<title>Modificar User</title>
</head>
<body>

 	
 	<h1 style="text-align: center;">Modificar Usuarios</h1>

  <div class="input-group center-block" style=" width: 250px" >

  		<!-- Input Username -->
       <input type="text"  class="form-control mb-2 username" id="inlineFormInputGroup" placeholder="New Username">
       
        <!-- Input Password -->
       <input type="text" style=" margin-top: 3px" class="form-control mb-2 password" id="inlineFormInputGroup" placeholder="New Password">


   

       <button style="margin-top: 3px; margin-left: 80px"   type="submit" class="btn btn-primary mb-2 update">Modificar</button>

   </div>



</body>
</html>