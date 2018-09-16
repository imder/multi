<?php
session_start();
 if(isset($_SESSION['usuario'])){

?>
<!DOCTYPE HTML>

<html class="">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="md/css/mdb.min.css" rel="stylesheet">
    <link href="md/css/bootstrap.min.css" rel="stylesheet">
    <link href="md/css/style.css" rel="stylesheet">
    <!-- build:js modernizr.touch.js -->
    <!-- <script src="../dist/lib/modernizr.touch.js"></script> -->
    <!-- <script src="lib/js/jquery.min.js"></script> -->
    <script src="js/jquery.1.js"></script>
    <script src="lib/js/dibujo.js"></script>
      
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> <!-- bootstrap -->
    <link rel="stylesheet" href="css/all.css"><!-- webfonts -->
    <link rel="stylesheet" href="lib/css/normalize.min.css">
    <link href="lib/css/dibujo_1.css" rel="stylesheet">

   

    <title>Dibujar</title>
  </head>
  <body>
    
    <div id="panel" class="panel">

      <header class="header">
        <div class="card-body d-flex justify-content-between align-items-center" id="header">
          <button id="new" class="btn btn-primary">Nuevo</button>
          <!-- <button id="sig" class="">Guardar_P</button> -->
          <div class="title">Dibujar Plano</div>
          <!-- <button id="jpeg" class="btn btn-danger"><i class="fas fa-camera"></i> Fotografias</button>    -->
            <form action="php/regFotografia.php" class="formulario" method="post" enctype="multipart/form-data" id="insertar-foto">

            <input type="file" name="file_img[]" accept="image/*" multiple capture style="display: none;" id="foto1">

             <button type="button" name="" class="btn btn-raised btn-success" id="camara" onclick="document.getElementById('foto1').click();"><i class="fas fa-camera"></i> foto</button>
             <!-- <button type="submit">Subir</button> -->
            </form>
        </div>
        
      </header>

      <article>
        <!-- CANVAS -->
        <div id="content">  <p style="text-align:center">Cargando Canvas...</p>    </div>    

      </article>           
      <div class="modal fade" id="modalAmbiente" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <!--Modal: Contact form-->

        <div class="modal-dialog cascading-modal" role="document">

          <div class="modal-content">

            <!--Header-->
            <div class="modal-header primary-color white-text">
                <h4 class="title">Datos del ambiente</h4>
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
                    <input type="number" class="form-control" name="largo" id="largo"  placeholder="" autocomplete="off">
                  </div>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Ancho:</div>
                    </div>
                    <input type="number"  class="form-control" name="ancho" id="ancho"  placeholder="" autocomplete="off">
                  </div>
                  <div class="input-group mb-2">
                    <div class="input-group-prepend">
                      <div class="input-group-text">Altura:</div>
                    </div>
                    <input type="number"  class="form-control" name="altura" id="altura"  placeholder="" autocomplete="off">
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
              <button class="btn btn-success" onclick="regAmbiente();" >Siguiente Ambiente</button>
              </div>      
      <!-- </div> -->
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

      <footer>
      
        <div class="palette-case">
          <div class="palette-box">
            <div class="palette white"></div>
          </div>	
          <div class="palette-box">
            <div class="palette red"></div>
          </div>
          <div class="palette-box">
            <div class="palette blue"></div>
          </div>
          <div class="palette-box">
            <div class="palette green"></div>
          </div>
          <div class="palette-box">
            <div class="palette black"></div>
          </div>		
          <div style="clear:both"></div>
        </div>

        <a href="" class="btn btn-danger" id="finalizar" style="text-decoration:none;" data-toggle="modal" data-target="#confirmacion">
          Finalizar
        </a>  

        <span id="" class="showcode" data-toggle="modal" data-target="#modalAmbiente">
          <i class="fas fa-cog fa-2x" id="icono"></i>
          <i class=""></i>
        </span>

      </footer>

    </div>
     
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="md/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="md/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
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
                            var dat = $('#canvas')[0].toDataURL();
                        
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

  <script>      



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
  <script src="js/bootstrap.min.js"></script>
  </body>
</html>
<?php
}
else{

 header("Location: ./index.html"); 
}


?>