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
?>
 <h5 class="text-success" >Carrito de <?php print_r($_SESSION['nombre']);
?></h5>

  <?php 
  require_once 'conexion.php'; 
  ?>
  <div class="container mt-5">
  <div class="row">
  <div class="table-responsive">
    <table class="table table-stripped">

    <thead>
      <tr>

        
        <th><a href="/Pagina%20Kevin" class="btn btn-primary mb-5">Regresa a la pagina principal</a></th>

        

      </tr>
    </thead>
    
    <tbody>

    

      <?php

      $Consulta ="SELECT * FROM compras 
        INNER JOIN colores ON Color_Com = ID_Color";
        $Resultado = mysqli_query($mysqli, $Consulta);
        while($Fila= mysqli_fetch_array($Resultado)){
      ?>
      <tr>

  <div class="">
          <div class="row no-gutters bg-light position-relative">
  <div class="col-md-4 mb-md-0 p-md-4">
   <img src="<?php echo $Fila ['Imagen']; ?>" class="" alt="...">
  </div>
  <div class="col-md-6 position-static p-4 pl-md-0">
    <center>
    <h5 class="mt-0">Producto: <?php echo $Fila ["Product"]; ?> </h5>
    <h5>Cantidad: <?php echo $Fila ["Stock"]; ?></h5>
    <h5>Color: <?php echo $Fila["Nombre_Col"] ?></h5>
    <a href="/Pagina%20Kevin/compra/eliminar_compra.php?id=<?php echo $Fila["ID_Com"]; ?> " class="btn btn-primary" >Eliminar</a>
    </center>
    

  </div>
  </div>
</div>

          
        </tr>

    </tbody>
  <?php } ?>
  
    </table>
    
  </div>
  </div>
</div>
</div>

  <!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>