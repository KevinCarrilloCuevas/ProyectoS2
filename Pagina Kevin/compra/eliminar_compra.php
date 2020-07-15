<?php 
 require_once 'conexion.php';
 $id=$_GET["id"];
 $Consulta2= "UPDATE productos SET Stock_Pro = Stock_Pro +  Canti_Pro WHERE ID_Pro = $id ";
 mysqli_query($mysqli, $Consulta2);
 $Consulta ="DELETE FROM compras WHERE ID_Com='$id'";
 mysqli_query($mysqli, $Consulta);
 header("Location:carrito.php")
 ?>