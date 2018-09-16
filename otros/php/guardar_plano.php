<?php

$data = $_REQUEST['base64data']; 
$image = explode('base64,',$data);

//Calcular un nombre único
$nombreImagenGuardada = "../planos/plano_" . uniqid() . ".png";

print_r($nombreImagenGuardada );
//Escribir el archivo
file_put_contents($nombreImagenGuardada, base64_decode($image[1])); 

//Recibir los datos y almacenarlos en variables
// $ambiente = $_POST["ambiente"];
// $largo = $_POST["largo"];
// $ancho = $_POST["ancho"];
// $altura = $_POST["altura"];

// //consulta para insertar
// $pl_insert = "INSERT INTO  ambiente (nom_ambiente,ancho,largo,altura,url_plano) VALUES ('$ambiente', '$largo', '$ancho', '$altura', '$nombreImagenGuardada')";
// //Ejecutar consulta
// $pl_result = mysqli_query($conexion,$pl_insert);

// if (!$pl_result){
//     echo 'Error al registrarse';
// }
//  else {
//     //printf ("Nuevo registro con el id %d.\n", mysqli_insert_id($conexion)); //sirve
//     echo '<script>alert("Ambiente registrado");</script>';
//     //echo "<head><meta http-equiv='refresh' content='0; url=../misRelevamientos.php'></head>";
// }



// //Cerrar conexion
mysqli_close($conexion);
?>