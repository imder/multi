<?php
session_start();
?>

<?php
include("conexion.php");

SESSION_START();
  $cod=$_GET['usu'];
  $contra=$_GET['pass'];
  $encriptado=MD5($contra);
  $c=0;
  
$consulta="SELECT usuario, passwords FROM usuarios";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);
if($filas!=0)
{  
while($dato=mysqli_fetch_array($resultado))
 { 
    if($dato['usuario']==$cod && $dato['passwords']==$encriptado)
    {
          $_SESSION['password'] = $cod;
          header("HTTP/1.1 302 Moved Temporarily"); 
          header("Location: /PROYMT/misRelevamientos.php"); 
       
        $c=1;
    }  
 }
 if($c==0)
 {
  echo 'El email o password es incorrecto, <a href="index.html">vuelva a intenarlo</a>.<br/>';
 }
}
?>