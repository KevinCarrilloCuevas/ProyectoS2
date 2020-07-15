<!DOCTYPE html>
<html lang="es-MX">
<head>
	<title>BLOG</title>
	<meta charset="utf-8">
	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"

<?php 

require_once 'conexion.php';


?>

</head>

<body class="d-block p-2 bg-info text-white">
	<?php  
if (isset($_GET['data'])){ 
?>
<p><?php echo $_GET['data']; ?></p>

<?php 
}
?>

<div class="container mt-5">
	<div class="row">
		<div class="col-sm-5">

			<form action="Acciones.php" method="POST">
				<div class="form-grup">
					<label for="Nombre_User">Correo</label>
					<input type="text" name="Correo" id="Correo" placeholder="Ingresa el Correo" class="form-control">
				</div>
				<div class="form-grup">
					<label for="Password_User">Contraseña</label>
					<input type="text" name="Password" id="Password" placeholder="Ingresa la contraseña" class="form-control">
				</div>

				<br>
				<div class="form-grup">
					<input type="submit" value="Ingresar" class="btn btn-success">
				</div>
			</form>
		</div>
	</div>
</div>



</body>
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
</html>