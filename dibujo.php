<?php
session_start();
 if(isset($_SESSION['usuario'])){

?>
<!doctype html>
<html>
<head>
    <title>Plano</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="md/css/mdb.min.css" rel="stylesheet">
    <link href="md/css/bootstrap.min.css" rel="stylesheet">
    <link href="md/css/style.css" rel="stylesheet">
    
    <link rel="stylesheet" href="css/all.css">
    <link rel="stylesheet" href="css/mis_estilos.css">
    <link rel="stylesheet" href="css/styleModal.css">

    <script src="js/jquery-1.8.2.min.js"></script>
    
    <link  href="libD/dibujo.css" rel="stylesheet">
	

	<script src="libD/jquery.min.js"></script>
	<script src="libD/jquery-ui.js"></script>
	<script src="libD/jquery.ui.touch-punch.js"></script>

	<script src="libD/dibujo.js"></script>
</head>
<body>
<div id="page">
    <div class="header">
    <button id="new" class="navbtn">Nuevo</button>
    <a href="#" type="button" class="photos" data-toggle="modal" data-target="#fotografias"><i class="fas fa-camera"></i></a>
    <form action="php/regFotografia.php" class="formulario" method="post" enctype="multipart/form-data" id="insertar-foto">
      <input type="file" name="file_img" accept="image/*" multiple capture style="display: none;" id="foto1">

       <button type="button" name="" class="navbtn2" id="camara" onclick="document.getElementById('foto1').click();"><i class="fas fa-camera"></i> FOTO</button>


       
    </form>   
    
    <div class="title">Dibujar Plano</div>

    </div>
    <div id="content"><p style="text-align:center">Loading Canvas...</p>

    </div>
    <div class="footer">
		<div class="palette-case">
			<div class="palette-box">
				<div class="borrador white"></div>
			</div>	
			<div class="palette-box">
				<div class="iconos"><img class="tool" width="30" height="30" src="libD/icon/red.png"></div>
			</div>
			<div class="palette-box">
				<div class="iconos"><img class="tool" width="30" height="30" src="libD/icon/iluminacion.png"></div>
			</div>
      <div class="palette-box">
        <div class="iconos"><img class="tool" width="30" height="30" src="libD/icon/cctv.png"></div>
      </div>
			<div class="palette-box">
				<div class="iconos"><img class="tool" width="30" height="30" src="libD/icon/electrico.png"></div>
			</div>
			<div class="palette-box">
				<div class="palette black"></div>
			</div>		
			<div style="clear:both"></div>
		</div>
		<button class="finalizar" id="" data-toggle="modal" data-target="#confirmacion">
          FINALIZAR
		</button>  

        <span  class="showcode" id="" data-toggle="modal" data-target="#modalAmbiente">
          <i class="fas fa-cog fa-2x" id="icono"></i>
          </span>

    </div>

    <div class="modal fade" id="modalAmbiente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!--Modal: Contact form-->

        <div class="modal-dialog cascading-modal" role="document">

          <div class="modal-content">

            <!--Header-->
            <div class="modal-header primary-color white-text">
                <h4 class="title">Datos del ambiente</h4>
                <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
            </div>

              <div class="modal-body">      
      <!-- <div class="code"> -->
      
                <form method="POST">
                
                  <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text">Nombre de ambiente:</div>
                      </div>
                      <input type="text" class="form-control" name="ambiente" id="ambiente"  placeholder="" autocomplete="off">
                  </div>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Largo:</div>
                    </div>
                    <input type="number" step="0.01" class="form-control" name="largo" id="largo"  placeholder="" autocomplete="off">
                  </div>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Ancho:</div>
                    </div>
                    <input type="number" step="0.01"  class="form-control" name="ancho" id="ancho"  placeholder="" autocomplete="off">
                  </div>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Altura:</div>
                    </div>
                    <input type="number" step="0.01"  class="form-control" name="altura" id="altura"  placeholder="" autocomplete="off">
                  </div>

                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Puntos de red:</div>
                    </div>
                    <input type="number"  class="form-control" name="p_red" id="p_red"  placeholder="" autocomplete="off">
                  </div>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Puntos de energia:</div>
                    </div>
                    <input type="number"  class="form-control" name="p_energia" id="p_energia"  placeholder="" autocomplete="off">
                  </div>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Puntos de cctv:</div>
                    </div>
                    <input type="number"  class="form-control" name="p_cctv" id="p_cctv"  placeholder="" autocomplete="off">
                  </div>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Puntos de luminarias:</div>
                    </div>
                    <input type="number"  class="form-control" name="p_luminaria" id="p_luminaria"  placeholder="" autocomplete="off">
                  </div>        
                  <!-- se guarda el plano dibujado. las fotografias y las mediciones del ambiente -->
              </form> 
              <button class="btn btn-success" data-toggle="modal" data-target="#guardarAmb" >Siguiente Ambiente</button>
              </div> 
            </div>
        </div>
      </div>     
</div> 

<div class="modal fade" id="guardarAmb" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <!--Modal: Contact form-->
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">            
        <!--Header-->          
        <div class="modal-body">
            <h5>¿Esta seguro de guardar los datos del ambiente?</h5>
              <div class="modal-footer">                      
              <a href="#" type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">NO</a>  
              <button class="btn btn-primary" onclick="regAmbiente();">SI</button>       
              </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="confirmacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <!--Modal: Contact form-->
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">            
        <!--Header-->          
        <div class="modal-body">
            <h5>Desea terminar el presente relevamiento?</h5>
              <div class="modal-footer">                      
              <a href="#" type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">NO</a>  
              <a href="formularios.php" type="button" class="btn btn-primary" id="otro">SI</a>       
              </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="fotografias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <!--Modal: Contact form-->
  <div class="modal-dialog fullscreen-modal" role="document">
    <div class="modal-content">            
        <!--Header-->
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        </div>          
        <div class="modal-body">
          
              <video id="video"></video>
                  
              <button id="boton" class="btn btn-outline-success">Tomar foto</button>
                  <p id="estado"></p>
              <canvas id="canvas" style="width: 100%; height:100%; display: none;"></canvas>
          
        </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="md/js/popper.min.js"></script>
<script type="text/javascript" src="md/js/bootstrap.min.js"></script>
<script type="text/javascript" src="md/js/mdb.min.js"></script>

<script type="text/javascript">
  function regAmbiente(){
    var ambiente = $('#ambiente').val();
    var largo = $('#largo').val();
    var ancho = $('#ancho').val();
    var altura = $('#altura').val();
    var p_red = $('#p_red').val();
    var p_energia = $('#p_energia').val();
    var p_cctv = $('#p_cctv').val();
    var p_luminaria = $('#p_luminaria').val();
  
      $.ajax({
            url:'php/regAmbiente.php',
            type:'POST',
            data:'ambiente='+ambiente+'&largo='+largo+'&ancho='+ancho+'&altura='+altura+'&p_red='+p_red+'&p_energia='+p_energia+'&p_cctv='+p_cctv+'&p_luminaria='+p_luminaria
            }).done(function(){
                    var dat = $('#canvas')[0].toDataURL('image/jpeg', 1.0);
                
                    $.ajax({ 
                          type: 'POST', 
                          url: 'php/guardar_plano.php',
                          dataType: 'text',
                          data: {base64data : dat}
                          }).done(function(){   
                                  location.href ="./dibujo.php";
                              });                              
              });            
  } 
  </script>
  
  <script type="text/javascript">
  $(document).ready(function(){
  $("#foto1").on("change",function(){
          
        $.ajax({
          url: "php/regFotografia.php",   	// URL a la que se envía la solicitud
          type: "POST",      				// Tipo de solicitud que se enviará, llamado como método 
          data:  new FormData($("#insertar-foto")[0]), 		// Datos enviados al servidor 
          contentType: false,       		// El tipo de contenido utilizado al enviar datos al servidor. El valor predeterminado es: "application / x-www-form-urlencoded"
              cache: false,					// Para no poder solicitar que las páginas se almacenen en caché
          processData:false,  			// Para enviar DOMDocument o archivo de datos no procesados, se establece en falso (es decir, los datos no deben estar en forma de cadena)
          success: function(data)  		// Una función a ser llamada si la solicitud tiene éxito
            {
            console.log('se guardo exitosamente');
            }	        
        });
      });
  
  });
  </script>
  <script src="js/fotografias.js"></script>
</body>
</html>
<?php
}
else{

 header("Location: ./index.html"); 
}


?>