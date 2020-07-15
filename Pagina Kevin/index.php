<!DOCTYPE html>
<html lang="es-MX">
<head>
	<title>BLOG UNID</title>
	<meta charset="utf-8">
	<!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
>
<?php 
session_start();
error_reporting(0);
 ?>
</head>
<body class="bg-secondary">

<h5>Bienvenido <?php print_r($_SESSION['nombre']); ?></h5>

<?php 


require_once 'conexion.php';

?>


<div class="container mt-5">
			<nav class="nav nav-pills nav-fill">
			
			<a href="compra/carrito.php" class="btn btn-warning mb-5 nav-item nav-link" >Carrito</a>
			<a href ="compra/cerrarsesion.php" class="btn btn-primary  mb-5 nav-item nav-link">Salir sesion</a>
		</nav>
	<div class="row">
<center>
		<div id="carouselExampleCaptions" class="carousel slide mb-5" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
        <img src="imagen/imagen1.jpg" class="d-block" style="width: 65rem; height: 30rem; margin-left: 3rem;  alt="...">
        <div class="carousel-caption d-none d-md-block">
        <h5>BIENVENIDO A MI TIENDA VIRTUAL</h5>
        <p>Esta es la tiendita de kevin disfrute de su estancia</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="imagen/imagen2.jpg" class="d-block" style="width: 65rem; height: 30rem; margin-left: 3rem;  alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 class="text-dark">Encontraras diversos productos en el lugar</h5>
        <p class="text-dark">Especialmente ropa</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="imagen/imagen3.jpg" class="d-block" style="width: 65rem; height: 30rem; margin-left: 3rem;  alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 >Contamos con carrito de compras</h5>
        <p>no podras comprar si no tienes cuenta registrada</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</center>

		<div class="col-sm-12">
	<div class="table-responsive">
		<table class="table table-stripped table-dark table-hover table-dark">
			<thead class="thead-dark">
				<tr> 

				</tr>
			</thead>
			<tbody>

				<?php

				$Consulta ="SELECT * FROM productos  INNER JOIN categorias ON Categoria_FK = ID_Cat
				INNER JOIN colores ON Color_FK = ID_Color";
				$Resultado = mysqli_query($mysqli, $Consulta);
				while($Fila= mysqli_fetch_array($Resultado)){
				
				?>

				<tr>
					<div class="row no-gutters bg-light position-relative">
  <div class="col-md-4 mb-md-0 p-md-4">
   <img src="<?php echo $Fila ['Imagen_Pro']; ?>" class="" alt="...">
  </div>
  <div class="col-md-6 position-static p-4 pl-md-0">
    <h5 class="mt-0"><?php echo $Fila ["Nombre_Pro"]; ?> </h5>
    <p> <?php echo $Fila ["Descrip_Pro"]; ?> </p>
    <a href="/Pagina%20Kevin/compra/compras.php?id=<?php echo $Fila["ID_Pro"]; ?> " class="btn btn-primary" >Comprar</a>
  </div>
</div>
</div>


					
				</tr>


			<?php }?>
			</tbody>
		</table>

	</div>
	</div>
</div>
	</div>


</body>
<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" ></script>
</html>