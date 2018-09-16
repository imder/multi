<?php
session_start();
include("conexion.php");
//Recibir los datos y almacenarlos en variables
$cc_cantidad = $_POST["cc_cantidad"];
$cc_tipo = $_POST["cc_tipo"];



$cc_sql = "SELECT MAX(idRelev) FROM relevamientos"; 
$cc_result=mysqli_query($conexion,$cc_sql)or die(mysqli_error());
$cc_row = mysqli_fetch_row($cc_result); 
$cc_ultimo = $cc_row[0];
//print_r($ultimo_id); //sirve

//consulta para insertar
$cc_insert = "INSERT INTO  cctv (cant_puntos_cam_sen, tipo, relev_idRelev) VALUES ('$cc_cantidad', '$cc_tipo', '$cc_ultimo')";
//Ejecutar consulta
$cc_result2 = mysqli_query($conexion,$cc_insert);

if (!$cc_result2){
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