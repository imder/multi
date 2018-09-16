<?php
include("conexion.php");
//Recibir los datos y almacenarlos en variables
$categoria = $_POST["categoria"];
$marca = $_POST["marca"];
$cant_puntos = $_POST["cant_puntos"];
$ent_facilidades = $_POST["ent_facilidades"];
$inst_gabinete = $_POST["inst_gabinete"];
$certificacion = $_POST["certificacion"];

//$ultimo_id = "SELECT MAX(idRelev) FROM relevamientos";
//$resultad2 = mysqli_query($conexion,$ultimo_id);
//$planos = $_POST["planos"];
//$fotografias = $_POST["fotografias"];
//print_r($_FILES["file_array[]"]);
//$ highest_id = mysql_result (mysql_query ("SELECT MAX (c_id) FROM customers"), 0);
//$highest_id = mysql_result(mysqli_query($conexion,"SELECT MAX(idRelev) FROM relevamientos"),0); 

$query5 = "SELECT MAX(idRelev) FROM relevamientos"; 
$resultado5=mysqli_query($conexion,$query5)or die(mysqli_error());
$row = mysqli_fetch_row($resultado5); 
$ultimo_id = $row[0];
//print_r($ultimo_id);

//consulta para insertar
$insert = "INSERT INTO cableado_estructurado (categoria, marca, cant_puntos, ent_facilidades, inst_gabinete, certificacion, relev_idRelev) VALUES ('$categoria', '$marca', '$cant_puntos', '$ent_facilidades', '$inst_gabinete','$certificacion','$ultimo_id')";

// $verificar_cliente = mysqli_query($conexion, "SELECT * FROM relevamientos WHERE cliente = '$cliente'");
// $verificar_lugar = mysqli_query($conexion, "SELECT * FROM relevamientos WHERE lugar = '$lugar'");

// if (mysqli_num_rows($verificar_cliente) > 0 && mysqli_num_rows($verificar_lugar) > 0){
//     echo '<script>
//             alert("El cliente ya existe");
//             window.history.go(-1);
//           </script>';
//     exit;
//}

//Ejecutar consulta
$resultad = mysqli_query($conexion,$insert);
if (!$resultad){
    echo 'Error al registrarse';
}
 else {
    echo '<script>alert("El relevamiento se registro exitosamente");</script>';
    echo "<head><meta http-equiv='refresh' content='0; url=/PROYMT/servicios.php'></head>";
}



//Cerrar conexion
mysqli_close($conexion);

?>