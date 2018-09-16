<?php
/////// CONEXIÓN A LA BASE DE DATOS /////////
include("conexion.php");

//////////////// VALORES INICIALES ///////////////////////

$tabla="";
$query="SELECT cliente, lugar FROM relevamientos ORDER BY cliente";

///////// LO QUE OCURRE AL TECLEAR SOBRE EL INPUT DE BUSQUEDA ////////////
if(isset($_POST['relevamientos']))
{
	$q=$conexion->real_escape_string($_POST['relevamientos']);
	$query="SELECT * FROM relevamientos WHERE 
		
		cliente LIKE '%".$q."%' OR
		
        lugar LIKE '%".$q."%'";
}

$buscarRelevamientos=$conexion->query($query);
if ($buscarRelevamientos->num_rows > 0)
{
	$tabla.= 
	'<table class="table table-hover" id="tabla">
		<tr class="bg-primary text-white">
			
			<td>RELEVAMIENTOS</td>
			
            <td>ACCION</td>
		</tr>';

	while($filaRelevamientos= $buscarRelevamientos->fetch_assoc())
	{
		$tabla.=
		'<tr>
			
			<td>
			<span class="font-weight-bold">'.$filaRelevamientos['cliente'].'</span><br>
			
			<span class="font-weight-light">'.$filaRelevamientos['lugar'].'</span>
			</td>
			
			<td><button class="btn btn-info">Ver</button></td>

		 </tr>
		';
	}

	$tabla.='</table>';
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
?>
