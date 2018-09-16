<?php
session_start();
include("conexion.php");
//Recibir los datos y almacenarlos en variables
$i_cantLumi = $_POST["i_cantLumi"];
$i_cantInte = $_POST["i_cantInte"];



$i_sql = "SELECT MAX(idRelev) FROM relevamientos"; 
$i_result=mysqli_query($conexion,$i_sql)or die(mysqli_error());
$i_row = mysqli_fetch_row($i_result); 
$i_ultimo = $i_row[0];
//print_r($ultimo_id); //sirve

//consulta para insertar
$i_insert = "INSERT INTO  iluminacion (cant_luminarias, cant_lnterruptores, relev_idRelev) VALUES ('$i_cantLumi', '$i_cantInte', '$i_ultimo')";
//Ejecutar consulta
$i_result2 = mysqli_query($conexion,$i_insert);

if (!$i_result2){
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