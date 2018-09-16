<?php
include("conexion.php");



//Recibir los datos y almacenarlos en variables
$ambiente = $_POST["ambiente"];
$largo = $_POST["largo"];
$ancho = $_POST["ancho"];
$altura = $_POST["altura"];
$puntos_red = $_POST["p_red"];
$puntos_energia = $_POST["p_energia"];
$puntos_cctv = $_POST["p_cctv"];
$puntos_luminaria = $_POST["p_luminaria"];

$a_sql = "SELECT MAX(idRelev) FROM relevamientos"; 
$a_result=mysqli_query($conexion,$a_sql)or die(mysqli_error());
$a_row = mysqli_fetch_row($a_result); 
$a_ultimo = $a_row[0];



//consulta para insertar
$pl_insert = "INSERT INTO  ambientes (nom_ambiente,ancho,largo,altura,datos_red, datos_energia, datos_cctv, datos_luminaria, fk_idRelev) VALUES ('$ambiente', '$ancho', '$largo', '$altura', '$puntos_red', '$puntos_energia', '$puntos_cctv', '$puntos_luminaria', '$a_ultimo')";
//Ejecutar consulta
$pl_result = mysqli_query($conexion,$pl_insert);

if (!$pl_result){
    echo 'Error al registrarse';
}
 else {
    //printf ("Nuevo registro con el id %d.\n", mysqli_insert_id($conexion)); //sirve
    
    //echo '<script>alert("Ambiente registrado");</script>';
    //echo "exito";   
}



//Cerrar conexion
mysqli_close($conexion);
?>

