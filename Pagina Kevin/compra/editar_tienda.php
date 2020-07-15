
<?php 
session_start();
//conectarse a la base de datos
require_once 'conexion.php';

//recibir los datos del formulario
$Stock_Pro = $_POST['Stock_Pro'];
$Color= $_POST['Color'];
$id=$_POST['id'];

$Consulta2= "UPDATE productos SET Stock_Pro = Stock_Pro - '$Stock_Pro', Color_FK='$Color', 
Canti_Pro='$Stock_Pro'   WHERE ID_Pro = $id ";
mysqli_query ($mysqli, $Consulta2);
//construir la consult;
$Consulta = "INSERT INTO compras (Mensaje_Com) 
VALUES  ('Se ha registrado una nueva compra por: ' ".$_SESSION['nombre'].") ";
//Ejecutara la consulta
mysqli_query ($mysqli, $Consulta);




//$Consulta2= "UPDATE productos INNER JOIN 
//SET productos.Stock_Pro = productos.Stock_Pro - productos.Canti_Pro WHERE ID_Pro =$id";
  //  mysqli_query($mysqli, $Consulta2);
//Regresar al index
header("Location:/Pagina%20Kevin")

?>