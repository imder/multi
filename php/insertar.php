<?php 
include("conexion.php");

$idcable = 

	for($i=0; $i < count($_FILES['file_img']['name']);$i++){

		$filetmp = $_FILES["file_img"]["tmp_name"][$i];
		$filename = $_FILES["file_img"]["name"][$i];
		$filetype = $_FILES["file_img"]["type"][$i];
		$filepath = "./fotografias/".$filename;
		
		move_uploaded_file($filetmp,$filepath);
		
		$sql = "INSERT INTO fotografias (nom_foto,url_foto,tipo_img,cable_idCable) VALUES ('$filename','$filepath','$filetype', '$idcable')";
		$result = mysqli_query($conexion,$sql)or die(mysqli_error());

	}	
    

?>