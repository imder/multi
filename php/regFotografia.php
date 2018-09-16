<?php

include("conexion.php");

$quer = "SELECT cont FROM contador"; 
$resultado5=mysqli_query($conexion,$quer)or die(mysqli_error());
$row = mysqli_fetch_row($resultado5); 
$cont = $row[0];

$fsql = "SELECT MAX(idRelev) FROM relevamientos"; 
$fresult=mysqli_query($conexion,$fsql)or die(mysqli_error());
$frow = mysqli_fetch_row($fresult); 
$fultimo = $frow[0];

print_r($cont);
print_r($fultimo);

for($i=0; $i < count($_FILES['file_img']['name']);$i++){

    $filetmp = $_FILES["file_img"]["tmp_name"][$i];
    $filename = $_FILES["file_img"]["name"][$i];
    $filetype = $_FILES["file_img"]["type"][$i];
    $filepath = "../fotografias/".$filename;
    
    
    move_uploaded_file($filetmp,$filepath);
    
    $insert2 = "INSERT INTO fotografias (nom_foto,url_foto,tipo_img,fk_idAmbiente,fk_idRelev) VALUES ('$filename','$filepath','$filetype', '$cont', '$fultimo')";// cambiar fk_idAmbiente
    $result2 = mysqli_query($conexion,$insert2)or die(mysqli_error());

}

if (!$result2){
    echo 'Error al registrarse';
}
 else {
    //printf ("Nuevo registro con el id %d.\n", mysqli_insert_id($conexion)); //sirve
    //echo '<script>alert("El relevamiento se registro exitosamente");</script>';
    //echo "<head><meta http-equiv='refresh' content='0; url=../dibujo.php'></head>";
}



//Cerrar conexion
mysqli_close($conexion);
?>