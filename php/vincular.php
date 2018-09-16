<?php
include("conexion.php");
include("regRelevamiento.php");


$c_query = "SELECT MAX(idCliente) FROM clientes"; 
$c_result=mysqli_query($conexion,$c_query)or die(mysqli_error());
$c_row = mysqli_fetch_row($c_result); 
$fk_cliente = $c_row[0];



$s_query = "SELECT idServicio from servicios where descripcion='$servicio'"; 
$s_result=mysqli_query($conexion,$s_query)or die(mysqli_error());
$s_row = mysqli_fetch_row($s_result); 
$fk_servicio = $s_row[0];

$r_insertar = "INSERT INTO relevamientos (fk_idUsuario, fk_idCliente, fk_idServicio) VALUES ('$idUser', '$fk_cliente', '$fk_servicio')";

$v_resultado = mysqli_query($conexion,$r_insertar);
if (!$v_resultado){
    echo 'Error al registrarse';
}
 else {
    
    header("HTTP/1.1 302 Moved Temporarily"); 
    header("Location: ../dibujo.html"); 
    
}
// $query6 = "SELECT MAX(idRelev) FROM relevamientos"; 
// $resultado6=mysqli_query($conexion,$query6)or die(mysqli_error());
// $row = mysqli_fetch_row($resultado6); 
// $ultimo_id = $row[0];
// //print_r($ultimo_id); //sirve

// $query7 = "SELECT ser_idServ FROM relevamientos where idRelev='$ultimo_id'"; 
// $resultado7=mysqli_query($conexion,$query7)or die(mysqli_error());
// $row7 = mysqli_fetch_row($resultado7); 
// $servicio = $row7[0];
// print_r($servicio);

// if ($servicio == 1) {
//     header("HTTP/1.1 302 Moved Temporarily"); 
//     header("Location: ../cableadoEstructurado.php"); 
// } else if($servicio == 2){
//     header("HTTP/1.1 302 Moved Temporarily"); 
//     header("Location: ../fibraOptica.php"); 
//     }else if($servicio == 3){
//         header("HTTP/1.1 302 Moved Temporarily"); 
//         header("Location: ../iluminacion.php"); 
//         }else if($servicio == 4){
//             header("HTTP/1.1 302 Moved Temporarily"); 
//             header("Location: ../sistemaElectrico.php"); 
//             }else if($servicio == 5){
//                 header("HTTP/1.1 302 Moved Temporarily"); 
//                 header("Location: ../cctv.php"); 
//                 }



//Ejecutar consulta

    // switch ($servicio) 
    // {
    // case ($servicio == 1):
    //     header("HTTP/1.1 302 Moved Temporarily"); 
    //     header("Location: ../cableadoEstructurado.php"); 
    //     //echo "<head><meta http-equiv='refresh' content='0; url=../fotografias.html'></head>";
    // case ($servicio == 2):
    //     header("HTTP/1.1 302 Moved Temporarily"); 
    //     header("Location: ../fibraOptica.php");    
    //     //echo "<head><meta http-equiv='refresh' content='0; url=../genServicios.php'></head>";
    // case ($servicio == 3):
    // header("HTTP/1.1 302 Moved Temporarily"); 
    // header("Location: ../iluminacion.php");
    
    // case ($servicio = 4):
    // header("HTTP/1.1 302 Moved Temporarily"); 
    // header("Location: ../sistemaElectrico.php"); 

    // case ($servicio = 5):
    // header("HTTP/1.1 302 Moved Temporarily"); 
    // header("Location: ../cctv.php"); 
    // }


//Cerrar conexion
mysqli_close($conexion);

?>