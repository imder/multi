<?php 
    require_once('conexion.php');	

$idRelev = 1;

$consulta="SELECT r.idRelev,
r.fk_idUsuario,
c.cliente,
c.representante,
c.correoR,
c.telefono,
c.direccion
FROM relevamientos AS r 
INNER JOIN clientes AS c 
ON r.fk_idCliente=c.idCliente 
WHERE   r.idRelev= '$idRelev'";
                    
$resultado = mysqli_query($conexion,$consulta)or die(mysqli_error());
$fila = mysqli_fetch_array($resultado); 

$idUser = $fila['fk_idUsuario'];



$conUser = "SELECT Nombres, appaterno, apmaterno FROM usuarios WHERE idUsuario='$idUser'"; 
$resUser=mysqli_query($conexion,$conUser)or die(mysqli_error());
$filaUser = mysqli_fetch_array($resUser); 

$color='#E7E77';
$im="hola";

	require_once('../tcpdf/tcpdf.php');
	
	$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);
	
	$pdf->SetCreator(PDF_CREATOR);
	$pdf->SetAuthor('Miguel Caro');
	$pdf->SetTitle($idRelev);
	$pdf->setPrintHeader(false); 
	$pdf->setPrintFooter(false);
	$pdf->SetMargins(20, 20, 20, false); 
	$pdf->SetAutoPageBreak(true, 20); 
	$pdf->SetFont('Helvetica', '', 10);
	$pdf->addPage();
	// $pdf->Image('img/nuevo.png' , 130 ,11, 60 , 29,'PNG');

	$content = '';
	
	$content .= '
		
<!-- INF. del Cliente-->
<table  cellspacing="0" style="width: 100%; border: solid 1px black; background: #E7E7E7; text-align: center; font-size: 10pt;padding:1mm; ">
        <tr>          
            <td style="width:100%; margin-bottom: 5px; text-align: center;  color:black; font-weight: bold;"><b>RELEVAMIENTO/SERVICIOS</b></td> </tr>



</table><!-- INF. del Cliente FIN-->


<!-- INF. del Cliente-->
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt; ">
   <tr><td style="width:100% ; background-color: #336699;color: #cc3366; ">.</td>
 	</tr>


            
      

<tr><td style="width:100% ; background-color: #336699;color: #cc3366; ">.</td>
 </tr>


</table><!-- INF. del Cliente FIN-->


<!-- INF. del Cliente-->
<table  cellspacing="1px" style="width: 100%; font-size: 7pt;background: #E7E7E7;">
         <tr>
            
            <td><b>CLIENTE:</b></td>
            <td>'.$fila['cliente'].' </td>
		</tr>
		<tr>

            <td><b>REPRESENTANTE:</b></td>
            <td>'.$fila['representante'].'</td>

		</tr>
	
		
        <tr><td colspan="4" style="height: 10px;">__________________________________________________________________________________________________________________________</td></tr>

</table><!-- INF. del Cliente FIN-->



';


	$pdf->writeHTML($content, true, 0, true, 0);

	$pdf->lastPage();
	$pdf->output('Reporte.pdf', 'I');

?>
