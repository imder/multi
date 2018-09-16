<?php
session_start();
include("conexion.php");
//Recibir los datos y almacenarlos en variables
$fb_cantPun = $_POST["fb_cantPun"];
$fb_tipo = $_POST["fb_tipo"];
$fb_instGab = $_POST["fb_instGab"];
$fb_certifi = $_POST["fb_certifi"];


$fb_sql = "SELECT MAX(idRelev) FROM relevamientos"; 
$fb_result=mysqli_query($conexion,$fb_sql)or die(mysqli_error());
$fb_row = mysqli_fetch_row($fb_result); 
$fb_ultimo = $fb_row[0];
//print_r($ultimo_id); //sirve

//consulta para insertar
$fb_insert = "INSERT INTO  fibra_optica (cant_puntos, tipo, inst_gabinete, certificacion, relev_idRelev) VALUES ('$fb_cantPun', '$fb_tipo', '$fb_instGab', '$fb_certifi', '$fb_ultimo')";
//Ejecutar consulta
$fb_result2 = mysqli_query($conexion,$fb_insert);

if (!$fb_result2){
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