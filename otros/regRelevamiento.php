<?php
include("conexion.php");
//Recibir los datos y almacenarlos en variables
$cliente = $_POST["cliente"];
$representante = $_POST["representante"];
$correoR = $_POST["correoR"];
$telefono = $_POST["telefono"];
$lugar = $_POST["lugar"];

//consulta para insertar
$insertar = "INSERT INTO relevamientos (cliente, representante, correoR, telefono, lugar) VALUES ('$cliente', '$representante', '$correoR', '$telefono', '$lugar')";

$verificar_cliente = mysqli_query($conexion, "SELECT * FROM relevamientos WHERE cliente = '$cliente'");
$verificar_lugar = mysqli_query($conexion, "SELECT * FROM relevamientos WHERE lugar = '$lugar'");

if (mysqli_num_rows($verificar_cliente) > 0 && mysqli_num_rows($verificar_lugar) > 0){
    echo '<script>
            alert("El cliente ya existe");
            window.history.go(-1);
          </script>';
    exit;
}





//Ejecutar consulta
$resultado = mysqli_query($conexion,$insertar);
if (!$resultado){
    echo 'Error al registrarse';
}
 else {
    echo "<head><meta http-equiv='refresh' content='0; url=/PROYMT/servicios.php'></head>";
}

//Cerrar conexion
mysqli_close($conexion);

?>

