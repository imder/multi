<?php
session_start();
include("conexion.php");
//Recibir los datos y almacenarlos en variables
$se_tipo = $_POST["se_tipo"];
$se_acometida = $_POST["se_acometida"];
$se_puesta = $_POST["se_puesta"];
$se_instTablero = $_POST["se_instTablero"];

print_r($se_tipo);
print_r($se_acometida);
print_r($se_puesta);
print_r($se_instTablero);

$se_sql = "SELECT MAX(idRelev) FROM relevamientos"; 
$se_result=mysqli_query($conexion,$se_sql)or die(mysqli_error());
$se_row = mysqli_fetch_row($se_result); 
$se_ultimo = $se_row[0];
//print_r($se_ultimo); //sirve

//consulta para insertar
$insert = "INSERT INTO  sistema_electrico (tipo, acometida, puesta_tierra, inst_tablero, relev_idRelev) VALUES ('$se_tipo', '$se_acometida', '$se_puesta', '$se_instTablero', '$se_ultimo')";
//Ejecutar consulta
$se_result2 = mysqli_query($conexion,$insert);
//print_r($se_result2);

if (!$se_result2){
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