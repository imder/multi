<?php
session_start();
include("conexion.php");
//Recibir los datos y almacenarlos en variables
$categoria = $_POST["categoria"];
$marca = $_POST["marca"];
$cant_puntos = $_POST["cant_puntos"];
$ent_facilidades = $_POST["ent_facilidades"];
$inst_gabinete = $_POST["inst_gabinete"];
$certificacion = $_POST["certificacion"];

$query5 = "SELECT MAX(idRelev) FROM relevamientos"; 
$resultado5=mysqli_query($conexion,$query5)or die(mysqli_error());
$row = mysqli_fetch_row($resultado5); 
$ultimo_id = $row[0];
//print_r($ultimo_id); //sirve

//consulta para insertar
$insert1 = "INSERT INTO cableado_estructurado (categoria, marca, cant_puntos, ent_facilidades, inst_gabinete, certificacion, relev_idRelev) VALUES ('$categoria', '$marca', '$cant_puntos', '$ent_facilidades', '$inst_gabinete','$certificacion','$ultimo_id')";
//Ejecutar consulta
$result1 = mysqli_query($conexion,$insert1);

if (!$result1){
    echo 'Error al registrarse';
}
 else {
    //printf ("Nuevo registro con el id %d.\n", mysqli_insert_id($conexion)); //sirve
    echo '<script>alert("El relevamiento se registro exitosamente");</script>';
    echo "<head><meta http-equiv='refresh' content='0; url=../misRelevamientos.php'></head>";
}



//Cerrar conexion
mysqli_close($conexion);

?>