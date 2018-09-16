<?php
session_start();
//$f_idRelev = $_GET['d_idRel'];
//print_r($f_idRelev);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mis_estilos.css">
    <link rel="stylesheet" href="css/panel.css">
    <link rel="stylesheet" href="css/all.css">
    <title>Formularios</title>
</head>
<body>
<div class="container">
<form action="php/regCableado.php" class="formulario" method="post" enctype="multipart/form-data" id="insertar-foto">

<?php
include("php/conexion.php");

$r_consulta = "SELECT MAX(idAmbiente) FROM ambientes";
$r_result=mysqli_query($conexion,$r_consulta)or die(mysqli_error());
$r_row = mysqli_fetch_row($r_result); 
$r_idAmbien = $r_row[0];
//print_r($r_idRelev);

$f_query = "SELECT datos_red from ambientes where idAmbiente='$r_idAmbien'";
$f_result= mysqli_query($conexion,$f_query)or die(mysqli_error());
$f_row = mysqli_fetch_row($f_result); 
$f_idAmbien = $f_row[0];
//print_r($f_idAmbien);

$e_query = "SELECT datos_energia from ambientes where idAmbiente='$r_idAmbien'";
$e_result= mysqli_query($conexion,$e_query)or die(mysqli_error());
$e_row = mysqli_fetch_row($e_result); 
$e_idAmbien = $e_row[0];

$cc_query = "SELECT datos_cctv from ambientes where idAmbiente='$r_idAmbien'";
$cc_result= mysqli_query($conexion,$cc_query)or die(mysqli_error());
$cc_row = mysqli_fetch_row($cc_result); 
$cc_idAmbien = $cc_row[0];

$l_query = "SELECT datos_luminaria from ambientes where idAmbiente='$r_idAmbien'";
$l_result= mysqli_query($conexion,$l_query)or die(mysqli_error());
$l_row = mysqli_fetch_row($l_result); 
$l_idAmbien = $l_row[0];

if($f_idAmbien != 0){


?>
                <h1>CABLEADO ESTRUCTURADO</h1>
                  <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">No de puntos</div>
                       </div>
                       <input type="text"  class="form-control" name="cant_puntos" id=""  placeholder="">
                   </div>
 
                   <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Categoria</div>
                       </div>
                       <select class="form-control" name="categoria" type="text" placeholder="">
                          <option>5-E</option>
                          <option>6</option>
                          <option>6-A</option>
                        </select>
                   </div>
                   
                   <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Marca</div>
                       </div>
                       <input type="text" class="form-control" name="marca" id="" placeholder="">
                   </div>
 
                   <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Entrada de facilidades</div>
                       </div>
                          <select class="form-control" name="ent_facilidades" type="text" placeholder="">
                            <option>Si</option>
                          <option>No</option>
                        </select>
                   </div>
 
                   <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Instalacion de gabinete</div>
                       </div>
                          <select class="form-control" name="inst_gabinete" type="text" placeholder="">
                            <option>Si</option>
                          <option>No</option>
                        </select>
                   </div>

                   <div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Certificacion</div>
                       </div>
                          <select class="form-control" name="certificacion" type="text" placeholder="">
                            <option>Si</option>
                          <option>No</option>
                        </select>
                   </div>  
                      <div class="card-body d-flex justify-content-between align-items-center">
                          
                          <a href="dibujo.html" class="btn btn-secondary btn-block" id="">
                            <i class="fas fa-pencil-alt"></i> 
                            Registrar ambientes
                          </a>
                                                                    
                          </div>
                    
<?php 
   }
   if($e_idAmbien != 0){
?>
<h1>SISTEMA ELECTRICO</h1>                                            
<div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Tipo</div>
                       </div>
                       <input type="text"  class="form-control" name="se_tipo" id=""  placeholder="">
                  </div>
                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Acometida</div>
                      </div>
                    
                      <select class="form-control" name="se_acometida" type="text" placeholder="">
                        <option>Si</option>
                        <option>No</option>
                      </select>
                 </div>
                 
               <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Puesta a tierra</div>
                    </div>                    
                    <select class="form-control" name="se_puesta" type="text" placeholder="">
                        <option>Si</option>
                        <option>No</option>
                    </select>
               </div>
               <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Instalacion de tablero</div>
                    </div>                    
                    <select class="form-control" name="se_instTablero" type="text" placeholder="">
                        <option>Si</option>
                        <option>No</option>
                    </select>
               </div>                 
                    
<?php 
   }
   if($cc_idAmbien != 0){
?>
<h1>CCTV</h1>
<div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Puntos camaras/sensores</div>
                       </div>
                       <input type="text"  class="form-control" name="cc_cantidad" id=""  placeholder="">
                  </div>
                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Tipo</div>
                      </div>
                      <input type="text"  class="form-control" name="cc_tipo" id=""  placeholder="">
                 </div>                    
<?php 
   }
   if($l_idAmbien != 0){
?>
<h1>ILUMINACION</h1>
<div class="input-group mb-2">
                       <div class="input-group-prepend">
                         <div class="input-group-text">Cantidad de luminarias</div>
                       </div>
                       <input type="text"  class="form-control" name="i_cantLumi" id=""  placeholder="">
                  </div>
                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Cantidad de Interruptores</div>
                      </div>
                      <input type="text"  class="form-control" name="i_cantInte" id=""  placeholder="">
                 </div>
<?php 
   }
   
?>

<button id="botonSig" class="" type="submit">
        Guardar Relevamiento
</button>
</form>
</div>
<script src="js/jquery.1.js"></script>
    <!-- <script src="js/fotografias.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/panel.js"></script>
</body>
</html>