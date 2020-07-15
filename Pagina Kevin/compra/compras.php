<!DOCTYPE html>
<html lang="es-MX">
<head>
  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detalles de compra</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>

<body>
  <?php 
session_start();
error_reporting(0);
$varsesion = $_SESSION['nombre'];

if($varsesion == null || $varsesion = ''){
  header("Location:/Pagina%20Kevin/login/login.php"); 
  die();
}
print_r($_SESSION['nombre']);
?>

  <?php 
  require_once 'conexion.php'; 
  ?>
  <div class="conteiner">
  <div class="table-responsive">
    <table class="table table-stripped">
    <thead>
      <tr>

        
        <th><a href="/Pagina%20Kevin" class="btn btn-primary mb-5">Regresa a la pagina principal</a></th>
        <th><a href ="cerrarsesion.php" class="btn btn-primary float-right mb-5">Salir sesion</a></th>
        

      </tr>
    </thead>

    <tbody>

    

      <?php

      $id = $_GET['id'];
      $Consulta = "SELECT * FROM productos
       WHERE ID_Pro = $id";
      $Resultado = mysqli_query($mysqli, $Consulta);
      $Fila = mysqli_fetch_array($Resultado);
      ?>

    </tbody>
    </table>
    <form action="editar_tienda.php" method="POST">
    <center>
    <div class="card" style="width: 20rem; ">
  <img src="<?php echo $Fila ['Imagen_Pro']; ?>" class="" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $Fila["Nombre_Pro"]; ?></h5>
    <p class="card-text"><?php echo $Fila["Descrip_Pro"]; ?></p>
  </div>

    <div class="form-group ">
                    <label for="ColorPro">COLOR</label>
                    <select  id="Color" name="Color" class="form-control">
                    	<option selected>Elije</option>
                    	<option value="1">Negro</option>
                    	<option value="3">Blanco</option>
                    	<option value="4">Rojo</option>
                    	<option value="5">Azul</option>
                    	<option value="6">Gris</option>

                    </select>
    </div>
    <div class="form-grup">
					<label for="Stock_Pro">Stock <?php echo $Fila["Stock_Pro"] ?></label>
					<input type="text" name="Stock_Pro" id="Stock_Pro" placeholder="Ingresa la cantidad" class="form-control">
				</div>
				<input type="hidden" name="id" id="id" placeholder="id" class="form-control" value="<?php echo $Fila ['ID_Pro'];?>">
				<br>
				<br>
				<div class="form-grup">
					<input type="submit" value="Comprar" class="btn btn-success">
				</div>
				<br>
				<br>
			</div>
			</center>
			</form>
  </div>
  </div>

  <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>