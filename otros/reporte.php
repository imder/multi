<?php
include("conexion.php");
//Recibir los datos y almacenarlos en variables
$query6 = "SELECT * FROM relevamientos,cableado_estructurado WHERE relevamientos.idRelev=cableado_estructurado.relev_idRelev"; 
$resultado6=mysqli_query($conexion,$query6)or die(mysqli_error());
$row = mysqli_fetch_array($resultado6); 
$ultimo_id = $row[0];
print_r($row);

?>